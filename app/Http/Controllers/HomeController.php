<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\User;
use Storage;
use Illuminate\Support\Facades\File;
use App\Orders;
//use Anouar\Paypalpayment\Facades\Paypalpayment;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $_apiContext;
    //test
//    private $_ClientId = 'AdQ8A-B3tqRSDIT0tTsiGPEWS1nvkIoW_SbfgwM0v9jebrEj8OHaByKFEPzRVPYb4ZglZyDXOfzAa_rY';
//    private $_ClientSecret = 'EL9OdCFx9U7nBJLWd12cdeic57lUBt3sCfPLEwZYf4Q8G44uU4bTzH0Y3ZA4Tnprg-1PN7b06Bb_sejK';
//server
    private $_ClientId = 'AWjjK98ecutcLrK6WZ7hd0qE5z1n2RnREBLUmVWfSFnEVWre5a76dBfegPEkpfQ8d2eB5K8zYavGI_kl';
    private $_ClientSecret = 'EIn1wqDjYn6HqVGrxeV761T4Z36uAP-BJ0tJ17K1E3NkErAdM4u4IsAhPWZ4U_3peSSy65jIOjS659Ll';

    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['title'] = 'Dashboard';

        return view('dashboard', $data);
    }

    public function step1Show() {
        $data['title'] = 'step1';
        return view('step1', $data);
    }

    public function step1() {
        $save_order = new Orders;
        $save_order->date = $_POST['date'];
        $save_order->time = $_POST['timeslot'];
        $save_order->fname = $_POST['fname'];
        $save_order->lname = $_POST['lname'];
        $save_order->email = $_POST['email'];
        $save_order->company = $_POST['company'];
        $save_order->shop_url = $_POST['shop_url'];
        $save_order->user_id = Auth::user()->id;
        $save_order->save();
//        $data['order_id']=$save_order->id;
        Session::put('order_id', $save_order->id);
        return Redirect::to('step2');
    }

    public function step2() {
        $data['title'] = 'Step2';
        return view('step2', $data);
    }

    public function storeStep2() {
        $order = Orders::find(Session::get('order_id'));
        if ($order) {
            $order->shopusername = $_POST['shopusername'];
            $order->shoppassword = $_POST['shoppassword'];
            $order->shopurl = $_POST['shopurl'];
            $order->ftphost = $_POST['ftphost'];
            $order->ftpuser = $_POST['ftpuser'];
            $order->ftppassword = $_POST['ftppassword'];
            $order->paypallive = $_POST['paypallive'];
            $order->paysecret = $_POST['paysecret'];
            $order->save();
            Session::flash('success', 'Order Has Been Saved SuccessFully');
            return Redirect::to('dashboard');
        } else {
            Session::flash('error', 'Sorry Some Thing Went Wrong');
            return Redirect::to('dashboard');
        }
    }

    public function checktime() {
        $data = array('10:00 AM', '1:00 PM', '4:00 PM');

        $checkslots = Orders::where('date', $_GET['dates'])->get();
//       echo '<pre>';
        foreach ($checkslots as $check) {
//            print_r($check);
            if ($check->time == '10:00 AM') {
                unset($data[0]);
            }if ($check->time == '1:00 PM') {
                unset($data[1]);
            }
            if ($check->time == '4:00 PM') {
                unset($data[2]);
            }
        }
        echo( json_encode($data));
    }

    public function checkftp() {
		
	$ftp_server = $_GET['ftphost'];
	$ftp_username = $_GET['ftpuser'];
	$ftp_userpass = $_GET['ftppassword'];
		
		try{
	
	$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
	
	if(ftp_login($ftp_conn, $ftp_username, $ftp_userpass)){
		echo '1';
	}
	else{
		echo '2';
		//throw new Exception('Unable to log in');
	}
	
	// close connection
    ftp_close($ftp_conn);
	}
	
	catch(Exception $e){
		echo '2';
	}
		/*
        $server = 'ftp.' . $_GET['ftphost'];
        $username = $_GET['ftpuser'];
        $password = $_GET['ftppassword'];
//       $ftp_conn = ftp_connect($server);
        if (@ftp_login($server, $username, $password)) {
            echo '1';
        } else {
            echo '2';
        }
		*/
    }

    public function setting() {
        $data['title'] = 'Setting';
        $data['user'] = Auth::user();
        return view('setting', $data);
    }

    public function updateSetting() {
        $user = User::find(Auth::user()->id);
        $user->firstname = $_POST['firstname'];
        $user->lastname = $_POST['lastname'];
        $user->company = $_POST['company'];
        $user->shop_url = $_POST['shop_url'];
        $user->save();
        Session::flash('success', 'Profile Updated Successfully');
        return Redirect::to(URL::previous());
    }

    public function changepassword() {
        $password = Auth::user()->password;
        if (\Illuminate\Support\Facades\Hash::check($_POST['password'], $password)) {
            if ($_POST['newpassword'] == $_POST['confirmpasword']) {
                $id = Auth::user()->id;
                $newpass = \Illuminate\Support\Facades\Hash::make($_POST['newpassword']);
                User::where('id', '=', $id)->update(['password' => $newpass]);
                Session::flash('success', 'Password Updated successfully');
                return Redirect::to(URL::previous());
            } else {
                Session::flash('error', 'Password Does Not match Confirm Password');
                return Redirect::to(URL::previous());
            }
        } else {
            Session::flash('error', 'Invalid Old Password');
            return Redirect::to(URL::previous());
        }
    }
    public function userApproveOrders() {
        $data['title'] = 'Approved Orders';
        $data['orders'] = Orders::where(array('approved'=>1,'user_id'=>Auth::user()->id))->get();
        return view('orders', $data);
    }
    public function userIncompleteOrders() {
        $data['title'] = 'Incomplete Orders';
        $data['orders'] = Orders::where(array('approved'=>0,'user_id'=>Auth::user()->id,'shopusername'=>''))->get();
        return view('incompleteorders', $data);
    }
    
     function deleteOrder($id) {
        Orders::find($id)->delete();
        $error_message = 'Order Deleted Successfully';
        Session::flash('success', $error_message);
        return Redirect::to(URL::previous());
    }
    function updateorder($id) {
        $data['title'] = 'Update Order';
        $data['order'] = Orders::find($id);
        return view('step1update', $data);
    }

}
