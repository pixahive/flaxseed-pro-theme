<?php
/**
 * Blog Layout Customizer
 *
 * @package flaxseed-pro
 */

/**
 * Add support for custom blog layouts from Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flaxseedpro_customize_register_blog_layouts( $wp_customize ) {
	$wp_customize->add_section(
		'flaxseedpro_bl_section',
		array(
			'title'    => __( 'Blog Layouts', 'flaxseed-pro' ),
			'priority' => 44,
		)
	);

	$blog_layouts = array(// Redefinied in Sanitization Function.
		'flaxseed-pro' => __( 'Theme Default', 'flaxseed-pro' ),
		'style1'       => __( 'Blog Layout 1', 'flaxseed-pro' ),
		'style2'       => __( 'Blog Layout 2', 'flaxseed-pro' ),
		'style3'       => __( 'Blog Layout 3', 'flaxseed-pro' ),
	);
	$wp_customize->add_section(
		'flaxseedpro_blog_layout_section',
		array(
			'title'    => __( 'Blog Layouts', 'flaxseed-pro' ),
			'priority' => 46,
		)
	);
	$wp_customize->add_setting(
		'flaxseedpro_blog_layout',
		array(
			'sanitize_callback' => 'flaxseedpro_sanitize_bl',
			'default'           => 'flaxseed-pro',
		)
	);

	$wp_customize->add_control(
		'flaxseedpro_blog_layout',
		array(
			'settings' => 'flaxseedpro_blog_layout',
			'label'    => __( 'Layouts ', 'flaxseed-pro' ),
			'section'  => 'flaxseedpro_blog_layout_section',
			'type'     => 'select',
			'choices'  => $blog_layouts,
		)
	);

	/**
	 * Function to sanitize custom blog layouts selection
	 *
	 * @param type $input value to check against our defined custom blog layouts/styles.
	 * @return string
	 */
	function flaxseedpro_sanitize_bl( $input ) {
		$blog_layouts = array(
			'flaxseed-pro',
			'style1',
			'style2',
			'style3',
		);
		if ( in_array( $input, $blog_layouts, true ) ) {
			return $input;
		} else {
			return '';
		}
	}

}

add_action( 'customize_register', 'flaxseedpro_customize_register_blog_layouts' );
