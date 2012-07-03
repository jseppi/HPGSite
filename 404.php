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

        <div class="hero-unit">
            <h1>OH SNAP! YOU GOT 404'D</h1>
            <p>This ain't a page.  What were you even looking for? <a href="<?php get_home_url(); ?>">Get outta here!</a></p>
        </div>
    
    </div>
    
    <?php get_sidebar(); ?>
</section>
    

<?php get_footer(); ?>