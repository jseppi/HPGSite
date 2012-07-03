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

    
        <div class="modal hide fade" id="video_modal">
            <div class="modal-body">
                <iframe width="560" height="315" src="http://www.youtube.com/embed/bcOtvx_dHUc" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    
        <div class="row">
            <div class="span6">
                <?php  query_posts( array ( 'category_name' => 'carousel', 'posts_per_page' => 1 ) );  ?>
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <?php echo make_carousel(); ?>
                <?php endwhile; ?>
            </div>
            
            
            <div class="span3">
                <div class="hero-unit">
                    <?php  query_posts( array ( 'category_name' => 'herounit', 'posts_per_page' => 1 ) );  ?>
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                </div>
            
            </div>
         </div>
    
        
        <div class="row">
            <?php query_posts( array ( 'category_name' => 'front-page-blurb', 'posts_per_page' => 1 ) ); ?>
            
            <div class="span9">
                <div class="entry-body">
                    <article class="sticky">
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </article>
                </div>
            </div>
        </div>
        

        <?php query_posts(  'cat=3,1' ); ?>
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