
<!DOCTYPE HTML>
<!--
        Alpha by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <?php include 'top.php'; ?>
    <body>
        <div id="page-wrapper">
            <?php include 'header.php'; ?>

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
                        <?php
                        }
                    }
                    if (Session::has('success')) {
                        ?>
                        <h3 class="alert alert-success"><?php echo Session::get('success') ?></h3>
                    <?php
                    }
                    if (Session::has('error')) {
                        ?>
                        <h3 class="alert alert-danger"><?php echo Session::get('error') ?></h3>
<?php } ?>
                </header>
                <div class="box">
                    <form method="post" action="<?php echo asset('/checklogin') ?>">

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
<?php include 'footer.php'; ?>


        </div>
<?php include 'scripts.php'; ?>


    </body>
</html>