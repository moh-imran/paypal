<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php include 'top.php';?>
	<body>
		<div id="page-wrapper">
		<?php include 'header.php';?>
		

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>Create Account</h2>
<!--						<p>Tell us what you think about our little operation.</p>-->

			<?php if( Session::get('message')){
                            $data = json_decode(Session::get('message'));
                            if($data){
                            foreach($data as $errors){?>
                            
                            <h6 class="alert alert-danger" style="color:red; font-size:20px;"> <?php echo  $errors[0];?></h6>
                        <?php }}}
                         if(Session::get('success')){ ?>
                            <h3 class="alert alert-success"><?php echo Session::get('success') ?></h3>
                            <?php }
                            if(Session::get('error')){ ?>
                            <h3 class="alert alert-danger"><?php echo Session::get('error') ?></h3>
                            <?php } ?>
					</header>
					<div class="box">
						<form method="post" action="<?php echo asset('registers')?>">
							<div class="row uniform 50%">
								<div class="6u 12u(mobilep)">
									<input type="text" name="fname" id="fname" value="" placeholder="First Name" />
								</div>
								<input type="hidden" name="_token" value="<?php echo csrf_token()?>">
								<div class="6u 12u(mobilep)">
									<input type="text" name="lname" id="lname" value="" placeholder="Last Name" />
								</div>
							</div>
							<div class="row uniform 50%">
								<div class="12u">
									<input type="email" name="email" id="email" value="" placeholder="Email" />
								</div>
							<div class="12u">
									<input type="text" name="company" id="company" value="" placeholder="Company" />
								</div>
							<div class="12u">
									<input type="text" name="shop_url" id="shop_url" value="" placeholder="Shop URL" />
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
										<li><input type="submit" value="Create Account" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>
		<?php include 'footer.php';?>
			

		</div>
	<?php include 'scripts.php';?>

			
	</body>
</html>