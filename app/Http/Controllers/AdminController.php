<?php

namespace App\Http\Controllers;

use App\Models\CoinHistory;
use App\Models\CoinRecharge;
use App\Models\CoinWithdraw;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $data =$request->input();
        if  (isset($data['search'])&&$data['search']){
            $users = User::query()->where('email','like','%'.$data['search'].'%')->get();
            $search = $data['search'];
        }
        else{
            $users = User::query()->get();
            $search = '';
        }
        if ($users){
            foreach ($users as $user){
                $user->total_coin =  CoinHistory::query()->where('user_id', $user->id)->sum('coin');
            }
        }
        $page_title = 'user_account';
        return view('admin.home', [
            'page_title' => $page_title,
            'users' => $users,
            'search'=>$search,
        ]);
    }
    public function editAccount(Request $request){
        $data = $request->input();
        $user = User::query()->find($data['id']);
        $page_title = 'user_account';
//        dd($user);
        return view('admin.edit_account',[
            'page_title' => $page_title,
            'user' => $user,
        ]);
    }
    public function postEditAccount(Request $request){
        $data = $request->input();
        $user = User::query()->find($data['id']);
        $user->name = $data['name'];
        $user->phone = $data['phone'];
        $user->birthday = date_create_from_format("d-m-Y", $data['birthday'])->format("Y-m-d");
        $user->id_number = $data['id_number'];
        $user->gender = $data['gender'];
        $user->address = $data['address'];
        $user->status = isset($data['active']) && $data['active'] == 'on' ? 0 : 1;
        $user->level = $data['role'];
        $user->save();
        return redirect()->back()->with('success', 'Change profile Success');
    }
    public function listOrder(Request $request){
        $page_title = 'list_order';
        $data = $request->input();
        if  (isset($data['status'])&&$data['status'] !='4'){
            $listOrders = Order::query()->where('status',$data['status'])->orderBy('id', 'desc')->get();
            $status = $data['status'];
        }
        else{
            $listOrders = Order::query()->orderBy('id', 'desc')->get();
            $status = 4;
        }

        return view('admin.listOrder', [
            'listOrders' => $listOrders,
            'page_title' => $page_title,
            'search' => $status
        ]);
    }
    public function detailOrder($id)
    {
        $page_title = 'order';
        $order = Order::query()->find($id);
        return view('admin.detailOrder', [
            'order' => $order,
            'page_title' => $page_title,
        ]);
    }
    public function changeStatusOrder(Request $request){
        $data = $request->input();
        $order = Order::query()->find($data['id']);
        $order->status = $data['status'];
        if ($data['status'] == 3){
            $coin_history = CoinHistory::query()->where('user_id',$order->user_id)->where('object_id',$order->id)->where('object_type',0);
            $coin_history->delete();
        }
        $order->save();
        return response()->json([
            'success' =>  $data['status'],
        ]);
    }
    public function listItem(Request $request){
        $page_title = 'item';
        $data = $request->input();
        if  (isset($data['status'])&&$data['status'] !='0'){
            $items = Item::query()->where('type',$data['status'])->orderBy('id', 'desc')->get();
            $status = $data['status'];
        }
        else{
            $items = Item::query()->orderBy('id', 'desc')->get();
            $status = 0;
        }

        return view('admin.listItem',[
            'page_title' => $page_title,
            'items' => $items,
            'search' => $status
        ]);
    }
    public function detailItem($id){
        $page_title = 'item';
        $item = Item::query()->find($id);
        return view('admin.detailItem',[
            'page_title' => $page_title,
            'item' => $item,
        ]);
    }
    public function postNewItem(Request $request){
        $data = $request->input();
        $item = new Item();
        $item->name = $data['name'];
        $item->price = $data['price'];
        $item->description = $data['description'];
        if ($request->file('image')){
            $path = $request->file('image')->store('public/avatars');
            $path = str_replace('public','',$path);
        }
        $item->image = $path ?  asset('storage/'.$path):'' ;
        $item->type = $data['type'] ?  $data['type'] : 1;
        $item->save();
        return redirect()->route('admin.listItem')->with('success', 'Add item Success');
    }
    public function postDetailItem(Request $request){
        $data = $request->input();
        $item = Item::query()->find($data['id']);
        $item->name = $data['name'];
        $item->price = $data['price'];
        $item->description = $data['description'];
        if ($request->file('image')){
            $path = $request->file('image')->store('public/avatars');
            $path = str_replace('public','',$path);
        }
        $item->image = isset($path) && $path ? asset('storage/'.$path) : $item->image;
        $item->type = $data['type'] ?  $data['type'] : 1;
        $item->save();
        return redirect()->route('admin.listItem')->with('success', 'Edit item Success');
    }
    public function deleteItem(Request $request){
        $data = $request->input();
        $item = Item::query()->find($data['id']);
//        dd($item);
        if ($item->delete()){
            return redirect()->route('admin.listItem')->with('success', 'Delete item Success');
        }
        else{
            return redirect()->route('admin.listItem')->with('error', 'Delete item Error! Try again!');
        }


    }
    public function listWithdrawal(Request $request){
        $page_title = 'wallet';
        $data = $request->input();
        if  (isset($data['status'])&&$data['status'] !='0'){
            $listWithDraws = CoinWithdraw::query()->where('status',$data['status'])->orderBy('id', 'desc')->get();
            $status = $data['status'];
        }
        else{
            $listWithDraws = CoinWithdraw::query()->orderBy('id', 'desc')->get();
            $status = 0;
        }

        return view('admin.listWithdrawal',[
            'page_title' => $page_title,
            'listWithDraws' => $listWithDraws,
            'search' => $status,
        ]);
    }
    public function listRecharge(Request $request){
        $page_title = 'wallet';
        $data = $request->input();
        if  (isset($data['status'])&&$data['status'] !='0'){
            $listRecharges = CoinRecharge::query()->where('status',$data['status'])->orderBy('id', 'desc')->get();
            $status = $data['status'];
        }
        else{
            $listRecharges = CoinRecharge::query()->orderBy('id', 'desc')->get();
            $status = 0;
        }
        return view('admin.listRecharge',[
            'page_title' => $page_title,
            'listRecharges' => $listRecharges,
            'search' => $status,
        ]);
    }
    public function changeStatusRecharge(Request $request){
        $data = $request->input();
        $item = CoinRecharge::query()->find($data['id']);
        $item->status = $data['status'];
        if ($data['status'] == 2){
            $coin_history = new CoinHistory();
            $coin_history->user_id = $item->user_id;
            $coin_history->coin = $item->coin;
            $coin_history->object_id = $item->id;
            $coin_history->object_type = 1;
            $coin_history->save();
        }
        $item->save();
        return response()->json([
            'success' =>  $data['status'],
        ]);
    }
    public function changeStatusWithdrawal(Request $request){
        $data = $request->input();
        $item = CoinWithdraw::query()->find($data['id']);
        $item->status = $data['status'];
        if ($data['status'] == 3){
            $coin_history = CoinHistory::query()->where('user_id',$item->user_id)->where('object_id',$item->id)->where('object_type',2);
            $coin_history->delete();
        }
        $item->save();
        return response()->json([
            'success' =>  $data['status'],
        ]);
    }
}
