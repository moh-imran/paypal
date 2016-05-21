<!DOCTYPE HTML>
<!--
        Alpha by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <?php include 'top.php';?>
 <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <body>
        <div id="page-wrapper">
            <?php include 'header.php'; ?>
            
            
            <!-- Main -->
            <section id="main" class="container 75%">
                <header>
                    <h2>Book Order</h2>
<!--						<p>Tell us what you think about our little operation.</p>-->

                    <?php
                    if (Session::get('message'))
                        ;
                    $data = json_decode(Session::get('message'));
                    if ($data) {
                        foreach ($data as $errors) {
                            ?>

                            <h6 class="alert alert-danger" style="color:red; font-size:20px;"> <?php echo $errors[0]; ?></h6>
    <?php }
}
?>
                            
                            <?php
                         if(Session::get('success')){ ?>
                            <h3 class="alert alert-success"><?php echo Session::get('success') ?></h3>
                            <?php }
                            if(Session::get('error')){ ?>
                            <h3 class="alert alert-danger"><?php echo Session::get('error') ?></h3>
                            <?php } ?>
                </header>
                <div class="box">
                    <h3 id="errordiv" class="alert alert-danger " style="display: none">Invalid Ftp Details</h3>
                    <form id="step2" method="post" action = "<?php echo asset('step2'); ?>">
                        <div class="row uniform 50%">
                            <div class="6u 12u(mobilep)">
                                <input required type="text" name="shopusername" id="fname" value="" placeholder="Shop Admin Username" />
                            </div>
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <div class="6u 12u(mobilep)">
                                <input type="password" name="shoppassword" id="lname" value="" placeholder="Shop Admin Password " />
                            </div>
                        </div>
                        <div class="row uniform 50%">
                            <div class="12u">
                                <input required type="text" name="shopurl" id="email" value="" placeholder="Shop Aadmin URL" />
                            </div>
                            <div class="12u">
                                <input required type="text" id="ftphost" name="ftphost"  value="" placeholder="FTP Host" />
                            </div>
                            <div class="12u">
                                <input required type="text" id="ftpuser" name="ftpuser"  value="" placeholder="FTP User" />
                            </div>
                            <div class="12u">
                                <input required type="password" name="ftppassword" id="ftppassword" value="" placeholder="FTP Password" />
                            </div>
                            <div class="12u">
                                <input required type="text" name="paypallive"  value="" placeholder="PayPal LIVE Klienten-ID" />
                            </div>
                            <div class="12u">
                                <input required type="text" name="paysecret" value="" placeholder="PayPal LIVE Secret-ID" />
                            </div>
                           
                           
                        </div
                        <div class="row uniform" >
                            <div class="12u" id="validate">
                                <ul class="actions align-center">
                                    <li><input  type="button" value="Validate Data" onclick="Checkftp()"/></li>
                                </ul>
                            </div>
                            
                            <div class="12u" style="display: none" id="submitdata">
                                <ul class="actions align-center">
                                    <li><input  type="submit" value="Submit" /></li>
                                </ul>
                            </div>
                       
                       
                    </form>
                </div>
            </section>
        <?php include 'footer.php'; ?>


        </div>
<?php include 'scripts.php'; ?>


    </body>
    <script type="text/javascript">
    function Checkftp(){
        ftphost=$('#ftphost').val();
        ftpuser=$('#ftpuser').val();
        ftppassword=$('#ftppassword').val();
        
              $.ajax({
                            type: "GET",
                            data: {"ftphost": ftphost,"ftpuser": ftpuser,"ftppassword": ftppassword},
                            url: "<?php echo asset('checkftp'); ?>",
                            dataType:"json",
                            success: function (data) {
                                if(data == 1){
                                 $('#validate').hide();   
                                 $('#submitdata').show();
                                }else{
                                    $('#errordiv').show();
                                }
                                }
                            });
       
    }
    
    </script>
</html>