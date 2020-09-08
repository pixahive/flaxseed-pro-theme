<?php
// fa Icons
function flaxseedpro_customize_register_fa( $wp_customize ) {
$wp_customize->add_section('flaxseedpro_fa_section', array(
    'title' => __('Homepage Featured Areas','flaxseed-pro'),
    'priority' => 44 ,
));

$featured_areas = array( //Redefinied in Sanitization Function.
    'none' => __('-','flaxseed-pro'),
    'carousel' => __('Sliding Carousel','flaxseed-pro'),
    'style1' => __('Hero 1','flaxseed-pro'),
);

$fa_count = count($featured_areas);

for ($x = 1 ; $x <= ($fa_count + 1) ; $x++) :

    $wp_customize->add_setting(
        'flaxseedpro_fa_'.$x, array(
        'sanitize_callback' => 'flaxseedpro_sanitize_fa',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'flaxseedpro_fa_'.$x, array(
        'settings' => 'flaxseedpro_fa_'.$x,
        'label' => __('Featured Area ','flaxseed-pro').$x,
        'section' => 'flaxseedpro_fa_section',
        'type' => 'select',
        'class' => 'featured_area_title_style',
        'choices' => $featured_areas,
    ));

    $wp_customize->add_setting(
        'flaxseedpro_fa_title'.$x, array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 'flaxseedpro_fa_title'.$x, array(
        'settings' => 'flaxseedpro_fa_title'.$x,
        'description' => __('Section Heading (Optional)','flaxseed-pro'),
        'section' => 'flaxseedpro_fa_section',
        'type' => 'text',
    ));
    
	$cats = array();
	foreach ( get_categories() as $categories => $category ){
	    $cats[$category->term_id] = $category->name;
	}
	 
	// we register our new setting
	$wp_customize->add_setting( 'flaxseedpro_fa_cat'.$x, array(
	    'default' => 1,
	    'sanitize_callback' => 'absint'
	) );
	 
	// we create our control for the setting
	$wp_customize->add_control( 'flaxseedpro_fa_cat'.$x, array(
	    'settings' => 'flaxseedpro_fa_cat'.$x,
	    'type' => 'select',
	    'description' => __('Choose Category','flaxseed-pro'),
	    'choices' => $cats,
	    'section' => 'flaxseedpro_fa_section',  // depending on where you want it to be
	) );

endfor;

function flaxseedpro_sanitize_fa( $input ) {
    $featured_areas = array(
        'none' ,
        'carousel',
        'style1',
    );
    if ( in_array($input, $featured_areas) )
        return $input;
    else
        return '';
}

}
add_action( 'customize_register', 'flaxseedpro_customize_register_fa' );