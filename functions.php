<?php
/**
 * Theme Functions.
 *
 * @package flaxseed-pro
 */
// Import Admin Modules.
require get_template_directory() . '/modules/admin_modules/register_styles.php';
require get_template_directory() . '/modules/admin_modules/register_widgets.php';
require get_template_directory() . '/modules/admin_modules/theme_setup.php';
require get_template_directory() . '/modules/admin_modules/excerpt_length.php';

/**
 * Function to Determine Sidebar and Primary Width
 */
function flaxseedpro_primary_class() {
    $class = 'md-8';
    echo esc_attr($class);
}

add_action('flaxseedpro_primary-width', 'flaxseedpro_primary_class');

/**
 * Function to set secondary class
 */
function flaxseedpro_secondary_class() {
    $class = 'md-4';
    echo esc_attr($class);
}

add_action('flaxseedpro_secondary-width', 'flaxseedpro_secondary_class');

/**
 * Function to Get Theme Layout
 */
function flaxseedpro_get_blog_layout() {
    $ldir = 'modules/content/content';
    $user_selected_layout = get_theme_mod('flaxseedpro_blog_layout');
    if ($user_selected_layout) :
        if ('flaxseed-pro' === $user_selected_layout) :
            get_template_part($ldir, 'flaxseed-pro');
        else :
            get_template_part($ldir, 'flaxseed-pro-' . $user_selected_layout);
        endif;
    else :
        get_template_part($ldir, 'flaxseed-pro');
    endif;
}

add_action('flaxseedpro_blog_layout', 'flaxseedpro_get_blog_layout');

/**
 * Function to Get Header Layout
 */
function flaxseedpro_get_header_layout() {
    $ldir = 'modules/header/layouts/';
    $user_selected_layout = get_theme_mod('flaxseedpro_header_layout');

    if ($user_selected_layout) :
        if ('flaxseed-pro' === $user_selected_layout) :
            get_template_part('modules/header/masthead');
        else :
            get_template_part($ldir . 'masthead-' . $user_selected_layout);
        endif;
    else :
        get_template_part('modules/header/layouts/masthead', 'default');
    endif;
}

add_action('flaxseedpro_header_layout', 'flaxseedpro_get_header_layout');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 *
 * Function to display featured area depending on user choice
 *
 * @param type $style user selected style.
 * @param type $fa_title featured area title.
 * @param type $cat category to show posts from.
 */
function flaxseedpro_display_featured_area($style, $fa_title, $cat) {
    if (is_home()) :
        switch ($style) {
            case 'carousel':
                flaxseedpro_carousel($fa_title, $cat);
                break;
            case 'style1':
                flaxseedpro_featured_style1($fa_title, $cat);
                break;
            case 'style2':
                flaxseedpro_featured_style2($fa_title, $cat);
                break;
            case 'style3':
                flaxseedpro_featured_style3($fa_title, $cat);
                break;
            case 'style4':
                flaxseedpro_featured_style4($fa_title, $cat);
                break;
            default:
                break;
        }
    endif;
}

/**
 * Function to Load the Carousel on Front End
 *
 * @param type $fa_title featured area title.
 * @param type $cat category to fetch and show posts from.
 */
function flaxseedpro_carousel($fa_title, $cat) {
    ?>

    <div class="featured-carousel">
        <?php if ('' !== $fa_title) : ?>
            <h2 class="featured-section-title container">
                <?php echo esc_html($fa_title); ?>
            </h2>
        <?php endif; ?>
        <div class="container">
            <div class="owl-carousel owl-theme">

                <?php // WP Loop to get featured posts. ?>
                <?php
                $args = array(
                    'posts_per_page' => 6,
                    'cat' => $cat,
                );
                $fa_posts = new WP_Query($args);

                if ($fa_posts->have_posts()) :

                    while ($fa_posts->have_posts()) :
                        $fa_posts->the_post();
                        ?>


                        <article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>
                            <div class="item-container">
                                <div class="md-4"
                                <?php if (has_post_thumbnail()) : ?>	
                                         <a href=" <?php the_permalink(); ?> "><?php the_post_thumbnail('thumbnail'); ?></a>
                                         <?php else : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>
                                    <?php endif; ?>
                                </div><!--.nd3-->

                            </div>		

                            <div class="post-title-parent md-8">
                                <a class="carousel-post-title title-font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <div class="carousel-post-date">
                                    <i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?>
                                </div>
                            </div>

                        </article><!-- #post-## -->

                    <?php endwhile; ?>

                    <?php
                endif;
                wp_reset_postdata();
                ?>


            </div>
        </div>
    </div>
    <?php
}

