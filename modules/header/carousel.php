<?php function flaxseedpro_carousel() { ?>

	<div id="featured-carousel">
	<div class="featured-section-title">
		<?php global $fa_title;  esc_html( $fa_title ); ?>
	</div>
	<div class="container">
		<div class="owl-carousel owl-theme">
	        
	        <?php //WP Loop to get featured posts ?>
	        <?php if ( have_posts() ) : ?>
	
				<?php /* Start the Loop */  
	    		$args = array( 
	    				'posts_per_page' =>  9, 
	    				'category' => esc_html(get_theme_mod('flaxseedpro_featposts_cat')) 
	    				);
				$lastposts = get_posts( $args );
				foreach ( $lastposts as $post ) :
				  setup_postdata( $post ); ?> 	
						
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
							<?php the_time('F j, Y'); ?>
						</div>
					</div>
						
				</article><!-- #post-## -->
					
				<?php endforeach; ?>
	
			<?php endif; 
					wp_reset_postdata(); ?>
	        
	        
		</div>
	</div>
</div>
<?php } //endfunction ?>