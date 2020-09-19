<?php
/**
 * Header Layout Customizer
 *
 * @package flaxseed-pro
 */

/**
 * Add support for custom header layouts from Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flaxseedpro_customize_register_header_layouts( $wp_customize ) {
	$wp_customize->add_section(
		'flaxseedpro_bl_section',
		array(
			'title'    => __( 'Header Layouts', 'flaxseed-pro' ),
			'priority' => 44,
		)
	);

	$header_layouts = array(// Redefinied in Sanitization Function.
		'flaxseed-pro' => __( 'Theme Default', 'flaxseed-pro' ),
		'style1'       => __( 'Header Layout 1', 'flaxseed-pro' ),
		'style2'       => __( 'Header Layout 2', 'flaxseed-pro' )
	);
	$wp_customize->add_section(
		'flaxseedpro_header_layout_section',
		array(
			'title'    => __( 'Header Layouts', 'flaxseed-pro' ),
			'priority' => 46,
		)
	);
	$wp_customize->add_setting(
		'flaxseedpro_header_layout',
		array(
			'sanitize_callback' => 'flaxseedpro_sanitize_hl',
			'default'           => 'flaxseed-pro',
		)
	);

	$wp_customize->add_control(
		'flaxseedpro_header_layout',
		array(
			'settings' => 'flaxseedpro_header_layout',
			'label'    => __( 'Layouts ', 'flaxseed-pro' ),
			'section'  => 'flaxseedpro_header_layout_section',
			'type'     => 'select',
			'choices'  => $header_layouts,
		)
	);

	/**
	 * Function to sanitize custom header layouts selection
	 *
	 * @param type $input value to check against our defined custom header layouts/styles.
	 * @return string
	 */
	function flaxseedpro_sanitize_hl( $input ) {
		$header_layouts = array(
			'flaxseed-pro',
			'style1',
			'style2'
		);
		if ( in_array( $input, $header_layouts, true ) ) {
			return $input;
		} else {
			return '';
		}
	}

}

add_action( 'customize_register', 'flaxseedpro_customize_register_header_layouts' );
