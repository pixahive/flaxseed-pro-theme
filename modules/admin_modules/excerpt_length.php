<?php
//Function to Trim Excerpt Length & more..
function flaxseedpro_excerpt_length( $length ) {
    if ( is_admin() ) 
		return $length;    	
    return 23;
}
add_filter( 'excerpt_length', 'flaxseedpro_excerpt_length', 999 );

function flaxseedpro_excerpt_more( $more ) {
	if (!is_admin())
    	return '...';
}
add_filter( 'excerpt_more', 'flaxseedpro_excerpt_more' );