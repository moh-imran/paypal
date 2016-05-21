<!DOCTYPE html>
<html lang="en">

    <?php include 'includes/top.php'; ?>

    <body>

        <section id="container" class="">
            <?php include 'includes/header.php'; ?>
            <!--header end-->
            <!--sidebar start-->
            <?php include 'includes/sidebar.php'; ?>
            <section id="main-content">
                <section class="wrapper">
                    <!-- page start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <?php echo $title ?>
                                </header>
                                <div class="panel-body">
                                    <?php if (Session::get('success')) { ?>
                                        <h3 class="alert alert-success"><?php echo Session::get('success') ?></h3>
                                    <?php }
                                    if (Session::get('error')) {
                                        ?>
                                        <h3 class="alert alert-danger"><?php echo Session::get('error') ?></h3>
                                    <?php } ?>
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo asset('usersetting') ?>">
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Firstname</label>
                                                <div class="col-lg-10">
                                                    <input required=""value="<?php echo $user->firstname ?>" class=" form-control" id="firstname" name="firstname" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="lastname" class="control-label col-lg-2">Lastname</label>
                                                <div class="col-lg-10">
                                                    <input required value="<?php echo $user->lastname ?>" class=" form-control" id="lastname" name="lastname" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Email</label>
                                                <div class="col-lg-10">
                                                    <input required value="<?php echo $user->email ?>" class="form-control " id="email" readonly name="email" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Company</label>
                                                <div class="col-lg-10">
                                                    <input required value="<?php echo $user->email ?>" class="form-control " id="password" name="company" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Shop Url</label>
                                                <div class="col-lg-10">
                                                    <input required value="<?php echo $user->shop_url ?>" class="form-control " id="confirm_password" name="shop_url" type="text" />
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="col-lg-10">
                                                    <a href="#myModal" data-toggle="modal" class="btn btn-xs btn-success">
                                                        Change Password
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-danger" type="submit">Save</button>
                                                    <button class="btn btn-default" type="button">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                    <h4 class="modal-title">Form Tittle</h4>
                                </div>
                                <div class="modal-body">

                                    <form role="form" method="post" action="changepassword">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Old Password</label>
                                            <input required type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">New Password</label>
                                            <input required type="password" class="form-control" id="" name="newpassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password</label>
                                            <input required type="password" class="form-control" id="" name="confirmpasword">
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- page end-->
                </section>
            </section>
            <?php include 'includes/footer.php'; ?>

    </body>

</html>
