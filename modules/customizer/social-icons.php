<?php
// Social Icons
function flaxseedpro_customize_register_social( $wp_customize ) {
$wp_customize->add_section('flaxseedpro_social_section', array(
    'title' => __('Social Icons','flaxseed-pro'),
    'priority' => 44 ,
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','flaxseed-pro'),
    'facebook' => __('Facebook','flaxseed-pro'),
    'twitter' => __('Twitter','flaxseed-pro'),
    'google-plus' => __('Google Plus','flaxseed-pro'),
    'instagram' => __('Instagram','flaxseed-pro'),
    'rss' => __('RSS Feeds','flaxseed-pro'),
    'vine' => __('Vine','flaxseed-pro'),
    'vimeo-square' => __('Vimeo','flaxseed-pro'),
    'youtube' => __('Youtube','flaxseed-pro'),
    'flickr' => __('Flickr','flaxseed-pro'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'flaxseedpro_social_'.$x, array(
        'sanitize_callback' => 'flaxseedpro_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'flaxseedpro_social_'.$x, array(
        'settings' => 'flaxseedpro_social_'.$x,
        'label' => __('Icon ','flaxseed-pro').$x,
        'section' => 'flaxseedpro_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'flaxseedpro_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'flaxseedpro_social_url'.$x, array(
        'settings' => 'flaxseedpro_social_url'.$x,
        'description' => __('Icon ','flaxseed-pro').$x.__(' Url','flaxseed-pro'),
        'section' => 'flaxseedpro_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function flaxseedpro_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'flaxseedpro_customize_register_social' );