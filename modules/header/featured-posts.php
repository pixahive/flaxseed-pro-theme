<div id="featured-posts">
	
	<div class="featured-posts-inner container">
		
		<?php if ( have_posts() ) : ?>
		
					<?php /* Start the Loop */  ?>
					<?php
		    		$args = array( 'posts_per_page' =>  5, 
		    			//'category' => esc_html(get_theme_mod('flaxseedpro_featposts_cat')) 
		    		);
					$lastposts = get_posts( $args );
					$counter = 0;
					foreach ( $lastposts as $post ) :
					  $counter++;	
					  
					  setup_postdata( $post ); 
					  
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
							<a class="post-title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</div>
							
					</article><!-- #post-## -->
					
					<?php if ($counter == 2 || $counter == 3 || $counter == 5 ) : ?> 	
					  	</div><!--.feat-col-->
					<?php endif; 
						
						endforeach;
					
					
					endif; 
						wp_reset_postdata(); ?>
	
	</div>
</div>