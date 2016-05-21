
			<!-- Header -->
				<header id="header">
					<h1><a href="<?php echo asset('/')?>">Paypal Plus</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="<?php echo asset('/')?>">Home</a></li>
                                                        <?php if (Auth::user()){ ?>
                                                        
                                                        <li><a href="<?php echo asset('userlogout')?>" class="button">Sign Out</a></li><?php } else { ?>
							<li><a href="<?php echo asset('registers')?>" class="button">Sign Up</a></li><?php } ?>
                                                        
						</ul>
					</nav>
				</header>