<?php
session_start();
require_once('../../controllers/EventController.php');
require_once('../../controllers/CategoryController.php');

$categoryCtr = new CategoryController();
$categories = $categoryCtr->listeCategory();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_event'])) {
    // Other form field values
    $title = $_POST['title'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $category = $_POST['category'];
    $localisation = $_POST['localisation'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];
    $valid = 1;
    $idClient = isset($_SESSION['idClient']) ? $_SESSION['idClient'] : null;

    // Check if user is logged in
    if ($idClient === null) {
        echo "User not logged in.";
        exit;
    }

    // Handle image upload
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageDir = '../../upload/'; // Directory where images will be stored
        $imageName = uniqid() . '_' . $_FILES['image']['name']; // Generate a unique filename
        $imagePath = $imageDir . $imageName;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            echo "Failed to upload image.";
            exit;
        }
    }

    // Create Event object
    $event = new Event();
    $event->setTitle($title);
    $event->setDate(new DateTime($date));
    $event->setDuration($duration);
    $event->setIdCategory($category);
    $event->setLocalisation($localisation);
    $event->setCapacity($capacity);
    $event->setDescription($description);
    $event->setValid($valid);
    $event->setIdClient($idClient);
    $event->setImage($imagePath); // Set image path

    // Insert event into database
    $eventCtr = new EventController();
    $result = $eventCtr->insertEvent($event);

    if ($result) {
		$_SESSION['message'] = "Your event has been submitted and is awaiting approval by an administrator.";

        header("Location: listofEventsInCategory.php?idCategory=$category");
    } else {
        echo "<script>alert(error adding)</script>";
    }
}
?>



<!DOCTYPE html>
<html class="no-js">

<!-- Mirrored from html.modernwebtemplates.com/mountis/shop-account-address-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:38:49 GMT -->
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
										<span class="small-text"></span>
										<p>
                                           
                                            <?php
                                                if (isset($_SESSION['firstName']) && !empty($_SESSION['firstName'])) {
                                                    echo 'Welcome ' . $_SESSION['firstName']. " ". $_SESSION['lastName'];
                                                }
                                                else{
                                                    echo 'Welcome Guest';
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
											<p><a href="https://html.modernwebtemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c9a4a6bca7bda0ba89a6afafa0aaace7aaa6a4">[email&#160;protected]</a></p>
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


										<li class="active">
											<a href="index.php">HomePage</a>
										</li>

                                        <li >
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
								<h1 class="bold">Create your own event</h1>
							
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
								<div class="entry-header mb-20">
									<h3>Create Event</h3>
									<span class="edit-link">										
									</span>
								</div>
								<!-- .entry-header -->
								<div class="entry-content">
									<div class="woocommerce">
										<div class="woocommerce-MyAccount-content">

										<form method="POST" action="" enctype="multipart/form-data">
											<div class="woocommerce-address-fields">
												<div class="woocommerce-address-fields__field-wrapper">

													<p class="form-row form-row-wide validate-required" id="title_field" data-priority="10">
														<label for="title" class="">Title
															<abbr class="required" title="required">*</abbr>
														</label>
														<input type="text" class="input-text" name="title" id="title" placeholder="" value="" autocomplete="given-name" autofocus="autofocus" required>
													</p>

													<p class="form-row form-row-wide validate-required" id="date_field" data-priority="20">
														<label for="date" class="">Date
															<abbr class="required" title="required">*</abbr>
														</label>
														<input type="date" class="input-text" name="date" id="date" placeholder="" value="" autocomplete="family-name" required>
													</p>

													<p class="form-row form-row-wide" id="duration_field" data-priority="30" placeholder="Duration in hours">
														<label for="duration" class="">Duration
															<abbr class="required" title="required">*</abbr>
														</label>
														<input type="number" class="input-text" name="duration" id="duration" placeholder="" value="" autocomplete="organization" required>
													</p>

													<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="category_field" data-priority="40">
														<label for="category" class="">Category
															<abbr class="required" title="required">*</abbr>
														</label>
														<select name="category" id="category" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true" required>
															<option value="">Select a category...</option>
															<?php
															foreach ($categories as $category) {
																echo '<option value="' . $category['idCategory'] . '">' . $category['nameCategory'] . '</option>';
															}
															?>
														</select>
													</p>

													<p class="form-row form-row-wide address-field validate-required" id="localisation_field" data-priority="50">
														<label for="localisation" class="">Localisation
															<abbr class="required" title="required">*</abbr>
														</label>
														<input type="text" class="input-text" name="localisation" id="localisation" value="" autocomplete="address-line1" required>
													</p>

													<p class="form-row form-row-wide address-field validate-required" id="capacity_field" data-priority="70">
														<label for="capacity" class="">Capacity
															<abbr class="required" title="required">*</abbr>
														</label>
														<input type="number" class="input-text" name="capacity" id="capacity" placeholder="" value="" autocomplete="address-level2" required>
													</p>

													<p class="form-row form-row-wide address-field validate-required" id="description_field" data-priority="80">
														<label for="description" class="">Description
															<abbr class="required" title="required">*</abbr>
														</label>
														<textarea class="input-text" name="description" id="description" placeholder="" value="" autocomplete="address-level2" required></textarea>
													</p>
													
													<p class="form-row form-row-wide" id="image_field" data-priority="90">
														<label for="image" class="">Image</label>
														<input type="file" name="image" id="image">
													</p>
												</div>
												<p>
													<input type="submit" class="button" name="save_event" value="Save event">
												</p>
											</div>
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
											<a href="#"><span class="__cf_email__" data-cfemail="90fdffe5fee4f9e3cfe4e2f9e0d0f5e8f1fde0fcf5bef3fffd">[email&#160;protected]</span></a>
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


<!-- Mirrored from html.modernwebtemplates.com/mountis/shop-account-address-edit.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:38:49 GMT -->
</html>