<?php
/**
 * Template Name: Apenas conteúdo
 * Description: Mostra apenas o conteúdo da página
 */
get_header(); ?>

<main id="main" class="site-main mx-auto">
    
    <?php
    while ( have_posts() ) : the_post();
    ?>
    
    <article id="post-<?php the_ID(); ?>">
        
        <div class="entry-content prose max-w-none text-lg text-slate-700 min-h-screen">
            <?php the_content(); ?>
        </div>
        
    </article><?php         
    endwhile; 
    ?>

</main>

<?php get_footer(); ?>