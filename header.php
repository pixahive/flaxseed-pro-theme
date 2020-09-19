<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package flaxseed-pro
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flaxseed-pro' ); ?></a>
<?php 
    # Include header layout.
    do_action('flaxseedpro_header_layout');
?>
<?php if (is_front_page() && has_header_image() ) : ?>
<div id="header-image" class="container">
	<img src="<?php header_image(); ?>" alt="<?php the_title_attribute(); ?>">
</div>
<?php endif; ?>

<?php for ($i = 1; $i < 8; $i++)
	if (get_theme_mod('flaxseedpro_fa_'.$i) != 'none') {
		flaxseedpro_display_featured_area( 
			get_theme_mod('flaxseedpro_fa_'.$i), 
			get_theme_mod('flaxseedpro_fa_title'.$i), 
			get_theme_mod('flaxseedpro_fa_cat'.$i)
		);
	}	
?>

<div id="page" class="hfeed site">
	
	

	
	<div class="mega-container">
	
		<div id="content" class="site-content container">
			<?php if (is_home()) : ?>
				<h2 class="blog-section-title container"><?php _e('Latest Posts','flaxseed-pro') ?></h2>
			<?php endif; ?>