// endfunction.

/**
 * Function to generate featured area 1
 *
 * @param type $fa_title featured area title.
 * @param type $cat category to fetch and show posts from.
 */
function flaxseedpro_featured_style1($fa_title, $cat) {
    ?>

    <div class="featured-style1">
        <?php if ('' !== $fa_title) : ?>
            <h2 class="featured-section-title container">
                <?php echo esc_html($fa_title); ?>
            </h2>
        <?php endif; ?>
        <div class="featured-posts-inner container">
            <?php
            $args = array(
                'posts_per_page' => 5,
                'cat' => $cat,
            );
            $fa_posts = new WP_Query($args);

            if ($fa_posts->have_posts()) :

                $counter = 0;
                while ($fa_posts->have_posts()) :
                    $fa_posts->the_post();
                    $counter++;
                    if (1 === $counter) :
                        ?>

                        <div class="feat-col1 md-3 sm-3">
                        <?php elseif (3 === $counter) : ?>
                            <div class="feat-col2 md-6 sm-6"> 
                            <?php elseif (4 === $counter) : ?>
                                <div class="feat-col3 md-3 sm-3"> 		 
                                <?php endif; ?>		 	

                                <article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
                                    <div class="item-container">
                                        <?php if (has_post_thumbnail()) : ?>	
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('flaxseed-pro-thumb'); ?></a>
                                        <?php else : ?>
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>

                                        <?php endif; ?>
                                    </div>		
                                    <div class="post-title-parent">
                                        <a class="post-title title-font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <?php if (3 === $counter) : ?>
                                            <div class="post-date">
                                                <i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?>
                                            </div>
                                            <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                        <?php else : ?>
                                            <div class="post-date">
                                                <i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </article><!-- #post-## -->
                                <?php if (2 === $counter || 3 === $counter || 5 === $counter) : ?> 	
                                </div><!--.feat-col-->
                                <?php
                            endif;
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        }

// endfunction.

        /**
         * Function to generate featured area 2
         *
         * @param type $fa_title featured area title.
         * @param type $cat category to fetch and show posts from.
         */
        function flaxseedpro_featured_style2($fa_title, $cat) {
            ?>
            <div class="featured-style1 featured-style2">
                <?php if ('' !== $fa_title) : ?>
                    <h2 class="featured-section-title container">
                        <?php echo esc_html($fa_title); ?>
                    </h2>
                <?php endif; ?>
                <div class="featured-posts-inner container">
                    <?php
                    $args = array(
                        'posts_per_page' => 5,
                        'cat' => $cat,
                    );
                    $fa_posts = new WP_Query($args);
                    if ($fa_posts->have_posts()) :
                        $counter = 0;
                        while ($fa_posts->have_posts()) :
                            $fa_posts->the_post();
                            $counter++;
                            if (1 === $counter) {
                                ?>
                                <div class="feat-col1 md-6 sm-6">
                                    <div class="md-12 pr-0 pl-0">
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
                                            <div class="item-container mb-3">
                                                <?php if (has_post_thumbnail()) : ?>	
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-large', array('class' => 'featured-post-thumbnail-primary')); ?></a>
                                                <?php else : ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="post-title-parent">
                                                <a class="post-title title-font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <div class="post-author">
                                                    <?php esc_html_e('By', 'flaxseed-pro'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a>&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?>
                                                </div>
                                                <div class="entry-excerpt body-font mb-3"><?php the_excerpt(); ?></div>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="theme-button"><?php _e('Read More','flaxseed-pro') ?></a>
                                        </article>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="feat-col2 md-6 sm-6">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
                                        <div class="md-4 xs-4">
                                            <div class="item-container">
                                                <?php if (has_post_thumbnail()) : ?>	
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('class' => 'featured-post-thumbnail-secondary')); ?></a>
                                                <?php else : ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="md-8 xs-8">
                                            <div class="post-title-parent">
                                                <a class="post-title title-font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <br><small><?php esc_html_e('By', 'flaxseed-pro'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="url fn n" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a>&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></small>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <?php
                            }
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
            <?php
        }

