<?php
/*
Template Name: Trainers Page
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

    
    <div class="span9 main-content">

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
                 
                    <div class="meta">
                        <?php edit_post_link(__('Edit This')); ?>	
                    </div>
                </header>
                <div class="entry-body">
                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    <?php else : ?>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                    <?php endif; ?>
                
                </div>
            </article>
            
        <?php endwhile; // end of the loop. ?>
        
        <!-- special trainer page template stuff -->
        
        
        <?php  query_posts( array ( 'category_name' => 'trainer-blurb', 'posts_per_page' => -1 ) );  ?>
        <?php while ( have_posts() ) : the_post(); ?>    
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
    
    <?php get_sidebar(); ?>
</section>
    

<?php get_footer(); ?>