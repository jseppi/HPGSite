<?php
/*
Template Name: Rates Page
*/
?>

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

    
    <div class="span5 main-content">

        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <header>
                    <h2 id="post-<?php the_ID();?>">
                        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h2>
                 
                    <?php if(function_exists('breadcrumbs')) { ?> 
                        <div class="breadcrumbs">
                            <?php breadcrumbs(); ?>
                         </div>
                     <?php } ?>

                    <?php edit_post_link(__('Edit')); ?>	
                    
                </header>
                <div class="entry-body">
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->

                
                </div>
                
            </article>
        <?php endwhile; // end of the loop. ?>
    </div>
    <div class="span4">
      <img src="<?php echo get_template_directory_uri() ?>/images/waffle.jpg" height="477px" alt="HPG No Nonsense" title="No Nonsense Membership at Hyde Park Gym" />
      
    </div>
    
    <?php get_sidebar(); ?>
</section>
    

<?php get_footer(); ?>