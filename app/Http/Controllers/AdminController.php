<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Projects;
use App\ProjectUserDetails;
use Carbon\Carbon;
use App\User;
use App\Orders;

class AdminController extends Controller {

    function dashboard() {
        $data['title'] = 'Dashboard';
        $data['users'] = User::count();
        $data['orders'] = Orders::count();
        $data['neworders'] = Orders::where(array('approved'=>0))->where('shopusername','!=','')->count();
        $data['incomplete'] = Orders::where(array('approved'=>0,'shopusername'=>''))->count();
        $data['approved'] = Orders::where(array('approved'=>1))->count();
        return view('admin.dashboard', $data);
    }

    function allUsers() {
        $data['title'] = 'All Users';
        $data['users'] = User::all();
        return view('admin.users', $data);
    }

    function deleteuser($id) {
        User::find($id)->delete();
        $error_message = 'User Deleted Successfully';
        Session::flash('success', $error_message);
        return Redirect::to(URL::previous());
    }

    function allOrders() {
        $data['title'] = 'All Orders';
        $data['orders'] = Orders::all();
        return view('admin.orders', $data);
    }

    function approveOrders() {
        $data['title'] = 'Approved Orders';
        $data['orders'] = Orders::where('approved',1)->get();
        return view('admin.orders', $data);
    }
     function newOrders() {
        $data['title'] = 'New Orders';
        $data['orders'] = Orders::where(array('approved'=>0))->where('shopusername','!=','')->get();
        return view('admin.orders', $data);
    }
    function incompleteOrders() {
        $data['title'] = 'Incomplete Orders';
        $data['orders'] = Orders::where(array('approved'=>0,'shopusername'=>''))->get();
        return view('admin.orders', $data);
    }
    function deleteOrder($id) {
        Orders::find($id)->delete();
        $error_message = 'Order Deleted Successfully';
        Session::flash('success', $error_message);
        return Redirect::to(URL::previous());
    }
    function approveOrder($id) {
        $order = Orders::find($id);
        $order->approved =1;
        $order->save();
        $error_message = 'Order Approved Successfully';
        Session::flash('success', $error_message);
        return Redirect::to(URL::previous());
    }

}
