<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->status == 1){
            Auth::logout();
            return redirect()->route('account_disable');
        }
        else{
            if(Auth::user()->level == '1'){
                return redirect()->route('admin.index');
            }
            else {
                return redirect()->route('user.index');
            }
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('intro_home');
    }
}
