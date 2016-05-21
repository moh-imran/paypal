<!DOCTYPE html>
<html lang="en">
  
<?php include 'includes/top.php';?>

  <body>

  <section id="container" >
      <!--header start-->
<?php include 'includes/header.php';?>
      <!--header end-->
      <!--sidebar start-->
      <?php include 'includes/sidebar.php';?>
      <section id="main-content">
          <?php
                         if(Session::get('success')){ ?>
                            <h3 class="alert alert-success"><?php echo Session::get('success') ?></h3>
                            <?php }
                            if(Session::get('error')){ ?>
                            <h3 class="alert alert-danger"><?php echo Session::get('error') ?></h3>
                            <?php } ?>
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                 
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <a href="<?php echo asset('step1')?>">
                          <div class="value">
                              <h1 class=" ">
                               
                              </h1>
                              <p>Place Order</p>
                          </div>
                          </a>
                      </section>
                  </div>
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <a href="<?php echo asset('userapproveorders')?>">
                          <div class="value">
                              <h1 class=" ">
                                  
                              </h1>
                              <p>Approved Order</p>
                          </div>
                          </a>
                      </section>
                  </div>
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <a href="<?php echo asset('userincompleteorders')?>">
                          <div class="value">
                              <h1 class=" ">
                         
                              </h1>
                              <p>Incomplete Order</p>
                          </div>
                          </a>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-windows"></i>
                          </div>
                          <a href="<?php echo asset('usersetting')?>">
                          <div class="value">
                              <p>Setting</p>
                          </div>
                          </a>
                      </section>
                  </div>
              </div>

          </section>
      </section>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
<?php include 'includes/footer.php'; ?>
    
  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
