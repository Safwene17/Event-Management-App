<?php
session_start();

require_once('../../models/Client.php');
require_once('../../controllers/ClientController.php');

$clientController = new ClientController();
$currentClient = $clientController->getClient($_SESSION['idClient']);

if ($currentClient && isset($_POST['savechanges'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password_current'];


    $currentClient->setFirstName($firstName);
    $currentClient->setLastName($lastName);
    $currentClient->setPhone($phone);
    $currentClient->setEmail($email);
    $currentClient->setPassword($password);


    $res = $clientController->modifyClient($currentClient);

    if ($res) {
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        header("Location: index.php");
        exit;
    } else {
        echo "Failed to update profile. Please try again.";
    }
}
?>
<!DOCTYPE html>

<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from html.modernwebtemplates.com/mountis/shop-account-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:38:48 GMT -->
<head>
	<title>Mountis</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-custom.js"></script>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->

</head>

<body>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="color-main">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
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

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div><!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<div class="header_absolute cover-background ds s-overlay s-parallax">
				<!--topline section visible only on small screens|-->
				<section class="page_topline ds s-py-10 c-my-10">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-12 col-md-4 col-xl-4">
								<div class="media">
									<span class="icon-styled ">
										<i class="fa color-main2 fa-phone"></i>
									</span>
									<div class="media-body">
										<span class="small-text">Booking your trip</span>
										<p>3 (800) 234 3695</p>
									</div>
								</div>
							</div>
							<div class="col-md-4 text-center hidden-below-md">
								<a href="index.html" class="logo">
									<img src="images/logo.png" alt="img">
								</a>
							</div>
							<div class="col-12 col-md-4 col-xl-4">
								<div class="media">
									<div class="media-body align-items-end">
										
										<p><?php
                                                if (isset($_SESSION['firstName']) && !empty($_SESSION['firstName'])) {
                                                    echo 'Welcome ' . $_SESSION['firstName']. " ". $_SESSION['lastName'];
                                                }
                                                else{
                                                    echo 'Welcome ';
                                                }
                                            ?></p>
									</div>
									<span class="icon-styled ">
										<i class="fa color-main2 fa-pencil"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--eof topline-->

				<!-- header with two Bootstrap columns - left for logo and right for navigation and includes (search, social icons, additional links and buttons etc -->
				<header class="page_header ls justify-nav-center">
					<div class="container">
						<div class="row align-items-lg-end align-items-center">
							<div class="col-10 col-md-4 hidden-above-md d-flex">
								<a href="index.html" class="logo">
									<img src="images/logo.png" alt="img">
								</a>

								<div class="media-wrap">
									<div class="media">
										<span class="icon-styled ">
											<i class="fa color-main2 fa-phone"></i>
										</span>
										<div class="media-body">
											<span class="small-text">Booking your trip</span>
											<p>3 (800) 234 3695</p>
										</div>
									</div>
									<div class="media">
										<div class="media-body align-items-end">
											<span class="small-text">our emailaddress</span>
											<p><a href="https://html.modernwebtemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e4898b918a908d97a48b82828d8781ca878b89">[email&#160;protected]</a></p>
										</div>
										<span class="icon-styled ">
											<i class="fa color-main2 fa-pencil"></i>
										</span>
									</div>
								</div>
							</div>

							<div class="col-lg-12 col-1">
								<!-- main nav start -->
								<nav class="top-nav">
									<ul class="nav sf-menu">


										<li >
											<a href="index.php">HomePage</a>
										</li>

                                        <li >
											<a href="categories.php">Events</a>
										</li>
						
										<li class="active">
											<?php if (!isset($_SESSION['idClient'])): ?>
												<a href="loginClient.php">Sign in</a>
											<?php else: ?>
												<a style="cursor: pointer"> Account</a>
												<ul>
													
													<li>
														<a href="editAccount.php">Profile</a>
													</li>
													<li>
														<a href="logout.php">Logout</a> <!-- Logout option here -->
													</li>
												</ul>
											<?php endif; ?>
										</li>
									</ul>


								</nav>
								<!-- eof main nav -->
							</div>

						</div>
					</div>
					<!-- header toggler -->
					<span class="toggle_menu"><span></span></span>
				</header>

				<section class="page_title ds s-py-5">
					<div class="container">
						<div class="row">



						</div>
					</div>
				</section>
			</div>


			<section class="ls s-py-80 s-py-md-120 s-py-xl-160">
				<div class="container">
					<div class="row">

						<main class="col-lg-12">
							<article>
								<header class="entry-header mb-20">
									<h5 class="pull-left">Account details</h5>
									<span class="edit-link">
										
									</span>
								</header>
								<!-- .entry-header -->
								<div class="entry-content">
									<div class="woocommerce">
										


										<div class="woocommerce-MyAccount-content">

											<form class="woocommerce-EditAccountForm edit-account" action="#" method="post">


												<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-wide">
													<label for="account_first_name">First name </label>
													</label>
													<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="firstName" id="account_first_name" value="<?= $_SESSION['firstName'] ?>">
												</p>
												<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
													<label for="account_last_name">Last name </span>
													</label>
													<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="lastName" id="account_last_name" value="<?= $_SESSION['lastName'] ?>">
												</p>
												
												<p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-wide">
													<label for="account_phone">phone </span>
													</label>
													<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="phone" id="account_last_name" value="<?= $_SESSION['phone'] ?>">
												</p>

												<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
													<label for="account_email">Email address </span>
													</label>
													<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="account_email" value="<?= $_SESSION['email'] ?>">

												</p>
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="password_current">Password</label>
														<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" value="<?= $_SESSION['password'] ?>">
													</p>
													
												<div class="clear"></div>
												<p>
													<input type="submit" class="woocommerce-Button button" name="savechanges" value="Save changes">
												</p>
											</form>

										</div>
									</div>
								</div>
								<!-- .entry-content -->
							</article>

						</main>

					</div>

				</div>
			</section>

			<footer class="page_footer ds s-overlay s-parallax s-pt-80 s-pb-30 s-pb-md-65 s-pt-md-120 s-pt-lg-135 s-pb-xl-110 c-mb-20 c-gutter-60">
				<div class="container">
					<div class="row">
						<div class=" col-lg-4 text-center animate" data-animation="fadeInUp">
							<div class="divider-25 d-none d-xl-block"></div>
							<div class="widget mb-0">

								<h3 class="widget-title">Newsletter</h3>

								<p>
									We promise not to spam!
								</p>

								<form class="signup" action="https://html.modernwebtemplates.com/">

									<input id="mailchimp_email" name="email" type="email" class="form-control mailchimp_email text-center" placeholder="Email Address">

									<button type="submit" class="btn btn-outline-maincolor mt-30">
										Subscribe
									</button>
									<div class="response"></div>
								</form>

							</div>
							<div class="divider-50"></div>
						</div>

						<div class=" col-lg-4 text-center animate" data-animation="fadeInUp">
							<div class="widget widget_icons_list">
								<a href="index.html" class="logo flex-column text-center pb-0">
									<img src="images/logo.png" alt="logo">
								</a>
								<p>We are one of San Diego's most active social groups. Every month we create a variety of fun & interesting events.</p>
								<ul class="mb-10">
									<li class="icon-inline">
										<div class="icon-styled icon-top color-main fs-14">
											<i class="fa fa-map-marker"></i>
										</div>
										<p>192 Lemke Stream, San Diego, USA</p>
									</li>
									<li class="icon-inline">
										<div class="icon-styled icon-top color-main fs-14">
											<i class="fa fa-phone"></i>
										</div>
										<p>+8 (800) 247 2698 (operator)</p>
									</li>
									<li class="icon-inline">
										<div class="icon-styled icon-top color-main fs-14">
											<i class="fa fa-pencil"></i>
										</div>
										<p>
											<a href="#"><span class="__cf_email__" data-cfemail="d9b4b6acb7adb0aa86adabb0a999bca1b8b4a9b5bcf7bab6b4">[email&#160;protected]</span></a>
										</p>
									</li>
								</ul>
								<span class="social-icons">
									<a href="#" class="fa fa-facebook bg-light border-icon rounded-icon" title="facebook"></a>
									<a href="#" class="fa fa-twitter bg-light border-icon rounded-icon" title="twitter"></a>
									<a href="#" class="fa fa-google bg-light border-icon rounded-icon" title="google"></a>
								</span>
							</div>
						</div>

						<div class="col-lg-4 animate" data-animation="fadeInUp">
							<div class="divider-25 d-none d-xl-block"></div>
							<div class="widget widget_instagram">
								<h3 class="widget-title">Instagram</h3>
								<div class="instafeed"></div>
							</div>
						</div>
					</div>
				</div>
			</footer>

			<section class="page_copyright ls s-py-5">
				<div class="container">
					<div class="row align-items-center">
						<div class="divider-20 d-none d-lg-block"></div>
						<div class="divider-10 d-none d-md-block"></div>
						<div class="col-md-12 text-center">
							<p>&copy; Copyright <span class="copyright_year">2018</span> All Rights Reserved</p>
						</div>
						<div class="divider-20 d-none d-lg-block"></div>
						<div class="divider-10 d-none d-md-block"></div>
					</div>
				</div>
			</section>


		</div><!-- eof #box_wrapper -->
	</div><!-- eof #canvas -->


	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/compressed.js"></script>
	<script src="js/main.js"></script>
	<script src="js/switcher.js"></script>

</body>


<!-- Mirrored from html.modernwebtemplates.com/mountis/shop-account-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:38:48 GMT -->
</html>