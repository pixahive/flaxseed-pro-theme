<div id="top-bar" class="header-style-1">
    <div class="container">
        <div class="top-bar-date">
            <div id="social">
                <?php get_template_part('modules/social/social', 'fa'); ?>
            </div>			
        </div>
        <div class="top-bar-right">
            <div class="short-menu">
                <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div>
            <div class="top-bar-search-form">
                <?php get_search_form(); ?>
            </div>
        </div>	
    </div>
</div>
<header id="masthead" class="site-header header-style-1" role="banner">		
    <div class="container logo-container top-container">	
        <div id="mobile-search-icon"><button id="searchicon"><i class="fa fa-search"></i></button></div>
        <div class="site-branding">
            <div class="md-4">
                <?php if (has_custom_logo()) : ?>
                    <div id="site-logo-left">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php endif; ?>
                <?php if (display_header_text()) : ?>
                    <div id="text-title-desc">
                        <?php if (is_front_page()) : ?>
                            <div class="site-title title-font"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="site-title title-font"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="md-8">
                <div class="primary-menu-parent">
                    <div class="container">
                        <?php get_template_part('modules/header/menu', 'primary'); ?>
                    </div>
                </div>
            </div>
        </div>     		
        <div id="menu-icon"><button href="#menu" class="toggle-menu-link"><i class="fa fa-bars"></i></button></div>
    </div>
    <?php get_template_part('modules/header/jumbosearch'); ?>
</header><!-- #masthead -->