// endfunction.

        /**
         * Function to generate featured area 3
         *
         * @param type $fa_title featured area title.
         * @param type $cat category to fetch and show posts from.
         */
        function flaxseedpro_featured_style3($fa_title, $cat) {
            ?>
            <div class="featured-style1 featured-style3">
                <?php if ('' !== $fa_title) : ?>
                    <h2 class="featured-section-title container">
                        <?php echo esc_html($fa_title); ?>
                    </h2>
                <?php endif; ?>
                <div class="featured-posts-inner container">
                    <?php
                    $args = array(
                        'posts_per_page' => 5,
                        'cat' => $cat,
                    );
                    $fa_posts = new WP_Query($args);
                    if ($fa_posts->have_posts()) :
                        $counter = 0;
                        while ($fa_posts->have_posts()) :
                            $fa_posts->the_post();
                            $counter++;
                            if (1 === $counter) {
                                ?>
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
                                        <div class="feat-col1 md-12">
                                            <div class="item-container md-6">
                                                <?php if (has_post_thumbnail()) : ?>	
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-large', array('class' => 'featured-post-thumbnail-primary')); ?></a>
                                                <?php else : ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="md-6">
                                                <div class="post-title-parent">
                                                    <a class="post-title title-font mb-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    <div class="post-author">
                                                        <small><?php _e('By','flaxseed-pro') ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a>&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></small>
                                                    </div>
                                                    <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="theme-button"><?php _e('Read More','flaxseed-pro') ?></a>
                                            </div>
                                        </div>
                                        
                                    </article>
                                <?php
                            } else {
                                ?>
                                <div class="feat-col2 md-6 sm-6">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
                                        <div class="md-4 xs-4">
                                            <div class="item-container">
                                                <?php if (has_post_thumbnail()) : ?>	
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', array('class' => 'featured-post-thumbnail-secondary')); ?></a>
                                                <?php else : ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="md-8 xs-8">
                                            <div class="post-title-parent">
                                                <a class="post-title title-font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <br><small><?php _e('By','flaxseed-pro') ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="url fn n" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a>&nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></small>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <?php
                            }
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        }

// endfunction.

        /**
         * Function to generate featured area 4
         *
         * @param type $fa_title featured area title.
         * @param type $cat category to fetch and show posts from.
         */
        function flaxseedpro_featured_style4($fa_title, $cat) {
            ?>
            <div class="featured-style1 featured-style4">
                <?php if ('' !== $fa_title) : ?>
                    <h2 class="featured-section-title container">
                        <?php echo esc_html($fa_title); ?>
                    </h2>
                <?php endif; ?>
                <div class="featured-posts-inner container">
                    <?php
                    $args = array(
                        'posts_per_page' => 2,
                        'cat' => $cat,
                    );
                    $fa_posts = new WP_Query($args);
                    if ($fa_posts->have_posts()) :
                        $counter = 0;
                        ?>
                        <div class="md-6 sm-6 feat-col1">
                            <?php
                            while ($fa_posts->have_posts()) :
                                $fa_posts->the_post();
                                $counter++;
                                ?>
                                <div class="md-12 ">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
                                        <div class="feat-col1 md-6">
                                            <div class="item-container">
                                                <?php if (has_post_thumbnail()) : ?>	
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-large', array('class' => 'featured-post-thumbnail-primary')); ?></a>
                                                <?php else : ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="md-6">
                                            <div class="post-title-parent">
                                                <a class="post-title title-font" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <div class="post-author">
                                                    <small><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a><i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></small>
                                                </div>
                                                <div class="post-excerpt mb-3"><?php the_excerpt(); ?></div>
                                            </div>
                                        </div>
                                    </article>
                                </div>

                                <?php
                            endwhile;
                            ?>
                        </div>
                        <?php
                    endif;
                    wp_reset_postdata();
                    $args = array(
                        'posts_per_page' => 3,
                        'cat' => $cat,
                        'offset' => 2,
                    );
                    $fa_posts = new WP_Query($args);
                    if ($fa_posts->have_posts()) {
                        $counter = 0;
                        ?>
                        <div class="md-6 sm-6 feat-col2">
                            <?php
                            while ($fa_posts->have_posts()) :
                                $fa_posts->the_post();
                                ?>
                                <div class="md-12 ">
                                    <article id="post-<?php the_ID(); ?>" <?php post_class('featured-post-item'); ?>>
                                        <div class="md-6">
                                            <div class="item-container mb-3">
                                                <?php if (has_post_thumbnail()) : ?>	
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-large', array('class' => 'featured-post-thumbnail-primary')); ?></a>
                                                <?php else : ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.png'); ?>"></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="md-6">
                                            <div class="post-title-parent">
                                                <a class="post-title title-font mb-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                <div class="post-author">
                                                    <small><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>"><?php the_author(); ?></a><i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></small>
                                                </div>
                                                <!--<div class="post-excerpt mb-3"><?php the_excerpt(); ?></div>-->
                                            </div>
                                            <!--<a href="<?php the_permalink(); ?>" class="theme-button">Read More</a>-->
                                        </div>
                                    </article>
                                </div>

                                <?php
                            endwhile;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }

// endfunction.
        ?>
