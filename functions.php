<?php
function hpgtheme_addmenus() {
	register_nav_menus(
		array(
            'top_nav_static' => 'Top Menu (static)',
			'top_nav_collapse' => 'Top Menu (collapsable)',
            'left_nav' => 'The Left Menu'
		)
	);
}

add_action( 'init', 'hpgtheme_addmenus' );

$primary_sidebar_args = array(
    'name' => 'Primary Sidebar',
    'id' => 'primary_sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
);

register_sidebar($primary_sidebar_args);

$footer_widget_args = array(
    'name' => 'Footer Widgets',
    'id' => 'footer-widgets',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
);

register_sidebar($footer_widget_args);


$header_widget_args = array(
    'name' => 'Header Widgets',
    'id' => 'header-widgets',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => ''
);

register_sidebar($header_widget_args);



?>