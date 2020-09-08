<?php
	
//Import Admin Modules
require get_template_directory() . '/modules/admin_modules/register_styles.php';
require get_template_directory() . '/modules/admin_modules/register_widgets.php';
require get_template_directory() . '/modules/admin_modules/theme_setup.php';
require get_template_directory() . '/modules/admin_modules/excerpt_length.php';

/*
**	Determining Sidebar and Primary Width
*/
function flaxseedpro_primary_class() {
	$class = "md-8";
	echo esc_attr($class);
}
add_action('flaxseedpro_primary-width', 'flaxseedpro_primary_class');

function flaxseedpro_secondary_class() {
	$class = "md-4";
	echo esc_attr($class);
}
add_action('flaxseedpro_secondary-width', 'flaxseedpro_secondary_class');


/*
** Function to Get Theme Layout 
*/
function flaxseedpro_get_blog_layout(){
	$ldir = 'modules/content/content';
	if (get_theme_mod('flaxseedpro_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('flaxseedpro_blog_layout') );
	else :
		get_template_part( $ldir ,'flaxseed-pro');	
	endif;	
}
add_action('flaxseedpro_blog_layout', 'flaxseedpro_get_blog_layout');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/modules/customizer/init.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function flaxseedpro_display_featured_area($style, $fa_title, $cat) {
	if (is_home()) :
	switch ($style) {
		case "carousel" :
			flaxseedpro_carousel($fa_title, $cat);
		break;
		case "style1" :
			flaxseedpro_featured_style1($fa_title, $cat);
		default:
			//get_template_part('modules/header/featured-posts');
		break;							
	}
	endif;
}


/**
 * Function to Load the Carousel on Front End
 */
function flaxseedpro_carousel($fa_title, $cat) { ?>

<div class="featured-carousel">
	<?php if ($fa_title != "") : ?>
	<h2 class="featured-section-title container">
		<?php echo $fa_title; ?>
	</h2>
	<?php endif; ?>
	<div class="container">
		<div class="owl-carousel owl-theme">
	        
	        <?php //WP Loop to get featured posts ?>
	        <?php  
	    		$args = array( 
	    				'posts_per_page' =>  6, 
	    				'cat' => $cat 
	    			);
				$fa_posts = new WP_Query ($args);
				
				if ( $fa_posts->have_posts() ) : 
				
				while ( $fa_posts->have_posts() ) : $fa_posts->the_post(); ?> 	
						
				<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
					<div class="item-container">
						<div class="md-4"
							<?php if (has_post_thumbnail()) : ?>	
								<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
							<?php else : ?>
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder.png" ); ?>"></a>
							<?php endif; ?>
						</div><!--.nd3-->
					
					</div>		
					
					<div class="post-title-parent md-8">
						<a class="carousel-post-title title-font" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						<div class="carousel-post-date">
							<i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?>
						</div>
					</div>
						
				</article><!-- #post-## -->
					
				<?php endwhile; ?>
	
			<?php endif; 
				wp_reset_postdata(); ?>
	        
	        
		</div>
	</div>
</div>
<?php } //endfunction 

function flaxseedpro_featured_style1($fa_title, $cat) { ?>

<div class="featured-style1">
	<?php if ($fa_title != "") : ?>
	<h2 class="featured-section-title container">
		<?php echo $fa_title; ?>
	</h2>
	<?php endif; ?>
	<div class="featured-posts-inner container">
		
		<?php $args = array( 'posts_per_page' =>  5, 'cat' => $cat );
	    		$fa_posts = new WP_Query ($args);
		    		
		    	if ( $fa_posts->have_posts() ) : 
		    		
					$counter = 0;
					while ($fa_posts->have_posts()) : $fa_posts->the_post();
					  $counter++;						  
					  		if ($counter == 1) : ?> 	
					  			<div class="feat-col1 md-3">
					  		<?php elseif ($counter == 3) : ?>
								 <div class="feat-col2 md-6"> 
							 <?php  elseif ($counter == 4)  : ?>
							 	<div class="feat-col3 md-3"> 		 
							 <?php endif; ?>		 	
							
					<article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
						<div class="item-container">
								<?php if (has_post_thumbnail()) : ?>	
									<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('flaxseed-pro-thumb'); ?></a>
								<?php else : ?>
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo esc_url( get_template_directory_uri()."/assets/images/placeholder.png" ); ?>"></a>
		
								<?php endif; ?>
						
						</div>		
						
						<div class="post-title-parent">
							<a class="post-title title-font" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
							<?php if ($counter == 3) : ?>
							<div class="post-date">
								<i class="fa fa-clock-o"></i> <?php the_time('F j, Y');?>
							</div>
							<div class="post-excerpt"><?php the_excerpt(); ?></div>
							<?php else : ?>
								<div class="post-date">
									<i class="fa fa-clock-o"></i> <?php the_time('F j, Y');?>
								</div>
							<?php endif; ?>
						</div>
							
					</article><!-- #post-## -->
					
					<?php if ($counter == 2 || $counter == 3 || $counter == 5 ) : ?> 	
					  	</div><!--.feat-col-->
					<?php endif; 
						
						endwhile;					
					
					endif; 
						wp_reset_postdata(); ?>
	
	</div>
</div>
<?php } //endfunction ?>