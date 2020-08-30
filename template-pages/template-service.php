<?php get_header(); ?>

<?php /*Template Name:Linn Service */ ?>


<div class="slider_home mr-tp">
	<div class="contact_wrapper">
		<div class="container">

			<div id="content" class="pageContent">
				<h5 class="entry-title"><?php the_title(); ?></h5> <!-- Page Title -->
				<div class="col-xs-12">
					<?php the_post_thumbnail('', array('class' => 'img-responsive aligncenter')); ?>
					<?php
					// TO SHOW THE PAGE CONTENTS
					while (have_posts()) : the_post(); ?>
						<!--Because the_content() works only inside a WP Loop -->
						<div class="entry-content-page">
							<?php the_content(); ?>
							<!-- Page Content -->
						</div><!-- .entry-content-page -->

					<?php
					endwhile; //resetting the page loop
					?>
				</div><!-- #content -->
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>