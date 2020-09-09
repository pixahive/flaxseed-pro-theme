<?php

/**
 * Enqueue scripts and styles.
 */
function flaxseedpro_scripts() {
	global $wp_customize;
	wp_enqueue_style( 'flaxseed-pro-style', get_stylesheet_uri() );

	wp_enqueue_style( 'flaxseed-pro-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/skins/default.css', array() );

	wp_enqueue_script( 'bigslide', get_template_directory_uri() . '/assets/js/bigSlide.min.js', array( 'jquery' ), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Get google fonts array
	$google_fonts_arr = get_option( 'google-fonts-array' );
	// Get title font set by user
	$title_font = get_theme_mod( 'flaxseedpro_title_font' );
	if ( array_key_exists( $title_font, $google_fonts_arr ) ) {
		wp_enqueue_style( 'flaxseed-pro-title-font', '//fonts.googleapis.com/css?family=' . urlencode( $google_fonts_arr[ $title_font ] ) . ':300,400,600,700,400italic,700italic' );
	} else {
		wp_enqueue_style( 'flaxseed-pro-title-font', '//fonts.googleapis.com/css?family=Work+Sans:300,400,600,700,400italic,700italic' );
	}
	// Get body font set by user
	$body_font = get_theme_mod( 'flaxseedpro_body_font' );
	if ( array_key_exists( $body_font, $google_fonts_arr ) ) {
		wp_enqueue_style( 'flaxseed-pro-body-font', '//fonts.googleapis.com/css?family=' . urlencode( $google_fonts_arr[ $body_font ] ) . ':300,400,600,700,400italic,700italic' );
	} else {
		wp_enqueue_style( 'flaxseed-pro-body-font', '//fonts.googleapis.com/css?family=Libre+Baskerville:300,400,600,700,400italic,700italic' );
	}

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri() . '/assets/owlcarousel/dist/owl.carousel.min.js' );

	wp_enqueue_style( 'owlcarousel-css', get_template_directory_uri() . '/assets/owlcarousel/dist/assets/owl.carousel.min.css' );

	wp_enqueue_style( 'owlcarousel-theme-css', get_template_directory_uri() . '/assets/owlcarousel/dist/assets/owl.theme.default.min.css' );

	wp_enqueue_script( 'flaxseed-pro-js', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery', 'owlcarousel-js' ), null, true );
}

add_action( 'wp_enqueue_scripts', 'flaxseedpro_scripts' );

function flaxseedpro_customizer_styles() {
	wp_enqueue_style( 'flaxseed-pro-customizer-css', get_template_directory_uri() . '/modules/customizer/_customizer.css' );
}

add_action( 'customize_controls_print_styles', 'flaxseedpro_customizer_styles' );

function flaxseedpro_css() {
	?>
	<style>
		#masthead .site-title a { color: #<?php echo esc_attr( get_header_textcolor() ); ?>; } 
		.title-font { font-family: <?php echo esc_attr( get_theme_mod( 'flaxseedpro_title_font', 'Work Sans, sans-serif' ) ); ?>; } 
		.body-font { font-family: <?php echo esc_attr( get_theme_mod( 'flaxseedpro_body_font', 'Libre Baskerville, serif' ) ); ?>; } 
	</style>
	<?php
}

add_action( 'wp_head', 'flaxseedpro_css' );
