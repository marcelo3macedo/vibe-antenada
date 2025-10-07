<?php get_header(); ?>

<div id="primary" class="content-area container mx-auto px-4 py-12">
    
    <div class="flex flex-wrap lg:flex-nowrap gap-10">
        
        <main id="main" class="site-main w-full lg:w-3/4">

            <?php
            // O Loop do WordPress para o post individual
            while ( have_posts() ) : the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white p-6 md:p-10 rounded-xl shadow-lg' ); ?>>
                
                <header class="entry-header mb-8 border-b border-gray-100 pb-4">
                    <h1 class="text-4xl font-extrabold text-slate-800 mb-3 leading-tight">
                        <?php the_title(); ?>
                    </h1>
                    <div class="text-sm text-slate-500 flex items-center space-x-4">
                        <span>
                            <i class="fas fa-tag mr-1"></i> <?php the_category(', '); ?>
                        </span>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-8 rounded-lg overflow-hidden shadow-md">
                        <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover' ) ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content prose max-w-none text-lg text-slate-700">
                    <?php the_content(); ?>
                </div>
                
                <?php if ( has_tag() ) : ?>
                    <div class="mt-8 pt-4 border-t border-gray-100 text-sm">
                        <?php the_tags('<span class="font-bold text-slate-700 mr-2">Tags:</span>', '', ''); ?>
                    </div>
                <?php endif; ?>
                
            </article><div class="mt-10">
                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>

            <?php endwhile; // Fim do Loop
            ?>

        </main><aside id="secondary" class="widget-area w-full lg:w-1/4 space-y-8">
            
            <?php get_template_part( 'template-parts/content', 'welcome-card' ); ?>

            <?php get_template_part( 'template-parts/content', 'featured-topics' ); ?>
            
            <?php echo do_shortcode('[newsletter]'); ?>
            
            </aside></div>
</div>

<?php get_footer(); ?>