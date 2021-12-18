<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index(){
        $listItems = Item::query()->get();
        $payments = [
          1 => 'Cash On Delivery',
            2 => 'Wallet'
        ];
        return view('user.index',[
            'listItems' => $listItems,
            'payments' => $payments,
        ]);
    }
    public function order(Request $request){
        $data = $request->input();
        if (isset($data['quantity'])){

          $order = new Order;
          $order->user_id = Auth::id();
          $order->address = $data['address'];
          $order->description = $data['description'];
          $order->payment_type = $data['payment'];
          $order->status = 0;
          $order->save();
          foreach ($data['quantity'] as $id_item => $quantity){
              $item = Item::query()->find($id_item);
              $order_detail = new OrderDetail();
              $order_detail->order_id = $order->id;
              $order_detail->item_id = $id_item;
              $order_detail->quantity = $quantity;
              $order_detail->price = $quantity*$item->price;
              $order->total += $order_detail->price;
              $order_detail->save();
          }
          $order->save();
          return redirect()->route('user.success');
;
        }
        else{
           return back()->with('error', 'Choose one Item!');
        }

    }
    public function listOrder(){
        $listOrders = Order::query()->where('user_id', '=', Auth::id())->orderBy('id','desc')->get();
     return view('user.listOrder',[
         'listOrders' => $listOrders,
     ]);
    }
    public function detailOrder($id){
        $order = Order::query()->find($id);
        return view('user.detailOrder',[
            'order' => $order,
        ]);
    }
}
