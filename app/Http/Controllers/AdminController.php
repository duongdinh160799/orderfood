<?php

namespace App\Http\Controllers;

use App\Models\CoinHistory;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::query()->get();
//        dd($users);
        $page_title = 'user_account';
        return view('admin.home', [
            'page_title' => $page_title,
            'users' => $users,
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
}
