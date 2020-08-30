<?php get_header(); ?>
<?php echo do_shortcode('[wonderplugin_slider id=1]'); ?>

<?php /*Template Name:Linn Home */ ?>


<div class="slider_home mr-tp">

    <div class="contact_wrapper">
        <div class="container">

            <div id="content" class="pageContent">

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

            </div>

        </div>


    </div>
</div>

<?php get_footer(); ?>