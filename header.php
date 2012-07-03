<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>

    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/bootstrap/css/bootstrap.min.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen, projection">
   
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/bootstrap/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/site.js"></script>

    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body>

<div class="container">
    
    
    <header id="site-header" class="row">  
        <div class="span12 header-wrap">
            <div class="row">
                <hgroup class="span5">
                    <a href="<?php echo get_site_url(); ?>">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/arm_red_100.png" title="Hyde Park Gym" alt="Logo"/>
                    </a>
                    
                    <h1>
                        <a class="header-link" href="<?php echo get_site_url(); ?>" title="Hyde Park Gym">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <div class="site-tagline">
                        <em><?php bloginfo('description'); ?></em>
                    </div>
                </hgroup>
                <div class="header-widgets span4 offset2">
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header-widgets') ) : ?>
                
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>    
     
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <?php $top_static_args = array(

                    'theme_location'  => 'top_nav_static',
                    'container'       => '', 
                    'container_class' => '',
                    'menu_id'         => 'top_nav_static', 
                    'menu_class'      => 'nav', 
                    'echo'            => true,
                    'fallback_cb'     => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s"><li>
                                            <a href="' . get_site_url() . '"><i class="icon-home icon-white"></i></a>
                                            </li>
                                            <li class="divider-vertical"></li>
                                            %3$s
                                            </ul>',
                    'depth'           => 0
                    );
                ?>

                <?php wp_nav_menu( $top_static_args ); ?> 

                
                <?php $top_collapse_args = array(

                    'theme_location'  => 'top_nav_collapse',
                    'container'       => 'div', 
                    'container_class' => 'nav-collapse',
                    'menu_id'         => 'top_nav_collapse', 
                    'menu_class'      => 'nav', 
                    'echo'            => true,
                    'fallback_cb'     => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0
                    );
                ?>

                <?php wp_nav_menu( $top_collapse_args ); ?> 
                
            </div>
        </div>
    </div><!-- end navbar -->
    
