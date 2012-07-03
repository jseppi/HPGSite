<?php get_header(); ?>


<section class="row">

    <?php $left_sidebar_args = array(

      'theme_location'  => 'left_nav',
      'container'       => 'div', 
      'container_class' => 'span2 left-sidebar sidebar-nav', 
      'menu_id'         => 'left_nav', 
      'menu_class'      => 'nav nav-list', 
      'echo'            => true,
      'fallback_cb'     => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 0
      );
    ?>

    <?php //wp_nav_menu( $left_sidebar_args ); ?>     
    
     <div class="span9 main-content">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <?php get_template_part('content'); ?>
            
        <?php endwhile; else: ?>
            <p>
                <?php _e('Sorry, no posts found.'); ?>
            </p>
        <?php endif; ?>
        <p>
            <?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
        </p>
        
    </div>
    
    <?php get_sidebar(); ?>
</section>
    

<?php get_footer(); ?>