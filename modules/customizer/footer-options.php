<?php
/**
 * Footer Option Customizer
 *
 * @package flaxseed-pro
 */

/**
 * Add support for Footer Activation Option from Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flaxseedpro_customize_register_footer_options( $wp_customize ) {
	$wp_customize->add_section(
		'flaxseedpro_footer_options_section',
		array(
			'title'    => __( 'Footer Options', 'flaxseed-pro' ),
			'priority' => 49,
		)
	);
	$wp_customize->add_setting(
		'flaxseedpro_footer_activation_status',
		array(
			'sanitize_callback' => 'flaxseedpro_sanitize_fm',
			'default'           => 'inactive',
		)
	);
	$wp_customize->add_setting(
		'flaxseedpro_footer_copyright_text',
		array(
			'sanitize_callback' => 'flaxseedpro_sanitize_copyright_text',
			'default'           => '',
		)
	);
	$footer_options = array(// Redefined in Sanitization Function.
		'inactive' => __( 'No', 'flaxseed-pro' ),
		'active'   => __( 'Yes', 'flaxseed-pro' ),
	);
	$wp_customize->add_control(
		'flaxseedpro_footer_activation_status',
		array(
			'settings'    => 'flaxseedpro_footer_activation_status',
			'label'       => __( 'Show Footer Menu?', 'flaxseed-pro' ),
			'description' => __( 'Please make sure to assign a menu to footer menu from Menus.', 'flaxseed-pro' ),
			'section'     => 'flaxseedpro_footer_options_section',
			'type'        => 'select',
			'choices'     => $footer_options,
		)
	);
	$wp_customize->add_control(
		'flaxseedpro_footer_copyright_text',
		array(
			'settings' => 'flaxseedpro_footer_copyright_text',
			'label'    => __( 'Copyright Text', 'flaxseed-pro' ),
			'section'  => 'flaxseedpro_footer_options_section',
			'type'     => 'textarea',
		)
	);

	/**
	 * Function to sanitize Footer Activation Option selection
	 *
	 * @param type $input value to check against our defined Footer Activation Option.
	 * @return string
	 */
	function flaxseedpro_sanitize_fm( $input ) {
		$footer_options = array(
			'inactive',
			'active',
		);
		if ( in_array( $input, $footer_options, true ) ) {
			return $input;
		} else {
			return '';
		}
	}

	/**
	 * Function to sanitize Footer Activation Option selection
	 *
	 * @param type $input value to check against our defined Footer Activation Option.
	 * @return string
	 */
	function flaxseedpro_sanitize_copyright_text( $input ) {
		// Allowed html for copyright text. This way people can add links to copyright text.
		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'class' => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
		);
		return wp_kses( $input, $allowed_html );
	}
}

add_action( 'customize_register', 'flaxseedpro_customize_register_footer_options' );
