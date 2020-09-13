<?php
/**
 * @package flaxseed-pro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid flaxseed-pro'); ?>>
    <div class="out-thumb md-8 sm-8">
        <header class="entry-header">
            <h2 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        </header><!-- .entry-header -->
        <div class="postedon"><?php flaxseedpro_posted_on(); ?></div>
        <div class="entry-excerpt body-font"><?php the_excerpt(); ?></div>
    </div>
    <div class="featured-thumb md-4 sm-4">
        <?php if (has_post_thumbnail()) : ?>	
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('flaxseed-pro-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . "/assets/images/placeholder.png"); ?>"></a>
        <?php endif; ?>
    </div><!--.featured-thumb-->
</article><!-- #post-## -->