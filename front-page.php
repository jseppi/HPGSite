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

        <div class="hide" id="video_embed">http://youtu.be/bcOtvx_dHUc</div>
    
        <div class="modal hide fade" id="video_modal">
            <div class="modal-body">
                <iframe width="560" height="315" src="http://www.youtube.com/embed/bcOtvx_dHUc" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    
        <div class="row">
            <div class="span6">
                <div id="main-carousel" class="carousel slide">
                    <!-- Carousel items -->
                    <?php  query_posts( array ( 'category_name' => 'carousel', 'posts_per_page' => -1 ) );  ?>
                        <?php while ( have_posts() ) : the_post(); ?>    
                            <?php echo make_carousel(); ?>
                    <?php endwhile; ?>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#main-carousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#main-carousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            
            
            <div class="span3">
                <div class="hero-unit">
                    <h3>Location</h3>
                    <address>
                        4125 Guadalupe St.<br/>
                        Austin, TX, 78751 (<a href="http://goo.gl/maps/uOMF" target="_blank">map</a>)
                    </address>
                    <phone>
                        (512) 459-9174
                    </phone>
                    <hr/>
                    <h3>Hours</h3>
                    <section>
                        Monday - Friday: 5AM - 10PM<br/>
                        Saturday: 7AM - 7PM<br/>
                        Sunday: 8AM - 7PM
                    </section>
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