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
<?php
get_sidebar( 'footer' );
// get_theme_mod and check if it is set.
$footer_menu = get_theme_mod( 'flaxseedpro_footer_activation_status' );
if ( $footer_menu ) {
	// If footer option is set then check if footer menu is active and a menu is assigned to footer-menu.
	if ( 'active' === $footer_menu && has_nav_menu( 'footer-menu' ) ) {
		// footer_menu is active and footer-menu is assigned a menu from Menus section then show copyright and footer menu.
		?>
		<footer id="colophon" class="site-footer title-font menu-enabled" role="contentinfo">
			<div class="container">
				<div class="site-info">
					<div class="md-6 copyright">
						<?php  echo esc_textarea(get_theme_mod('flaxseedpro_footer_copyright_text')); ?>
					</div>
					<div class="md-6">
						<div class="short-menu">
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
						</div>
					</div>
				</div><!-- .site-info -->
			</div>
		</footer><!-- #colophon -->
		<?php
	} else {
		// Else show only copyright text entered by user.
		?>
		<footer id="colophon" class="site-footer title-font" role="contentinfo">
			<div class="container">
				<div class="site-info">
					<?php  echo esc_textarea(get_theme_mod( 'flaxseedpro_footer_copyright_text')); ?>
				</div><!-- .site-info -->
			</div>
		</footer><!-- #colophon -->
		<?php
	}
} else {
	// If footer option is not set then use default theme copyright footer.
	?>
	<footer id="colophon" class="site-footer title-font" role="contentinfo">
		<div class="container">
			<div class="site-info">
				<?php _e( 'Powered by WordPress', 'flaxseed-pro' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
	<?php
}
?>

<nav id="menu" class="panel" role="navigation">
	<button class="go-to-bottom"><i class="fa fa-down"></i></button>
	<button id="close-menu" class="toggle-menu-link"><i class="fa fa-times"></i></button>
	<?php wp_nav_menu( array( 'theme_location' => 'mobile' ) ); ?>
	<button class="go-to-top"><i class="fa fa-up"></i></button>
</nav>

<?php wp_footer(); ?>
</body>
</html>
