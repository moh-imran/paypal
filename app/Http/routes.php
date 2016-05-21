<?php //

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */
/*Route::get('/', function () {
    $data['title'] = 'Home';
    return view('login', $data);
});
*/




Route::group(['middleware' => ['web']], function () {
    Route::get('forgot_password', function () {
        $data['title'] = 'Forget Password';
        return view('forgot_password', $data);
    });
});


Route::group(['middleware' => 'web'], function () {
Route::get('/', function () {
    if (Auth::guard('user')->check()) {
            return Redirect::to('dashboard');
        } else {
    $data['title'] = 'Home';
    return view('login', $data);
        }});
    Route::post('checklogin', 'IndexController@login');
    Route::post('registers', 'IndexController@register');
    Route::get('adminlogout', function() {
        Auth::guard('admin')->logout();
        return Redirect::to(URL::previous());
    });
    Route::get('userlogout', function() {
        Auth::guard('user')->logout();
        return Redirect::to(URL::previous());
    });
    Route::get('registers', function () {
//        echo Hash::make('ijaz');exit;
        $data['title'] = 'Register';
        return view('register', $data);
    });
    Route::get('/adminlogin', function() {
        if (Auth::guard('admin')->check()) {
            return Redirect::to('admindashboard');
        } else {
            $data['title'] = 'Login';
            return view('admin.login', $data);
        }
    });
    Route::post('adminlogin', 'IndexController@adminlogin');
});







Route::group(['middleware' => 'web'], function () {
    Auth::guard('user')->check();
    Route::auth();
    Route::get('dashboard', 'HomeController@index');
    Route::get('step1', 'HomeController@step1Show');
    Route::post('step1', 'HomeController@step1');
    Route::get('checktime', 'HomeController@checktime');
    Route::get('step2', 'HomeController@step2');
    Route::post('step2', 'HomeController@storeStep2');
    Route::get('usersetting', 'HomeController@setting');
    Route::get('userincompleteorders', 'HomeController@userIncompleteOrders');
    Route::get('userapproveorders', 'HomeController@userApproveOrders');
    Route::post('usersetting', 'HomeController@updateSetting');
    Route::post('changepassword', 'HomeController@changepassword');
    Route::get('checkftp', 'HomeController@checkftp');
    Route::get('deleteuserorder/{id}', 'HomeController@deleteOrder');
    Route::get('updateorder/{id}', 'HomeController@updateOrder');
});










Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('admindashboard', 'AdminController@dashboard');
    Route::get('users', 'AdminController@allUsers');
    Route::get('deleteuser/{id}', 'AdminController@deleteuser');
    Route::get('orders', 'AdminController@allOrders');
    Route::get('deleteorder/{id}', 'AdminController@deleteOrder'); 
    Route::get('approveorders', 'AdminController@approveOrders');
    Route::get('neworders', 'AdminController@newOrders');
    Route::get('incompleteorders', 'AdminController@incompleteOrders');
    Route::get('approveorder/{id}', 'AdminController@approveOrder'); 
});
