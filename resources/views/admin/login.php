<!DOCTYPE html>
<html lang="en">

<?php include 'includes/top.php';?>

  <body class="login-body">

    <div class="container">

        <form class="form-signin" method="post" action="<?php echo asset('adminlogin')?>">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input name="email" type="text" class="form-control" placeholder="Email" autofocus>
            <input name="password"  type="password" class="form-control" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <button class="btn btn-lg btn-login btn-block btn-xs" type="submit">Sign in</button>
        </div>
      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
<?php include 'includes/footer.php';?>
  </body>
</html>