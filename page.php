<?php get_header(); ?>

<div id="primary" class="container mx-auto md:px-4 py-12">
    <main id="main" class="site-main mx-auto">
        
        <?php
        while ( have_posts() ) : the_post();
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'px-2 md:p-6 md:p-10 rounded-xl' ); ?>>
            
            <header class="entry-header mb-8 border-b border-gray-100 pb-4">
                <h1 class="text-2xl text-center font-extrabold text-slate-800 leading-tight">
                    <?php the_title(); ?>
                </h1>
            </header>

            <div class="entry-content prose max-w-none text-lg text-slate-700 min-h-screen">
                <?php the_content(); ?>
            </div>
            
        </article><?php         
        endwhile; 
        ?>

    </main>
</div>

<?php get_footer(); ?>