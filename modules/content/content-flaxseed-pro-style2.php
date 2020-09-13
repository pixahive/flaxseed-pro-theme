<?php
/**
 * @package flaxseed-pro
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('grid flaxseed-pro'); ?>>
    <div class="out-thumb">
        <header class="entry-header">
            <h2 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        </header><!-- .entry-header -->
        <div class="featured-thumb md-5 sm-5">
            <?php if (has_post_thumbnail()) : ?>	
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('flaxseed-pro-thumb'); ?></a>
            <?php else: ?>
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . "/assets/images/placeholder.png"); ?>"></a>
            <?php endif; ?>
        </div><!--.featured-thumb-->
        <br>
        <div class="md-7 sm-7">
            <div class="postedon"><?php flaxseedpro_posted_on(); ?></div>
            <div class="entry-excerpt body-font"><?php the_excerpt(); ?></div>
            <a href=""<?php the_permalink() ?>" class="theme-button">Read More</a>
        </div>
    </div>
</article><!-- #post-## --> 
