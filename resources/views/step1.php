<!DOCTYPE HTML>
<!--
        Alpha by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <?php include 'top.php';?>
 
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="http:stylesheet" href="/resources/demos/style.css">
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    
      <script>
$(function() {
    $( "#datepicker" ).datepicker({
       dateFormat: 'yy-m-d',
       minDate:0
    });
  });
  </script>
    <body>
        <div id="page-wrapper">
            <?php include 'header.php'; ?>
            
            
            <!-- Main -->
            <section id="main" class="container 75%">
                <header>
                    <h2>Book Order</h2>
<!--						<p>Tell us what you think about our little operation.</p>-->

                    <?php
                    if (Session::get('message'));
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
                    <form method="post" action="<?php echo asset('step1'); ?>">
                        <div class="row uniform 50%">
                            <div class="6u 12u(mobilep)">
                                <input required type="text" name="fname" id="fname" value="" placeholder="First Name" />
                            </div>
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            <div class="6u 12u(mobilep)">
                                <input type="text" name="lname" id="lname" value="" placeholder="Last Name" />
                            </div>
                        </div>
                        <div class="row uniform 50%">
                            <div class="12u">
                                <input required type="email" name="email" id="email" value="" placeholder="Email" />
                            </div>
                            <div class="12u">
                                <input required type="text" name="company" id="company" value="" placeholder="Company" />
                            </div>
                            <div class="12u">
                                <input required type="text" name="shop_url" id="shop_url" value="" placeholder="Shop URL" />
                            </div>
                            <div required class="12u">
                                <input type="text" name="date" id="datepicker" value="" placeholder="Date" onchange="checktimes()"/>
                            </div>
                            <div class="12u">
                                <select name="timeslot" id="timeslot" >
                                    <option value="">Please Select Your Slot</option>>
                                </select>
                            </div>
                        </div
                        <div class="row uniform">
                            <div class="12u">
                                <ul class="actions align-center">
                                    <li><input id="submit" disabled type="submit" value="Next Step" /></li>
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
    <script type="text/javascript">
    function checktimes(){
        dates=$('#datepicker').val();
        
              $.ajax({
                            type: "GET",
                            data: {"dates": dates},
                            url: "<?php echo asset('checktime'); ?>",
                            dataType:"json",
                            success: function (data) {
                                 var options = '';
                                 var selectbox = $('#timeslot');
                                if(data != ''){
                            for(var subdata in data){
                             options = options + '<option value="' + data[subdata] + '">' + data[subdata] + '</option>'
                          }
                             selectbox.html(options);  
                             $("#submit").removeAttr('disabled');
                            }
                            else{
                                
                                alert("No Slot Available ");
                                 options = options + '<option value="">No Slot Available</option>'
            selectbox.html(options);                    
            $("#submit").attr('disabled','disabled');
                                
                            }}
                            });
       
    }
    
    </script>
</html>