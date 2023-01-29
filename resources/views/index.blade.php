<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!--<![endif]-->

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="description" content="RM">
<meta name="author" content="{{ $name }}">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>{{ $name }} | Personal Portfolio</title>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<!-- /Google Fonts -->

<!-- Styles -->
<link type="text/css" rel="stylesheet" href="css/base.css?ver=3" />
<link type="text/css" rel="stylesheet" href="css/owl-carousel.css?ver=3" />
<link type="text/css" rel="stylesheet" href="css/style.css?ver=3" />
<!--[if lt IE 9]> <script src="js/modernizr.custom.js?ver=3"></script> <![endif]-->
<!-- /Styles -->

</head>

<body>


<!-- Wrapper All -->
<div class="RM_fn_wrapper">

	<div class="RM_fn_content">

		<!-- Main Left Part -->
		<div class="RM_fn_left">

			<!-- Page -->
			<div class="RM_fn_page">


				<!-- Home Section -->
				<section id="home">
					<div class="container">
						<div class="roww">

							<!-- Main Title -->
							<div class="RM_fn_main_title">
								<h3 class="subtitle">Introduction</h3>
								<h3 class="title">Fullstack developer</h3>
								<p class="desc">I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores.</p>
								<img src="img/signature.png" alt="{{ $name }}">
							</div>
							<!-- /Main Title -->

						</div>
					</div>
				</section>
				<!-- /Home Section -->


				<!-- About Section -->
				<section id="about">
					<div class="container">
						<div class="roww">

							<!-- Main Title -->
							<div class="RM_fn_main_title">
								<h3 class="subtitle">About Me</h3>
								<h3 class="title">Biography</h3>
								<p class="desc">I'm a Freelancer Front-end Developer with over 12 years of experience. I'm from San Francisco. I code and create web elements for amazing people around the world. I like work with new people. New people are new experiences.</p>
							</div>
							<!-- /Main Title -->

							<!-- About Information -->
							<div class="RM_fn_about_info">
								<div class="about_left">
									<table>
										<tr>
											<th>Name</th>
											<th>{{ $name }}</th>
										</tr>
										<tr>
											<th>Birthday</th>
											<th>{{ $dob_date }}</th>
										</tr>
										<tr>
											<th>Age</th>
											<th>{{ $dob_years }} years</th>
										</tr>
										<tr>
											<th>Country</th>
											<th>Ukraine</th>
										</tr>
										<tr>
											<th>City</th>
											<th>Lviv</th>
										</tr>
										<tr>
											<th>Phone</th>
											<th><a href="tel:+380938800822">(+38) 093 88 00 822</a></th>
										</tr>
										<tr>
											<th>Email</th>
											<th><a href="mailto:roman@matviy.pp.ua">roman@matviy.pp.ua</a></th>
										</tr>
										<tr>
											<th>Skype</th>
											<th><a href="skype:romas6ka">romas6ka</a></th>
										</tr>
									</table>
								</div>
								<div class="about_right">
									<!-- Show CV Button -->
									<div class="RM_fn_cv_btn" style="margin-bottom: 10px;">
										<a href="https://roman.matviy.pp.ua" target="_blank" title="{{ $name }}">
											<span class="icon">
												<img src="img/cv.png" alt="" class="fn__svg" />
											</span>
											<span>Show CV</span>
										</a>
									</div>
									<!-- /Show CV Button -->

                                    <!-- Download CV Button -->
									<div class="RM_fn_cv_btn">
										<a href="https://apartner.top/pdf/Roman.Matviy.CV.pdf" target="_blank" title="{{ $name }}.CV" download>
											<span class="icon">
												<img src="svg/inbox.svg" alt="" class="fn__svg" />
												<img src="svg/arrow.svg" alt="" class="fn__svg arrow" />
											</span>
											<span>Download CV</span>
										</a>
									</div>
									<!-- /Download CV Button -->
								</div>
							</div>
							<!-- /About Information -->


							<!-- Tabs Shortcode -->
							<div class="RM_fn_tabs">

								<!-- Tab: Header -->
								<div class="tab_header">
									<ul>
										<li class="active"><a href="#tab1">Experience</a></li>
										<li><a href="#tab2">Education</a></li>
										<li><a href="#tab3">Skills</a></li>
									</ul>
								</div>
								<!-- /Tab: Header -->

								<!-- Tab: Content -->
								<div class="tab_content">

									<!-- #1 tab content -->
									<div id="tab1" class="tab_item active">

										<!-- Boxed List -->
										<div class="RM_fn_boxed_list">
											<ul>
												<li>
													<div class="item">
														<div class="item_top">
															<h5>Twitter  LLC</h5>
															<span>( 2016 — 2011 )</span>
														</div>
														<h3>Graphic Designer</h3>
														<p>Adipisicing Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
													</div>
												</li>
											</ul>
										</div>
										<!-- /Boxed List -->

									</div>
									<!-- /#1 tab content -->

									<!-- #2 tab content -->
									<div id="tab2" class="tab_item">

										<!-- Boxed List -->
										<div class="RM_fn_boxed_list">
											<ul>
												<li>
													<div class="item">
														<div class="item_top">
															<h5>Frenify University</h5>
															<span>( 2014 — 2017 )</span>
														</div>
														<h3>Computer Science</h3>
														<p>Adipisicing Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
													</div>
												</li>
												<li>
													<div class="item">
														<div class="item_top">
															<h5>Edu University</h5>
															<span>( 2011 — 2014 )</span>
														</div>
														<h3>Master Degree</h3>
														<p>Adipisicing Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
													</div>
												</li>
											</ul>
										</div>
										<!-- /Boxed List -->

									</div>
									<!-- /#2 tab content -->

									<!-- #3 tab content -->
									<div id="tab3" class="tab_item">

										<!-- Progress Bar -->
										<div class="RM_fn_progress_bar">

											<div class="progress_item" data-value="95">
												<div class="item_in">
													<h3 class="progress_title">PHP &amp; SQL</h3>
													<span class="progress_percent"></span>
													<div class="bg_wrap"><div class="progress_bg"></div></div>
												</div>
											</div>

											<div class="progress_item" data-value="90">
												<div class="item_in">
													<h3 class="progress_title">HTML5 &amp; CSS3</h3>
													<span class="progress_percent"></span>
													<div class="bg_wrap"><div class="progress_bg"></div></div>
												</div>
											</div>

											<div class="progress_item" data-value="80">
												<div class="item_in">
													<h3 class="progress_title">WordPress</h3>
													<span class="progress_percent"></span>
													<div class="bg_wrap"><div class="progress_bg"></div></div>
												</div>
											</div>

										</div>
										<!-- /Progress Bar -->
									</div>
									<!-- /#2 tab content -->

								</div>
								<!-- /Tab: Content -->
							</div>
							<!-- /Tabs Shortcode -->


						</div>
					</div>
				</section>
				<!-- /About Section -->



				<!-- Portfolio Section -->
				<section id="portfolio">

					<div class="container">
						<div class="roww">
							<!-- Main Title -->
							<div class="RM_fn_main_title">
								<div class="my__nav">
									<a href="#" class="prev"><span></span></a>
									<a href="#" class="next"><span></span></a>
								</div>
								<h3 class="subtitle">Portfolio</h3>
								<h3 class="title">Featured Projects</h3>
							</div>
							<!-- /Main Title -->
						</div>
					</div>

					<div class="container noright">
						<div class="roww">

							<div class="owl-carousel modal_items" data-from="portfolio" data-count="5">
								<div class="item modal_item" data-index="1">
									<div class="img_holder">
										<img src="img/thumb/square.jpg" alt="">
										<div class="abs_img" data-bg-img="img/portfolio/1.jpg"></div>
									</div>
									<div class="title_holder">
										<p>illustration, design</p>
										<h3><a href="#">Sweet Cherry</a></h3>
									</div>
									<div class="fn__hidden">
										<p class="fn__cat">illustration, design</p>
										<h3 class="fn__title">Sweet Cherry</h3>
										<div class="img_holder">
											<img src="img/thumb/square.jpg" alt="">
											<div class="abs_img" data-bg-img="img/portfolio/1.jpg"></div>
										</div>


									</div>
								</div>
								<div class="item modal_item" data-index="2">
									<div class="img_holder">
										<img src="img/thumb/square.jpg" alt="">
										<div class="abs_img" data-bg-img="img/portfolio/2.jpg"></div>
									</div>
									<div class="title_holder">
										<p>web, mobile, online</p>
										<h3><a href="#">Delicious Fruit</a></h3>
									</div>
									<div class="fn__hidden">
										<p class="fn__cat">web, mobile, online</p>
										<h3 class="fn__title">Delicious Fruit</h3>

									</div>
								</div>
								<div class="item modal_item" data-index="3">
									<div class="img_holder">
										<img src="img/thumb/square.jpg" alt="">
										<div class="abs_img" data-bg-img="img/portfolio/3.jpg"></div>
									</div>
									<div class="title_holder">
										<p>design, vector</p>
										<h3><a href="#">Blue Lemon</a></h3>
									</div>
									<div class="fn__hidden">
										<p class="fn__cat">design, vector</p>
										<h3 class="fn__title">Blue Lemon</h3>
										<div class="img_holder">
											<img src="img/thumb/square.jpg" alt="">
											<div class="abs_img" data-bg-img="img/portfolio/3.jpg"></div>
										</div>

									</div>
								</div>
								<div class="item modal_item" data-index="4">
									<div class="img_holder">
										<img src="img/thumb/square.jpg" alt="">
										<div class="abs_img" data-bg-img="img/portfolio/4.jpg"></div>
									</div>
									<div class="title_holder">
										<p>mobile, design</p>
										<h3><a href="#">Yellow Phone</a></h3>
									</div>
									<div class="fn__hidden">
										<p class="fn__cat">mobile, design</p>
										<h3 class="fn__title">Yellow Phone</h3>
										<div class="img_holder">
											<img src="img/thumb/square.jpg" alt="">
											<div class="abs_img" data-bg-img="img/portfolio/4.jpg"></div>
										</div>

									</div>
								</div>
								<div class="item modal_item" data-index="5">
									<div class="img_holder">
										<img src="img/thumb/square.jpg" alt="">
										<div class="abs_img" data-bg-img="img/portfolio/5.jpg"></div>
									</div>
									<div class="title_holder">
										<p>mobile, design</p>
										<h3><a href="#">Ice Cream</a></h3>
									</div>
									<div class="fn__hidden">
										<p class="fn__cat">mobile, design</p>
										<h3 class="fn__title">Ice Cream</h3>
										<div class="img_holder">
											<img src="img/thumb/square.jpg" alt="">
											<div class="abs_img" data-bg-img="img/portfolio/5.jpg"></div>
										</div>

									</div>
								</div>
							</div>

						</div>
					</div>

				</section>
				<!-- /Portfolio Section -->



				<!-- Services Section -->
				<section id="services">
					<div class="container">
						<div class="roww">

							<!-- Main Title -->
							<div class="RM_fn_main_title">
								<h3 class="subtitle">Services</h3>
								<h3 class="title">What I Do</h3>
								<p class="desc">I help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers and growing overall sales.</p>
							</div>
							<!-- /Main Title -->


							<!-- Services List -->
							<div class="RM_fn_service_list">
								<ul>
									<li>
										<div class="item">
											<div class="item_left">
												<h3>Brand Consultant</h3>
												<p>I build brands through cultural insights &amp; strategic vision. Custom crafted business solutions.</p>
											</div>
											<div class="item_right">
												<p>Starts from</p>
												<h3>$599</h3>
											</div>
										</div>
									</li>
									<li>
										<div class="item">
											<div class="item_left">
												<h3>Global Marketing</h3>
												<p>Custom marketing solutions. Get your business on the next level. We provide worldwide marketing.</p>
											</div>
											<div class="item_right">
												<p>Starts from</p>
												<h3>$399</h3>
											</div>
										</div>
									</li>
									<li>
										<div class="item">
											<div class="item_left">
												<h3>UI/UX Solutions</h3>
												<p>Design direction for business. Get your business on the next level. We help to create great experiences.</p>
											</div>
											<div class="item_right">
												<p>Starts from</p>
												<h3>$499</h3>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<!-- /Services List -->

						</div>
					</div>
				</section>
				<!-- /Services Section -->



				<!-- Customers Section -->
				<section id="customers">
					<div class="container">
						<div class="roww">

							<!-- Main Title -->
							<div class="RM_fn_main_title">
								<h3 class="subtitle">Customers</h3>
								<h3 class="title">Happy People</h3>
							</div>
							<!-- /Main Title -->


							<!-- Partners -->
							<div class="RM_fn_partners">
								<ul>
									<li><a href="https://envato.com/" target="_blank"><img src="img/partners/1.png" alt=""></a></li>
									<li><a href="https://frenify.com/" target="_blank"><img src="img/partners/2.png" alt=""></a></li>
									<li><a href="https://themeforest.net/item/rewall-personal-portfolio-template/34316546" target="_blank"><img src="img/partners/3.png" alt=""></a></li>
									<li><a href="https://themeforest.net/item/artemiz-blog-podcast-wordpress-theme/28455063" target="_blank"><img src="img/partners/4.png" alt=""></a></li>
									<li><a href="#" target="_blank"><img src="img/partners/5.png" alt=""></a></li>
									<li><a href="#" target="_blank"><img src="img/partners/6.png" alt=""></a></li>
									<li><a href="#" target="_blank"><img src="img/partners/7.png" alt=""></a></li>
									<li><a href="#" target="_blank"><img src="img/partners/8.png" alt=""></a></li>
								</ul>
							</div>
							<!-- /Partners -->


							<!-- Testimonials -->
							<div class="RM_fn_testimonials">
								<div class="my__nav">
									<a href="#" class="prev"><span></span></a>
									<a href="#" class="next"><span></span></a>
								</div>
								<div class="owl-carousel">
									<div class="item">
										<div class="title_holder">
											<p class="desc">“ They really nailed it. This is one of the best themes I have seen in a long time. Very nice design with lots of customization available. Many of my clients have chosen this theme for their portfolio sites. ”</p>
											<h3 class="title">Albert Walker</h3>
											<h3 class="subtitle">Freelancer &amp; Designer</h3>
										</div>
									</div>
									<div class="item">
										<div class="title_holder">
											<p class="desc">“ This was exactly what I needed for my portfolio, and it looks great. I had a couple issues that support helped troubleshoot both via email and on the comments, which definitely made it worth the price. I'm very pleased with this purchase. ”</p>
											<h3 class="title">Anna Barbera</h3>
											<h3 class="subtitle">Photographer</h3>
										</div>
									</div>
									<div class="item">
										<div class="title_holder">
											<p class="desc">“ Had a problem with the layout after Installation- found no approach. The support reacted quickly and competently. And solved the problem between Elementor and a WordPress update. Great! ”</p>
											<h3 class="title">Dana Atkins</h3>
											<h3 class="subtitle">Customer</h3>
										</div>
									</div>
								</div>
							</div>
							<!-- /Testimonials -->



						</div>
					</div>
				</section>
				<!-- /Customers Section -->




				<!-- News Section -->
				<section id="news">
					<div class="container">
						<div class="roww">

							<!-- Main Title -->
							<div class="RM_fn_main_title">
								<h3 class="subtitle">News &amp; Tips</h3>
								<h3 class="title">Latest Articles</h3>
							</div>
							<!-- /Main Title -->


							<!-- Blog List -->
							<div class="RM_fn_blog_list">

								<ul class="modal_items" data-from="blog" data-count="5">
									<li>
										<div class="item modal_item" data-index="1">
											<div class="img_holder">
												<img src="img/thumb/square.jpg" alt="">
												<div class="abs_img" data-bg-img="img/blog/1.jpg"></div>
											</div>
											<div class="title_holder">
												<p>September 22, 2021</p>
												<h3><a href="#">Five Solid Evidences Attending Design Is Good For Your Career Development.</a></h3>
											</div>
											<div class="fn__hidden">
												<p class="fn__cat">September 22, 2021</p>
												<h3 class="fn__title">Five Solid Evidences Attending Design Is Good For Your Career Development.</h3>
												<div class="img_holder">
													<img src="img/thumb/square.jpg" alt="">
													<div class="abs_img" data-bg-img="img/blog/1.jpg"></div>
												</div>

											</div>
										</div>
									</li>
									<li>
										<div class="item modal_item" data-index="2">
											<div class="img_holder">
												<img src="img/thumb/square.jpg" alt="">
												<div class="abs_img" data-bg-img="img/blog/2.jpg"></div>
											</div>
											<div class="title_holder">
												<p>September 17, 2021</p>
												<h3><a href="#">Ten Mind-Blowing Reasons Why Design Is Using This Technique For Exposure.</a></h3>
											</div>
											<div class="fn__hidden">
												<p class="fn__cat">September 17, 2021</p>
												<h3 class="fn__title">Ten Mind-Blowing Reasons Why Design Is Using This Technique For Exposure.</h3>
												<div class="img_holder">
													<img src="img/thumb/square.jpg" alt="">
													<div class="abs_img" data-bg-img="img/blog/2.jpg"></div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="item modal_item" data-index="3">
											<div class="img_holder">
												<img src="img/thumb/square.jpg" alt="">
												<div class="abs_img" data-bg-img="img/blog/3.jpg"></div>
											</div>
											<div class="title_holder">
												<p>September 04, 2021</p>
												<h3><a href="#">I Will Tell You The Truth About Design In The Next 60 Seconds.</a></h3>
											</div>
											<div class="fn__hidden">
												<p class="fn__cat">September 04, 2021</p>
												<h3 class="fn__title">I Will Tell You The Truth About Design In The Next 60 Seconds.</h3>
												<div class="img_holder">
													<img src="img/thumb/square.jpg" alt="">
													<div class="abs_img" data-bg-img="img/blog/3.jpg"></div>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="item modal_item" data-index="4">
											<div class="img_holder">
												<img src="img/thumb/square.jpg" alt="">
												<div class="abs_img" data-bg-img="img/blog/4.jpg"></div>
											</div>
											<div class="title_holder">
												<p>August 18, 2021</p>
												<h3><a href="#">What You Know About Design And What You Don't Know About Design.</a></h3>
											</div>
											<div class="fn__hidden">
												<p class="fn__cat">August 18, 2021</p>
												<h3 class="fn__title">What You Know About Design And What You Don't Know About Design.</h3>
												<div class="img_holder">
													<img src="img/thumb/square.jpg" alt="">
													<div class="abs_img" data-bg-img="img/blog/4.jpg"></div>
												</div>
											</div>
										</div>
									</li>
									<li class="be_animated">
										<div class="item modal_item" data-index="5">
											<div class="img_holder">
												<img src="img/thumb/square.jpg" alt="">
												<div class="abs_img" data-bg-img="img/blog/5.jpg"></div>
											</div>
											<div class="title_holder">
												<p>August 15, 2021</p>
												<h3><a href="#">Forgive Yourself for Not Being Perfect. Then Do It Again Tomorrow.</a></h3>
											</div>
											<div class="fn__hidden">
												<p class="fn__cat">August 15, 2021</p>
												<h3 class="fn__title">Forgive Yourself for Not Being Perfect. Then Do It Again Tomorrow.</h3>
												<div class="img_holder">
													<img src="img/thumb/square.jpg" alt="">
													<div class="abs_img" data-bg-img="img/blog/5.jpg"></div>
												</div>
											</div>
										</div>
									</li>
									<li class="be_animated">
										<div class="item modal_item" data-index="6">
											<div class="img_holder">
												<img src="img/thumb/square.jpg" alt="">
												<div class="abs_img" data-bg-img="img/blog/6.jpg"></div>
											</div>
											<div class="title_holder">
												<p>August 01, 2021</p>
												<h3><a href="#">Why Decorating Your Home Is Good for Your Mental Health</a></h3>
											</div>
											<div class="fn__hidden">
												<p class="fn__cat">August 01, 2021</p>
												<h3 class="fn__title">Why Decorating Your Home Is Good for Your Mental Health</h3>
												<div class="img_holder">
													<img src="img/thumb/square.jpg" alt="">
													<div class="abs_img" data-bg-img="img/blog/6.jpg"></div>
												</div>
											</div>
										</div>
									</li>
								</ul>

								<div class="clearfix"></div>

								<div class="load_more">
									<a href="#" data-done="Done" data-no="No more articles found">
										<span class="text">Load More Articles</span>
										<span class="fn__pulse">
											<span></span>
											<span></span>
											<span></span>
										</span>
									</a>
								</div>

							</div>
							<!-- /Blog List -->


						</div>
					</div>
				</section>
				<!-- /News Section -->


				<!-- Contact Section -->
				<section id="contact">
					<div class="container">
						<div class="roww RM_fn_contact">

							<!-- Main Title -->
							<div class="RM_fn_main_title">
								<h3 class="subtitle">Contact</h3>
								<h3 class="title">Get In Touch</h3>
								<p class="desc">If you have any suggestion, project or even you want to say “hello”, please fill out the form below and I will reply you shortly.</p>
							</div>
							<!-- /Main Title -->

							<!-- Contact Form -->
							<form class="contact_form" action="/" method="post" autocomplete="off" data-email="roman@matviy.pp.ua">

								<!--
									Don't remove below code in avoid to work contact form properly.
									You can chance dat-success value with your one. It will be used when user will try to contact via contact form and will get success message.
								-->
								<div class="success" data-success="Your message has been received, we will contact you soon."></div>
								<div class="empty_notice"><span>Please Fill Required Fields!</span></div>
								<!-- -->

								<div class="items_wrap">
									<div class="items">
										<div class="item half">
											<div class="input_wrapper">
												<input id="name" type="text" />
												<span class="moving_placeholder">Name *</span>
											</div>
										</div>
										<div class="item half">
											<div class="input_wrapper">
												<input id="email" type="email" />
												<span class="moving_placeholder">Email *</span>
											</div>
										</div>
										<div class="item">
											<div class="input_wrapper">
												<input id="phone" type="text" />
												<span class="moving_placeholder">Phone</span>
											</div>
										</div>
										<div class="item">
											<div class="input_wrapper">
												<textarea id="message"></textarea>
												<span class="moving_placeholder">Message</span>
											</div>
										</div>
										<div class="item">
											<a id="send_message" href="#">Send Message</a>
										</div>
									</div>
								</div>
							</form>
							<!-- /Contact Form -->

							<!-- Contact Info -->
							<div class="RM_fn_contact_info">
								<p>Address</p>
								<h3>69 Naukova St, Lviv, Ukraine</h3>
								<p>Phone</p>
								<h3><a href="tel:+30938800822">(+38) 093 88 00 822</a></h3>
								<p><a class="fn__link" href="mailto:roman@matviy.pp.ua">roman@matviy.pp.ua</a></p>
							</div>
							<!-- /Contact Info -->

						</div>
					</div>
				</section>
				<!-- /Contact Section -->


			</div>
			<!-- /Page -->


			<footer id="footer">
				<div class="footer_top">
					<a href="#" class="RM_fn_totop"><span></span></a>
				</div>
				<div class="footer_content">
					<div class="container">
						<p>Copyright © {{ date('Y') }}. All rights reserved. <br />
						Designed &amp; Developed by <a class="fn__link" href="https://apartner.top/" target="_blank">aPartner.Top</a></p>
					</div>
				</div>
			</footer>


		</div>
		<!-- /Main Left Part -->

		<!-- Main Right Part -->
		<div class="RM_fn_right">

			<!-- Menu Triggger -->
			<a href="#" class="menu_trigger">
				<span class="text">Menu</span>
				<span class="hamb">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>
			<!-- /Menu Triggger -->

			<!-- Panel Content -->
			<div class="right_in">
				<div class="right_top">
					<div class="border1"></div><div class="border2"></div>

					<div class="img_holder">
						<img src="img/thumb/square.jpg" alt="{{ $name }}">
						<div class="abs_img" data-bg-img="img/right.jpg"></div>
					</div>
					<div class="title_holder">
						<h5>Hi There! I am</h5>
						<h3>
							<span class="animated_title">
								<span class="title_in">{{ $name }}</span>
								<span class="title_in">Web Developer</span>
								<span class="title_in">Middle Developer</span>
								<span class="title_in">Fullstack Developer</span>
								<span class="title_in">Backend Developer</span>
								<span class="title_in">Frontend Developer</span>
								<span class="title_in">PHP/SQL Developer</span>
								<span class="title_in">Freelancer</span>
								<!-- <span class="title_in">Photographer</span> -->
							</span>
						</h3>
					</div>
				</div>
				<div class="right_bottom">
					<a href="#contact">
						<span class="circle"></span>
						<span class="text">I’m available for a freelance job. Hire me</span>
					</a>
				</div>
			</div>
			<!-- /Panel Content -->

		</div>
		<!-- /Main Right Part -->

	</div>

	<!-- Right Hidden Navigation -->
	<a href="#" class="RM_fn_nav_overlay"></a>
	<div class="RM_fn_navigation">
		<a href="#" class="closer"></a>

		<!-- Navigation Content -->
		<div class="nav_in">

			<nav id="nav">
				<h3 class="label">Menu</h3>
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#portfolio">Portfolio</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#customers">Customers</a></li>
					<li><a href="#news">News &amp; Tips</a></li>
					<li><a href="#contact">Contact</a></li>

                    @if (false || Route::has('login'))
                        <li>
                            @auth
                                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Log in</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                        </li>
                    @endif
				</ul>
			</nav>

			<div class="nav_footer">
				<div class="social">
					<ul>
						<li><a href="#" target="_blank"><img src="svg/social/twitter.svg" alt="" class="fn__svg"></a></li>
						<li><a href="#" target="_blank"><img src="svg/social/facebook.svg" alt="" class="fn__svg"></a></li>
						<li><a href="#" target="_blank"><img src="svg/social/instagram.svg" alt="" class="fn__svg"></a></li>
						<li><a href="#" target="_blank"><img src="svg/social/pinterest.svg" alt="" class="fn__svg"></a></li>
						<li><a href="#" target="_blank"><img src="svg/social/behance.svg" alt="" class="fn__svg"></a></li>
					</ul>
				</div>
				<div class="copyright">
					<a href="https://apartner.top/" target="_blank">Developed by aPartner.Top</a>

                    <!-- <br>
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) -->
				</div>
			</div>

		</div>
		<!-- /Navigation Content -->

	</div>
	<!-- /Right Hidden Navigation -->


	<div class="frenify-cursor cursor-outer" data-default="yes" data-link="yes" data-slider="yes"><span class="fn-cursor"></span></div>
	<div class="frenify-cursor cursor-inner" data-default="yes" data-link="yes" data-slider="yes"><span class="fn-cursor"><span class="fn-left"></span><span class="fn-right"></span></span></div>

</div>
<!-- /Wrapper All -->

<!-- Scripts -->
<script src="js/jquery.js?ver=3"></script>
<script src="js/typed.js?ver=3"></script>
<script src="js/owl-carousel.js?ver=3"></script>
<script src="js/waypoints.js?ver=3"></script>
<script src="js/nicescroll.js?ver=3"></script>
<!--[if lt IE 10]> <script src="js/ie8.js?ver=3"></script> <![endif]-->
<script src="js/init.js?ver=3"></script>
<!-- /Scripts -->

</body>
</html>
