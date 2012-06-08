<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" >
    <header>
        <h2>
            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
        </h2>
     
        <?php if(function_exists('breadcrumbs')) { ?> 
            <div class="breadcrumbs">
                <?php breadcrumbs(); ?>
             </div>
         <?php } ?>
        
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <span class="sep">Posted on </span>
                <time class="entry-date" datetime="<?php echo get_the_date(); ?>" pubdate><?php echo get_the_date(); ?></time>
                
                <span class="by-author">
                    <span class="sep"> by </span> <?php the_author_posts_link(); ?>
                </span>
            </div><!-- .entry-meta -->
        <?php endif; ?>
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
                <?php the_content(__("Read more...")); ?>
            </div><!-- .entry-content -->
        <?php endif; ?>
    
    </div>
    
</article>