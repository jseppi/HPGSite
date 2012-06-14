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
            <div class="span5">
                <div id="main-carousel" class="carousel slide">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <a href="#video_modal" data-toggle="modal"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/video_teaser.jpg" alt="Video Teaser" title="Watch the Hyde Park Gym featurette!" /></a>
                            <div class="carousel-caption">
                                <h4>Watch to learn what Hyde Park Gym is all about</h4>
                                <p>This short <a href="http://youtu.be/bcOtvx_dHUc" target="_blank">video</a> will introduce you to the community gym feel that is embodied by Hyde Park Gym.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hyde-park-gym-sunset-austin-texas.jpg" alt="HPG Sunset" title="Hyde Park Gym" />
                            <div class="carousel-caption">
                                <h4>Mailing List</h4>
                                <p>Sign up here to get on the HPG Mailing List</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/equinox.jpg" alt="HPG Equinox" title="Hyde Park Gym" />
                            <div class="carousel-caption">
                                <h4>Merchandise</h4>
                                <p>Check our the merchandise section to show off your HPG pride.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/weights.jpg" alt="HPG Weights" title="Hyde Park Gym" />
                            <div class="carousel-caption">
                                <h4>Personal Trainers</h4>
                                <p>Hyde Park Gym trainers will help you reach <em>your</em> fitness goals.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#main-carousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#main-carousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            
            
            <div class="span4">
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