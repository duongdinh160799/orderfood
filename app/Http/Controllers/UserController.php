<?php

namespace App\Http\Controllers;

use App\Models\CoinHistory;
use App\Models\CoinRecharge;
use App\Models\CoinWithdraw;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

;

class UserController extends Controller
{
    //
    public function index()
    {
        $listItems = Item::query()->get();
        $payments = [
            1 => 'Cash On Delivery',
            2 => 'Wallet'
        ];
        $page_title = 'food_menu';
        $user = Auth::user();
        $total_coin = CoinHistory::query()->where('user_id', $user->id)->sum('coin');
        return view('user.index', [
            'listItems' => $listItems,
            'payments' => $payments,
            'page_title' => $page_title,
            'user' => $user,
            'total_coin' => $total_coin,
        ]);
    }

    public function order(Request $request)
    {
        $page_title = 'food_menu';
        $data = $request->input();
        $total_coin = CoinHistory::query()->where('user_id', Auth::id())->sum('coin');
        $code = new UserController();
        if (isset($data['quantity'])) {
            $order = new Order;
            $order->user_id = Auth::id();
            $order->address = $data['address'] ? $data['address'] : '';
            $order->description = $data['description'] ? $data['description'] : '';
            $order->payment_type = $data['payment'];
            $order->phone = $data['phone'] ? $data['phone'] : '';
            $order->status = 0;
            $order->code = strtoupper($code->createRandomCode());
            $order->save();
            foreach ($data['quantity'] as $id_item => $quantity) {
                $item = Item::query()->find($id_item);
                $order_detail = new OrderDetail();
                $order_detail->order_id = $order->id;
                $order_detail->item_id = $id_item;
                $order_detail->quantity = $quantity;
                $order_detail->price = $quantity * $item->price;
                $order->total += $order_detail->price;
                $order_detail->save();
            }
            $order->save();
            if ($data['payment'] == 2) {
                if ($order->total < $total_coin) {
                    $coin_history = new CoinHistory();
                    $coin_history->user_id = Auth::id();
                    $coin_history->coin = $order->total * -1;
                    $coin_history->object_id = $order->id;
                    $coin_history->object_type = 0;
                    $coin_history->save();
                    return redirect()->route('user.success');;
                } else {
                    $order->order_details()->delete();
                    $order->delete();
                    return back()->with('error', "Your wallet isn't enough money!");
                }
            }
        } else {
            return back()->with('error', 'Choose one Item!');
        }

    }

    public function listOrder()
    {
        $page_title = 'order';
        $listOrders = Order::query()->where('user_id', '=', Auth::id())->orderBy('id', 'desc')->get();
        return view('user.listOrder', [
            'listOrders' => $listOrders,
            'page_title' => $page_title,
        ]);
    }

    public function detailOrder($id)
    {
        $page_title = 'order';
        $order = Order::query()->find($id);
        return view('user.detailOrder', [
            'order' => $order,
            'page_title' => $page_title,
        ]);
    }

    public function profile()
    {
        $page_title = 'profile';
        $user = Auth::user();
        return view('user.userProfile', [
            'page_title' => $page_title,
            'user' => $user,
        ]);
    }

    public function editProfile(Request $request)
    {
        $data = $request->input();
        $birthday = date_create_from_format("d-m-Y", $data['birthday'])->format("Y-m-d");

        $user = User::query()->find(Auth::id());
        $user->name = $data['name'] ? $data['name'] : '';
        $user->phone = $data['phone'] ? $data['phone'] : '';
        $user->birthday = $birthday ? $birthday : '';
        $user->id_number = $data['id_number'] ? $data['id_number'] : '';
        $user->gender = $data['gender'] ? $data['gender'] : 0;
        $user->address = $data['address'] ? $data['address'] : '';
//        dd($birthday, $data, $user);
        $user->save();
        return redirect()->route('user.profile')->with('success', 'Change profile Success');
    }

    public function changePassword(Request $request)
    {
        if (Auth::Check()) {
            $request_data = $request->All();
            $validator = $request->validate([
                'current-password' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ]);
            $current_password = Auth::User()->password;
            if (Hash::check($request_data['current-password'], $current_password)) {
                $user_id = Auth::User()->id;

                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['password']);
                $obj_user->save();
                return back()->with('success', 'Change password Success');
            } else {
                $error = 'Please enter correct current password';
                return back()->with('error', $error);
            }

        }
    }

    public function wallet()
    {
        $page_title = 'wallet';
        $total_coin = CoinHistory::query()->where('user_id', Auth::id())->sum('coin');
        $order_coins = CoinHistory::query()->where('user_id', Auth::id())->where('object_type', 0)->get();
        foreach ($order_coins as $order_coin) {
            $order = Order::query()->find($order_coin->object_id);
            $order_coin->order = $order ? $order : '';
        }
        $recharge_coins = CoinRecharge::query()->where('user_id', Auth::id())->get();
        $withdraw_coins = CoinWithdraw::query()->where('user_id', Auth::id())->get();
        return view('user.wallet', [
            'page_title' => $page_title,
            'order_coins' => $order_coins,
            'total_coin' => $total_coin,
            'recharge_coins' => $recharge_coins,
            'withdraw_coins' => $withdraw_coins,
        ]);
    }

    public function createRandomCode()
    {

        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 0;
        $pass = '';

        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return $pass;
    }

    public function success()
    {
        $page_title = 'food_menu';
        return view('user.success', [
            'page_title' => $page_title,
        ]);
    }

    public function recharge(Request $request)
    {
        $page_title = 'wallet';
        $data = $request->input();
        $code = new UserController();
        $recharge_coin = new CoinRecharge();
        $recharge_coin->user_id = Auth::id();
        $recharge_coin->coin = $data['money_recharge'];
        $recharge_coin->code = strtoupper($code->createRandomCode());
        $recharge_coin->status = 1;
        $recharge_coin->payment_type = 0;
        $recharge_coin->save();
        return view('user.recharge', [
            'page_title' => $page_title,
            'recharge_coin' => $recharge_coin,
        ]);
    }

    public function withdrawal(Request $request)
    {
        $page_title = 'wallet';
        $data = $request->input();
        $withdraw_coin = new CoinWithdraw();
        $withdraw_coin->user_id = Auth::id();
        $withdraw_coin->coin = $data['money_withdrawal'];
        $withdraw_coin->account_name = $data['name_account'];
        $withdraw_coin->account_number = $data['number_account'];
        $withdraw_coin->bank_name = $data['bank_name'];
        $withdraw_coin->status = 1;
        $withdraw_coin->save();

        $history_coin = new CoinHistory();
        $history_coin->user_id = Auth::id();
        $history_coin->coin = $withdraw_coin->coin * -1;
        $history_coin->object_id = $withdraw_coin->id;
        $history_coin->object_type = 2;
        $history_coin->save();

        return view('user.withdrawal', [
            'page_title' => $page_title,
        ]);
    }
    public function not_auth(){
        $page_title = 'food_menu';
        return view('user.not_auth',[
            'page_title' => $page_title,
        ]);
    }
}
