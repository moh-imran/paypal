<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

//        $data['message'] = $e->getMessage();
//        echo '<pre>'; $data['code']=$e->getCode(); print_r($data);exit;
//        return response()->view('errors/errors',$data);
//        return parent::render($request, $e);
//        $data['message'] = $e->getMessage();
//        $data['code']=$e->getCode();
//        $code=$e->getCode();
//        echo '<pre>';
//        print_r($e->getUrl());
//////        print_r($e->getTrace());
////        exit;
//       echo $e->getUrl();
//        if($code == 0){
//            $message = $e->getMessage();
//            \Illuminate\Support\Facades\Session::flash('error', $message);
//          return     \Illuminate\Support\Facades\Redirect::to(\Illuminate\Support\Facades\URL::previous());  
//        }
       return parent::render($request, $e); 
       exit;
        if($e->getUrl() == 'https://api.paypal.com/v1/payments/payment'){
            if($e->getCode()=='400'){
         $message = 'Sorry Expired Date';       
            }elseif ($e->getCode()=='500') {
               $message = 'Sorry System Busy'; 
            } else{
              $message =$e->getMessage();  
            }
           }else{
               $message = $e->getMessage(); 
           }
        \Illuminate\Support\Facades\Session::flash('error', $message);
    return     \Illuminate\Support\Facades\Redirect::to(\Illuminate\Support\Facades\URL::previous());
//        }else{
//            echo 'dada';exit;
//        $data['message'] = $e->getMessage();
//        $data['code']=$e->getCode();  
//        return response()->view('errors/errors',$data);
//        }

    }
}
