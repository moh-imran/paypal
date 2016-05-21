<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\User;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
USE Illuminate\Support\Facades\Hash;

class IndexController extends Controller {

///register function//////
    public function register() {
        $validator = Validator::make(
         array(

            'firstName' => $_POST['fname'],
            'lastName' => $_POST['lname'],            
            'email' => $_POST['email'],
            'company' => $_POST['company'],
            'shop_url' => $_POST['shop_url']
         ),

         array(

            'firstName' =>  'required',
            'lastName'  =>  'required',
            'company'  =>  'required',
            'shop_url'  =>  'required',            
            'email'     =>  'required | email | unique:users'

            )

        );
        
        if($validator->fails()){
                $messages = $validator->messages();
                return redirect('registers')->with('message', $messages);
        }
        
        else{
        
            $user = new User; /// createing an instance of user model

			
            $user->firstname = $_POST['fname'];
            $user->lastname = $_POST['lname'];
            $user->email = $_POST['email'];
            $user->company = $_POST['company'];
            $user->shop_url = $_POST['shop_url'];
            $password = str_random(6);
			$user->password = Hash::make($password);

            $flago = $user->save();
            
                          // echo str_random(6);
             $data['password'] = $password;
             $data['email']=$_POST['email'];
//            Mail::send('registerMail', $data , function ($m) use ($user) {
//           
//                $m->from('test@vengile.com', 'Paypal Plus');
//                $m->to($user->email, $user->name)->subject('Welcome to Paypal Plus');
//            });
            
           Session::flash('success','Password has been send via Email ');
           return Redirect::to('registers');  
            

        }
    }

    public function login() {
        $auth = auth()->guard('user');
        if ($auth->attempt(['password' => $_POST['password'], 'email' => $_POST['email']])) {
            return redirect()->intended('dashboard');
        } else {
            $error_message = 'Invalid Email or Password';
            Session::flash('error', $error_message);
            return Redirect::to(URL::previous());
        }
    }

    public function adminlogin() {
        $auth = auth()->guard('admin');
        if ($auth->attempt(['password' => $_POST['password'], 'email' => $_POST['email']])) {
            return redirect('admindashboard');
        } else {
            $error_message = 'Invalid Email or Password';
            Session::flash('error', $error_message);
            return Redirect::to(URL::previous());
        }
    }

}
