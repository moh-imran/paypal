
<!DOCTYPE HTML>
<!--
        Alpha by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
 <head>
        <title><?php echo 'Login - Paypal'?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

        <link href='<?php echo asset('assets/css/main.css') ?>' rel='stylesheet' type='text/css'>

        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body>
        <div id="page-wrapper">
            @extends ('header')

            <?php
//echo '<pre>';
//            print_R(Session::all());
            ?>
            <!-- Main -->
            <section id="main" class="container 75%">
                <header>
                    <h2>Login</h2>
<!--						<p>Tell us what you think about our little operation.</p>-->

                    <?php
                    if (Session::get('message'))
                        ;
                    $data = json_decode(Session::get('message'));
                    if ($data) {
                        foreach ($data as $errors) {
                            ?>

                            <h6 class="alert alert-danger"> <?php echo $errors[0]; ?></h6>
                        <?php }
                    }
                    if (Session::has('success')) {
                        ?>
                        <h3 class="alert alert-success"><?php echo Session::get('success') ?></h3>
<?php }
if (Session::has('error')) {
    ?>
                        <h3 class="alert alert-danger"><?php echo Session::get('error') ?></h3>
<?php } ?>
                </header>
                <div class="box">
                    <form method="post" action="{{ url('/checklogin') }}">

                        <div class="row uniform 50%">
                            <div class="12u">
                                <input type="email" name="email" id="email" value="" placeholder="Email" />
                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            </div>
                            <div class="12u">
                                <input type="password" name="password" id="password" value="" placeholder="Password" />
                            </div>

                        </div>
                        <!--
                                                                                <div class="row uniform 50%">
                                                                                        <div class="12u">
                                                                                                <textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
                                                                                        </div>
                                                                                </div>
                        -->
                        <div class="row uniform">
                            <div class="12u">
                                <ul class="actions align-center">
                                    <li><input type="submit" value="Login" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            @extends ('footer')


        </div>
        @extends ('scripts')


    </body>
</html>