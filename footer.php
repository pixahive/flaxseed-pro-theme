<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package flaxseed-pro
 */
?>

	</div><!-- #content -->
</div><!-- #page -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer title-font" role="contentinfo">
		<div class="container">
			<div class="site-info">
				<?php _e('Powered by WordPress','flaxseed-pro');  ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
	
	

<nav id="menu" class="panel" role="navigation">
	<button class="go-to-bottom"><i class="fa fa-down"></i></button>
	<button id="close-menu" class="toggle-menu-link"><i class="fa fa-times"></i></button>
	<?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?>
	<button class="go-to-top"><i class="fa fa-up"></i></button>
	 
</nav>

<?php wp_footer(); ?>

</body>
</html>
