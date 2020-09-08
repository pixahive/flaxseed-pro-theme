<?php
//Settings for Header Image
function flaxseedpro_customize_register_header( $wp_customize ) {

$wp_customize->get_section('title_tagline')->title = __('Site Identity & Logo','flaxseed-pro');


	
}
add_action( 'customize_register', 'flaxseedpro_customize_register_header' );