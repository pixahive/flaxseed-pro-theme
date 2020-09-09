<?php

/**
 * flaxseed-pro functions and definitions
 *
 * @package flaxseed-pro
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'flaxseedpro_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flaxseedpro_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 *
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// Custom Logo
		add_theme_support( 'custom-logo' );

		// RT Slider Support
		add_theme_support( 'rt-slider' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'flaxseed-pro' ),
				'top'     => __( 'Top Menu', 'flaxseed-pro' ),
				'mobile'  => __( 'Mobile Menu', 'flaxseed-pro' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'flaxseedpro_custom_background_args',
				array(
					'default-color' => 'eee',
					'default-image' => '',
				)
			)
		);

		add_image_size( 'flaxseed-pro-thumb', 542, 390, true );

		add_theme_support(
			'custom-header',
			array(
				'default-text-color' => '#444444',
				'width'              => 1100,
				'height'             => 400,
			)
		);

		$google_fonts_arr = array(
			'Work Sans, sans-serif'       => __( 'Work Sans', 'flaxseed-pro' ),
			'Libre Baskerville, serif'    => __( 'Libre Baskerville', 'flaxseed-pro' ),
			'Open Sans, sans-serif'       => __( 'Open Sans', 'flaxseed-pro' ),
			'Nunito, sans-serif'          => __( 'Nunito', 'flaxseed-pro' ),
			'Lato, sans-serif'            => __( 'Lato', 'flaxseed-pro' ),
			'Poppins, sans-serif'         => __( 'Poppins', 'flaxseed-pro' ),
			'Montserrat, sans-serif'      => __( 'Montserrat', 'flaxseed-pro' ),
			'Roboto, sans-serif'          => __( 'Roboto', 'flaxseed-pro' ),
			'Noto Sans, sans-serif'       => __( 'Noto Sans', 'flaxseed-pro' ),
			'Quicksand, sans-serif'       => __( 'Quicksand', 'flaxseed-pro' ),
			'Source Sans Pro, sans-serif' => __( 'Source Sans Pro', 'flaxseed-pro' ),
			'Rubik, sans-serif'           => __( 'Rubik', 'flaxseed-pro' ),
			'Fjalla One, sans-serif'      => __( 'Fjalla One', 'flaxseed-pro' ),
			'Archivo, sans-serif'         => __( 'Archivo', 'flaxseed-pro' ),
			'Lora, serif'                 => __( 'Lora', 'flaxseed-pro' ),
			'IBM Plex Serif, serif'       => __( 'IBM Plex Serif', 'flaxseed-pro' ),
			'Spectral, serif'             => __( 'Spectral', 'flaxseed-pro' ),
			'Crimson Text, serif'         => __( 'Crimson Text', 'flaxseed-pro' ),
			'Karla, sans-serif'           => __( 'Karla', 'flaxseed-pro' ),
			'Alegreya Sans, sans-serif'   => __( 'Alegreya Sans', 'flaxseed-pro' ),
		);
		add_option( 'google-fonts-array', $google_fonts_arr );
	}

endif; // flaxseedpro_setup
add_action( 'after_setup_theme', 'flaxseedpro_setup' );
