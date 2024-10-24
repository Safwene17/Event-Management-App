<?php
session_start();
require_once('../../controllers/EventController.php');
require_once('../../controllers/ParticipantsController.php');

$eventCtr = new EventController();
$participantsCtr = new ParticipantsController();

if (isset($_GET['idEvent'])) {
	$eventData = $eventCtr->getEvent($_GET['idEvent']); //for displaying data
	$numParticip = $participantsCtr->getNumberOfParticipants($_GET['idEvent']); //to display number of participants 
	$clientId = $_SESSION['idClient']; // Assuming the user is logged in and idClient is stored in session
	$isParticipant = $participantsCtr->isParticipantExist($_GET['idEvent'], $clientId); //to check if the user logged in has joined or not in the event
} else {
	header('Location: ./listofEventsInCategory.php');
	exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //join event
	$idEvent = $_POST['eventId'];
	$idClient = $_SESSION['idClient']; // Assuming the user is logged in and idClient is stored in session

	if (isset($_POST['join'])) {
		if ($participantsCtr->addParticipant($idEvent, $idClient)) {
			header("Location: eventDetails.php?idEvent=$idEvent&status=success");
			exit;
		} else {
			echo "<script>alert('You have already joined this event');</script>";
		}
	} elseif (isset($_POST['cancel'])) {
		if ($participantsCtr->removeParticipant($idEvent, $idClient)) {
			header("Location: eventDetails.php?idEvent=$idEvent&status=canceled");
			exit;
		} else {
			echo "<script>alert('Error canceling your participation');</script>";
		}
	}
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from html.modernwebtemplates.com/mountis/blog-single-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:38:35 GMT -->

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
												echo  'Welcome ' . $_SESSION['firstName'] . " " . $_SESSION['lastName'];
											} else {
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
											<p><a href="https://html.modernwebtemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fb96948e958f9288bb949d9d92989ed5989496">[email&#160;protected]</a></p>
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

										<li>
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


			</div>

			<section class="ls s-py-80 s-py-md-120 s-py-xl-160  c-gutter-60">
				<div class="container">
					<div class="row">

						<main class="col-lg-8 col-xl-8 order-lg-2">
							<article class="vertical-item hero-bg post type-post status-publish format-standard has-post-thumbnail">

								<!-- .post-thumbnail -->
								<div class="item-media overflow-visible">
									<div class="owl-carousel" data-margin="0" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-responsive-xs="1" data-dots="true">
										<a href="<?= $eventData['image'] ?>" class="photoswipe-link gradientdarken-background" data-width="1170" data-height="780">
											<img src="<?= $eventData['image'] ?>" alt="img">
										</a>

									</div>
									<div class="post-adds">
										<div class="view-count-wrap">
											<div class="view-count-wrap-child">

												<span class="views-count">
													<i class="fa fa-user-o" aria-hidden="true"></i>
													<span class="item-views-count"><?= $eventData['firstName'] . " " . $eventData['lastName'] ?></span>
												</span>
												<span class="views-count">
													<i class="fa fa-users" aria-hidden="true"></i>
													<span class="item-views-count"><?= $eventData['capacity'] ?></span>
												</span>
												<span class="views-count">
													<i class="fa fa-calendar" aria-hidden="true"></i>
													<span class="item-views-count"><?= $eventData['date'] ?></span>
												</span>
												<span class="views-count">
													<i class="fa fa-map-marker" aria-hidden="true"></i>
													<span class="item-views-count"><?= $eventData['localisation'] ?></span>
												</span>
											</div>

										</div>
										<div class="dropdown inline-block">
											<a href="#" data-target="#" class="share_button" id="share_button_@@id" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								
											</a>
											<div class="dropdown-menu" aria-labelledby="share_button_@@id">
												<div class="share_buttons">
													<a href="https://www.facebook.com/sharer.php?u=http://example.com" class="color-bg-icon fa fa-facebook" target="_blank"></a>
													<a href="https://twitter.com/intent/tweet?url=http://example.com" class="color-bg-icon fa fa-twitter" target="_blank"></a>
													<a href="https://plus.google.com/share?url=http://example.com" class="color-bg-icon fa fa-google" target="_blank"></a>
													<a href="https://pinterest.com/pin/create/bookmarklet/?url=http://example.com" class="color-bg-icon fa fa-pinterest" target="_blank"></a>
													<a href="https://www.linkedin.com/shareArticle?url=http://example.com" class="color-bg-icon fa fa-linkedin" target="_blank"></a>
													<a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=http://example.com" class="color-bg-icon fa fa-tumblr" target="_blank"></a>
													<a href="https://reddit.com/submit?url=http://example.com" class="color-bg-icon fa fa-reddit" target="_blank"></a>
												</div><!-- eof .share_buttons -->
											</div><!-- eof .dropdown-menu -->
										</div><!-- eof .dropdown -->
									</div>
								</div>

								<form method="post" action="eventDetails.php?idEvent=<?= htmlspecialchars($_GET['idEvent']) ?>">
									<input type="hidden" name="eventId" value="<?= htmlspecialchars($eventData['idEvent']) ?>">

									<div class="item-content" style="margin-left: 40px;">
										<div class="entry-content">
											<blockquote class="special-quote">
												<h4><?= htmlspecialchars($eventData['firstName']) . ' ' . htmlspecialchars($eventData['lastName']) ?></h4>
												<p class="small-text color-main3 text-left">Manager</p>
											</blockquote>

											<h5><i class="fa fa-angle-double-right" aria-hidden="true">&nbsp;</i>Title</h5>
											<p><?= htmlspecialchars($eventData['title']) ?></p>

											<h5><i class="fa fa-map" aria-hidden="true">&nbsp;</i>Location</h5>
											<p><?= htmlspecialchars($eventData['localisation']) ?></p>

											<h5><i class="fa fa-calendar" aria-hidden="true">&nbsp;</i>Date</h5>
											<p><?= htmlspecialchars($eventData['date']) ?></p>

											<h5><i class="fa fa-clock-o" aria-hidden="true">&nbsp;</i>Duration</h5>
											<p><?= htmlspecialchars($eventData['duration']) ?> hours</p>

											<h5><i class="fa fa-users" aria-hidden="true">&nbsp;</i>Number of participants</h5>
											<p><?= htmlspecialchars($numParticip) ?> / <?= htmlspecialchars($eventData['capacity']) ?></p>

											<h5><i class="fa fa-align-justify" aria-hidden="true">&nbsp;</i>Description</h5>
											<p><?= htmlspecialchars($eventData['description']) ?></p>

											<?php if (!isset($_SESSION['idClient'])): ?>
												<a href="./loginClient.php">
													<button type="button" class="btn btn-maincolor" style="margin-bottom:110px">Sign in to join events</button>
												</a>
											<?php else: ?>
												<?php if ($isParticipant): ?>
													<button type="submit" name="cancel" class="btn btn-danger" style="margin-top: 20px; margin-left: 470px; margin-bottom: 50px;">Cancel</button>
												<?php else: ?>
													<button type="submit" name="join" class="btn btn-maincolor" style="margin-top: 20px; margin-left: 470px; margin-bottom: 50px;">Join</button>
												<?php endif; ?>
											<?php endif; ?>
										</div>
										<!-- .entry-content -->
									</div>
								</form>


								<!-- .item-content -->
							</article>

							<div class="mt--20"></div>

							<nav class="navigation post-nav" role="navigation">
								<h2 class="screen-reader-text">Post navigation</h2>
								<div class="nav-links">
									<div class="nav-previous cover-image s-overlay ds">
										<div class="post-nav-image">
											<img src="images/gallery/02_nav.jpg" alt="img">
										</div>

										<div class="post-nav-text-wrap">
											<span class="screen-reader-text">prev</span>
											<span aria-hidden="true" class="nav-subtitle color-main3">Previous Post</span>

											<h5 class="nav-title">
												Last Minute Festive Packages From Superbreak
											</h5>
										</div>
										<a href="blog-single-right.html" rel="prev"></a>
									</div>
									<div class="nav-next cover-image s-overlay ds">
										<div class="post-nav-image">
											<img src="images/gallery/01_nav.jpg" alt="img">
										</div>

										<div class="post-nav-text-wrap">
											<span class="screen-reader-text">next</span>
											<span aria-hidden="true" class="nav-subtitle color-main3">Next Post</span>

											<h5 class="nav-title">
												Stu Unger Rise And Fall Of A Poker Genius
											</h5>
										</div>
										<a href="blog-single-right.html" rel="next"></a>
									</div>
								</div>
							</nav>

							<div class="item-media post overflow-visible mt-60">
								<div class="owl-carousel" data-autoplay="true" data-margin="20" data-responsive-lg="3" data-responsive-md="2" data-responsive-sm="1" data-responsive-xs="1" data-nav="false" data-dots="false">
									<div class="vertical-item item-gallery content-absolute ds">
										<div class="item-media">
											<img src="images/events/15.jpg" alt="img">
											<div class="media-links"></div>
										</div>
										<div class="item-content">
											<h5>
												<a href="event-single-full.html">Traveling To Barcelona With Your Friends</a>
											</h5>
											<div class="item-meta">
												<i class="fa fa-calendar"></i>
												20 mar, 18
											</div>
										</div>
									</div>
									<div class="vertical-item item-gallery content-absolute ds">
										<div class="item-media">
											<img src="images/events/01.jpg" alt="img">
											<div class="media-links"></div>
										</div>
										<div class="item-content">
											<h5>
												<a href="event-single-full.html">Choosing A Static Caravan</a>
											</h5>
											<div class="item-meta">
												<i class="fa fa-calendar"></i>
												22 mar, 18
											</div>
										</div>
									</div>
									<div class="vertical-item item-gallery content-absolute ds">
										<div class="item-media">
											<img src="images/events/16.jpg" alt="img">
											<div class="media-links"></div>
										</div>
										<div class="item-content">
											<h5>
												<a href="event-single-full.html">Do A Sporting Stag Do In Birmingham</a>
											</h5>
											<div class="item-meta">
												<i class="fa fa-calendar"></i>
												25 mar, 18
											</div>
										</div>
									</div>
									<div class="vertical-item item-gallery content-absolute ds">
										<div class="item-media">
											<img src="images/events/15.jpg" alt="img">
											<div class="media-links"></div>
										</div>
										<div class="item-content">
											<h5>
												<a href="event-single-full.html">Traveling To Barcelona With Your Friends</a>
											</h5>
											<div class="item-meta">
												<i class="fa fa-calendar"></i>
												20 mar, 18
											</div>
										</div>
									</div>
								</div>
							</div>



						</main>

						<aside class="col-lg-4 col-xl-4 order-lg-1 mb-0">
							<div class="widget widget_search">
								<h3 class="widget-title">Search</h3>
								<form role="search" method="get" class="search-form" action="https://html.modernwebtemplates.com/">
									<label for="search-form-widget">
										<span class="screen-reader-text">Search for:</span>
									</label>
									<input type="search" id="search-form-widget" class="search-field" placeholder="Search here..." value="" name="search">
									<button type="submit" class="search-submit">
										<span class="screen-reader-text">Search</span>
									</button>
								</form>
							</div>

							<div class="widget widget_calendar">

								<div id="calendar_wrap" class="calendar_wrap">
									<table id="wp-calendar">
										<caption>March '18</caption>
										<thead>
											<tr>
												<th scope="col" title="Monday">sun</th>
												<th scope="col" title="Tuesday">mon</th>
												<th scope="col" title="Wednesday">tue</th>
												<th scope="col" title="Thursday">wed</th>
												<th scope="col" title="Friday">thu</th>
												<th scope="col" title="Saturday">fri</th>
												<th scope="col" title="Sunday">sat</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="1" class="pad">31</td>
												<td>1</td>
												<td>2</td>
												<td>3</td>
												<td>4</td>
												<td>
													<a href="blog-right.html" aria-label="Posts published on January 5, 2017">5</a>
												</td>
												<td>6</td>
											</tr>
											<tr>
												<td>7</td>
												<td>8</td>
												<td>
													<a href="blog-right.html" aria-label="Posts published on January 9, 2017">9</a>
												</td>
												<td>
													<a href="blog-right.html" aria-label="Posts published on January 10, 2017">10</a>
												</td>
												<td>
													<a href="blog-right.html" aria-label="Posts published on January 11, 2017">11</a>
												</td>
												<td>12</td>
												<td>13</td>
											</tr>
											<tr>
												<td>14</td>
												<td>15</td>
												<td>16</td>
												<td>17</td>
												<td>18</td>
												<td>19</td>
												<td>20</td>
											</tr>
											<tr>
												<td>21</td>
												<td>22</td>
												<td>23</td>
												<td>24</td>
												<td>25</td>
												<td>26</td>
												<td>27</td>
											</tr>
											<tr>
												<td>28</td>
												<td>29</td>
												<td>30</td>
												<td>31</td>
												<td colspan="1" class="pad">1</td>
												<td colspan="1" class="pad">2</td>
												<td colspan="1" class="pad">3</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td colspan="3" id="prev">
													<a href="blog-right.html">« Mar</a>
												</td>
												<td class="pad">&nbsp;</td>
												<td colspan="3" id="next">
													<a href="blog-right.html">May »</a>
												</td>
											</tr>
										</tfoot>


									</table>
								</div>
							</div>
						</aside>

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
											<a href="#"><span class="__cf_email__" data-cfemail="fc9193899288958fa3888e958cbc99849d918c9099d29f9391">[email&#160;protected]</span></a>
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


	<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>
	<script src="js/switcher.js"></script>

</body>


<!-- Mirrored from html.modernwebtemplates.com/mountis/blog-single-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 23:38:35 GMT -->

</html>