<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Forget Password</title>

<!--   Bootstrap CSS   -->
<link href='<?php echo asset('css/bootstrap.min.css')?>' rel='stylesheet' type='text/css'>

 <!--    Font Awesome CSS   -->
<link href='<?php echo asset('css/font-awesome.min.css')?>' rel='stylesheet' type='text/css'>

<!-- Theme style -->
  <link rel="stylesheet" href="<?php echo asset('css/admin.css')?>">
  <link rel="stylesheet" href="<?php echo asset('css/skins.min.css')?>">
  
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo asset('css/daterangepicker-bs3.css')?>">
 
<!-- Table Sorter styles -->
<link rel="stylesheet" href="<?php echo asset('css/theme.blue.css')?>">


<!--    Custome CSS   -->
<link href='<?php echo asset('css/styles.css')?>' rel='stylesheet' type='text/css'>

</head>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-logos"><img src="<?php echo asset('images/coverphoto.jpg')?>" class="img-responsive" alt="" /></div>
            <div class="panel panel-default remember-wrap">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Reset Password
                                </button> | 
                                <a href="<?php echo asset('login')?>" class="click">Login</a> | <a href="<?php echo asset('register')?>">Don't have an account? Register</a>
                            </div>
                            
                        </div>
                    </form>
                    <div class="form-group">
                                <div class="footer-holder" style="text-align: center;">
                                    <span><a href="https://www.facebook.com/Apredictivecom-792063704233127/?ref=hl" target="_blank"><img src="<?php echo asset('images/facebookIcon.png')?>" alt="" /></a></span>
                                    <span><a href="http://ewebdata.com/new-client-registration/" class="reseller-btn" target="_blank">Reseller Client Register</a></span>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
