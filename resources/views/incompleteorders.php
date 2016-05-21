<!DOCTYPE html>
<html lang="en">
  <?php include 'includes/top.php';?>

  <body>

  <section id="container" class="">
      <!--header start-->
<?php include 'includes/header.php';?>
      <!--header end-->
      <!--sidebar start-->
      <?php include 'includes/sidebar.php';?>
      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                      Editable Table
                  </header>
                  <div class="panel-body">
                      <div class="adv-table editable-table table-responsive">
                       
                          <div class="space15"></div>
                          <?php
                         if(Session::get('success')){ ?>
                            <h3 class="alert alert-success"><?php echo Session::get('success') ?></h3>
                            <?php }
                            if(Session::get('error')){ ?>
                            <h3 class="alert alert-danger"><?php echo Session::get('error') ?></h3>
                            <?php } ?>
                          <table class="table table-striped table-hover table-bordered" id="editable-sample">
                              <thead>
                              <tr>
                                   <th>Username</th>
                                  <th>Email</th>
                                  <th>Company</th>
                                  <th>Shop Url</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Edit</th>
                                  
                                  <th>Delete</th>
                              </tr>
                              </thead>
                              <tbody> <?php foreach ($orders as $order) {?>
                              <tr class="">
                                 
                                  <td><?php echo $order->fname.' '.$order->lname?></td>
                                  <td><?php echo $order->email?></td>
                                  <td><?php echo $order->company?></td>
                                  <td><?php echo $order->shop_url?></td>
                                  <td><?php echo $order->date?></td>
                                  <td><?php echo $order->time?></td>
                                  <td><a class="delete" href="<?php echo asset('updateorder/'.$order->id);?>" >Edit</a></td>
                               
                                  <td><a class="delete" href="<?php echo asset('deleteuserorder/'.$order->id);?>" onclick="return confirm('Are you sure you want delete');">Delete</a></td>
                                  
                              </tr><?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>
<?php include 'includes/footer.php'; ?>
      <!--footer end-->
  </section>]
      <!-- END JAVASCRIPTS -->
      <script>
          jQuery(document).ready(function() {
              EditableTable.init();
          });
      </script>


  </body>

</html>
