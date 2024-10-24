<?php
session_start();

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from html.modernwebtemplates.com/mountis/gallery-excerpt.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:37:55 GMT -->
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
		<div class="preloader_image pulse"></div>
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
										
										<p>
                                        <?php
                                                if (isset($_SESSION['firstName']) && !empty($_SESSION['firstName'])) {
                                                    echo  'Welcome ' .$_SESSION['firstName']. " ". $_SESSION['lastName'];
                                                }
                                                else{
                                                    echo 'Welcome ';
                                                }
                                            ?>
                                        </p>
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
											<p><a href="https://html.modernwebtemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2944465c475d405a69464f4f404a4c074a4644">[email&#160;protected]</a></p>
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

                                        <li class="active">
											<a href="categories.php">Events</a>
										</li>
						
										<li>
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

							<div class="col-md-12 text-center">
								<h1 class="bold">Which category do you want to check?</h1>
							</div>

						</div>
					</div>
				</section>
			</div>


			<section class="ls s-pb-80  s-pt-65 s-pb-md-120 s-pt-md-95 s-py-xl-160 container-px-0">
				<div class="container">
					<div class="row">

					<div class="col-lg-12">
						<div class="row gallery-excerpt isotope-wrapper masonry-layout c-mb-30" data-filters=".gallery-filters">
							<?php
								require_once('../../controllers/CategoryController.php');
								$categoryCtr = new CategoryController();
								$res = $categoryCtr->listeCategory();
								foreach ($res as $row) {
									$imagePath = !empty($row['image']) ? $row['image'] : '../../upload/'; // Provide a default image path if needed
							?>
							<div class="col-xl-4 col-md-6 hikes">
								<div class="vertical-item text-center content-padding hero-bg">
									<div class="item-media">
										<img src="<?= $imagePath ?>" alt="img">
										<div class="media-links">
											<a class="abs-link" title="" href="./listofEventsInCategory.php?idCategory=<?= $row['idCategory'] ?>"></a>
										</div>
									</div>
									<div class="item-content">
										<h5 class="mt-2 text-uppercase">
											<a href="./listofEventsInCategory.php?idCategory=<?= $row['idCategory'] ?>"><?= $row['nameCategory'] ?></a>
										</h5>
										<p class="mt-4 px-lg-3"><?= $row['description']?></p>
									</div>
								</div>
							</div>
							<?php
								}
							?>
						</div>
					</div>




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
											<a href="#"><span class="__cf_email__" data-cfemail="1f72706a716b766c406b6d766f5f7a677e726f737a317c7072">[email&#160;protected]</span></a>
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


<!-- Mirrored from html.modernwebtemplates.com/mountis/gallery-excerpt.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:37:55 GMT -->
</html>