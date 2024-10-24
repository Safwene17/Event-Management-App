<?php

include_once('../../controllers/ClientController.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $clientClr = new ClientController();
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($clientClr->loginClient($email, $password)) {


            header("Location: ./index.php");

        } else {

            echo "<script>alert('Invalid email or password');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html class="no-js">
	<title>Mountis</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-custom.js"></script>
<body>
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="https://html.modernwebtemplates.com/">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class=""></button>
			</form>
		</div>
	</div>
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
		</div>
	</div>
	<div id="canvas">
		<div id="box_wrapper">
			<div class="header_absolute cover-background ds s-overlay s-parallax">
				<section class="page_title ds s-py-5">
					<div class="container">
						<div class="row">
							<div class="col-md-12 text-center">
								<h1 class="bold">Account - Login</h1>
							</div>
						</div>
					</div>
				</section>
			</div>
			<section class="ls s-py-80 s-py-md-120 s-py-xl-160">
				<div class="container">
					<div class="row">
						<main class="col-lg-12">
							<article>
								<div class="entry-content">
									<div class="woocommerce">
										<form class="woocomerce-form woocommerce-form-login login" method="post">
											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide text-center">
												<input type="text" placeholder="Username or email address*" class="w-100 form-control woocommerce-Input woocommerce-Input--text input-text" name="email" id="email" value="">
											</p>
											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide text-center">
												<input class="w-100 form-control woocommerce-Input woocommerce-Input--text input-text" placeholder="Password*" type="password" name="password" id="password">
											</p>
		
											<p class="form-row justify-content-start align-items-start">
												<button type="submit" class="woocommerce-Button button mt-0" name="login" value="Login">Login</button>
											</p>
											<p class="woocommerce-LostPassword lost_password text-left">
												<a href="signupClient.php">Sign Up For Free</a>
											</p>
                                            
										</form>
									</div>
								</div>
							</article>
						</main>
					</div>
				</div>
			</section>
		</div>
	</div>
	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/compressed.js"></script>
	<script src="js/main.js"></script>
	<script src="js/switcher.js"></script>
</body>
</html>