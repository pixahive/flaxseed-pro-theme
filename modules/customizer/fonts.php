<?php
/**
 * Font Customizer
 *
 * @package flaxseed-pro
 */

/**
 * Add support for selected Google Fonts from Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flaxseedpro_customize_register_fonts( $wp_customize ) {
    global $google_fonts_arr;
    $wp_customize->add_section(
		'flaxseedpro_fonts_section',
		array(
			'title'    => __( 'Custom Fonts', 'flaxseed-pro' ),
			'priority' => 45,
		)
	);
	$wp_customize->add_setting(
		'flaxseedpro_title_font',
		array(
			'sanitize_callback' => 'flaxseedpro_sanitize_fonts',
			'default'           => 'Work Sans, sans-serif',
		)
	);

	$wp_customize->add_control(
		'flaxseedpro_title_font',
		array(
			'settings' => 'flaxseedpro_title_font',
			'label'    => __( 'Title Font ', 'flaxseed-pro' ),
			'section'  => 'flaxseedpro_fonts_section',
			'type'     => 'select',
			'choices'  => $google_fonts_arr,
		)
	);

	$wp_customize->add_setting(
		'flaxseedpro_body_font',
		array(
			'sanitize_callback' => 'flaxseedpro_sanitize_fonts',
			'default'           => 'Libre Baskerville, serif',
		)
	);

	$wp_customize->add_control(
		'flaxseedpro_body_font',
		array(
			'settings' => 'flaxseedpro_body_font',
			'label'    => __( 'Body Font ', 'flaxseed-pro' ),
			'section'  => 'flaxseedpro_fonts_section',
			'type'     => 'select',
			'choices'  => $google_fonts_arr,
		)
	);
		/**
		 * Function to sanitize font to make sure we don't use any other fonts then selected
		 *
		 * @param type $input value to check against selected fonts.
		 * @return string
		 */
	function flaxseedpro_sanitize_fonts( $input ) {
            global $google_fonts_arr;
		if ( array_key_exists( $input, $google_fonts_arr ) ) {
			return $input;
		} else {
			return '';
		}
	}

}

add_action( 'customize_register', 'flaxseedpro_customize_register_fonts' );
