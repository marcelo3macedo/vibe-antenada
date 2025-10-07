    <?php get_header(); ?>

    <div class="desktop-only bg-gray-100">
        <div class="container mx-auto">
            <div class="grid grid-cols-2">
                <div class="flex flex-col">
                    <?php 
                        get_template_part( 'template-parts/content', 'featured-post' );                
                    ?>
                    <div class="icon icon-layer2"></div>
                    <?php
                        get_template_part( 'template-parts/content', 'latest-posts' );
                    ?> 
                </div>
                <div class="flex flex-col">            
                    <?php 
                        get_template_part( 'template-parts/content', 'dynamic-posts' );
                        get_template_part( 'template-parts/content', 'welcome-card' );
                        get_template_part( 'template-parts/content', 'featured-topics' ); 
                        echo do_shortcode('[newsletter]');
                        get_template_part( 'template-parts/content', 'featured-carousel' ); 
                        get_template_part( 'template-parts/content', 'featured-tags' ); 
                    ?> 
                </div>
            </div>
            <div>
                <?php 
                    get_template_part( 'template-parts/content', 'instagram-feed' ); 
                ?> 
            </div>
            <div class="icon icon-layer1 mx-auto"></div>
        </div>
    </div>

    <div class="mobile-only">
        <?php 
            get_template_part( 'template-parts/content', 'featured-post' );
        ?>
        <div class="icon icon-layer2"></div>
        <?php
            get_template_part( 'template-parts/content', 'dynamic-posts' );
            get_template_part( 'template-parts/content', 'latest-posts' ); 
            get_template_part( 'template-parts/content', 'welcome-card' ); 
            get_template_part( 'template-parts/content', 'featured-topics' ); 
            echo do_shortcode('[newsletter]');
            get_template_part( 'template-parts/content', 'featured-carousel' ); 
            get_template_part( 'template-parts/content', 'featured-tags' ); 
            get_template_part( 'template-parts/content', 'instagram-feed' ); 
        ?>
        <div class="icon icon-layer1"></div>
    </div>

    <?php get_footer(); ?>