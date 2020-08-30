<?php

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" type="text/css" />
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/customjs.js"></script>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="top-header">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<span style="border-left:1px solid #D7D7D7;border-right: 1px solid #D7D7D7;padding: 5px 10px;display: inline-block;">
						<i class="fab fa-facebook-f"></i>&nbsp; &nbsp;<i class="fab fa-twitter"></i>&nbsp; &nbsp;<i class="fab fa-google-plus-g"></i>
					</span>
				</div>

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-right">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="border-left:1px solid #D7D7D7;padding: 5px 10px;text-align: center;">
						<span>
							<i class="far fa-clock"></i> &nbsp;Mon-Fri : 8:00 AM to 6:00 PM
						</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-left:1px solid #D7D7D7;border-right: 1px solid #D7D7D7;padding: 5px 10px;text-align: center;">
						<span>
							<i class="fas fa-phone-alt"></i> &nbsp;+959 5136731
						</span>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-right: 1px solid #D7D7D7;padding: 5px 10px;text-align: center;">
						<span>
							<i class="far fa-envelope"></i> &nbsp;info@linnmyanmar.com
						</span>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12" style="padding: 5px 10px;">
						<?php pll_the_languages(array('dropdown' => 1)); ?>
					</div>
				</div>

			</div>

		</div>
	</div>

	<header id="site-header" class="header-footer-group" role="banner">
		<div class="container" style="display: flex;">
			<div id="header-logo" class="col-lg-3 col-md-3 col-sm-12 col-xs-12 box">
				<?php
				// Site title or logo.
				twentytwenty_site_logo();
				// Site description.
				twentytwenty_site_description();
				?>
			</div>
			<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
				<span class="toggle-inner">
					<span class="toggle-icon">
						<?php twentytwenty_the_theme_svg('ellipsis'); ?>
					</span>
					<span class="toggle-text"><?php _e('Menu', 'twentytwenty'); ?></span>
				</span>
			</button><!-- .nav-toggle -->

			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" id="header-menu">

				<?php
				if (has_nav_menu('primary') || !has_nav_menu('expanded')) {
				?>

					<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'twentytwenty'); ?>" role="navigation">

						<ul class="primary-menu reset-list-style">

							<?php
							if (has_nav_menu('primary')) {

								wp_nav_menu(
									array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'primary',
									)
								);
							} elseif (!has_nav_menu('expanded')) {

								wp_list_pages(
									array(
										'match_menu_classes' => true,
										'show_sub_menu_icons' => true,
										'title_li' => false,
										'walker'   => new TwentyTwenty_Walker_Page(),
									)
								);
							}
							?>

						</ul>

					</nav><!-- .primary-menu-wrapper -->

				<?php
				}

				if (true === $enable_header_search || has_nav_menu('expanded')) {
				?>

					<div class="header-toggles hide-no-js">

						<?php
						if (has_nav_menu('expanded')) {
						?>

							<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

								<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-text"><?php _e('Menu', 'twentytwenty'); ?></span>
										<span class="toggle-icon">
											<?php twentytwenty_the_theme_svg('ellipsis'); ?>
										</span>
									</span>
								</button><!-- .nav-toggle -->

							</div><!-- .nav-toggle-wrapper -->

						<?php
						}

						if (true === $enable_header_search) {
						?>

							<div class="toggle-wrapper search-toggle-wrapper">

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<?php twentytwenty_the_theme_svg('search'); ?>
										<span class="toggle-text"><?php _e('Search', 'twentytwenty'); ?></span>
									</span>
								</button><!-- .search-toggle -->

							</div>

						<?php
						}
						?>

					</div><!-- .header-toggles -->
				<?php
				}
				?>



				<?php
				// Output the search modal (if it is activated in the customizer).
				if (true === $enable_header_search) {
					get_template_part('template-parts/modal-search');
				}
				?>
			</div>
		</div><!-- .container -->

	</header><!-- #site-header -->

	<?php
	// Output the menu modal.
	get_template_part('template-parts/modal-menu');
