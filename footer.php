<?php

?>
<footer id="site-footer" role="contentinfo" class="header-footer-group">

	<div class="section-inner">


		<p class="footer-copyright">Copyright &copy;
			<?php
			echo date_i18n(
				/* translators: Copyright date format, see https://www.php.net/date */
				_x('Y', 'copyright date format', 'twentytwenty')
			);
			?>
			<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
			All Right Reserved
		</p><!-- .footer-copyright -->
	</div><!-- .section-inner -->
</footer><!-- #site-footer -->
<?php wp_footer(); ?>
</body>

</html>