<?php
/**
 * Template part para exibir a lista de últimas postagens em uma grade.
 * **SIMULAÇÃO:** Usa um array fixo em vez do Loop do WordPress.
 *
 * @package VibeAntenada
 */

$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'ignore_sticky_posts' => true,
);
$latest_posts_query = new WP_Query( $args );

$blog_link = get_post_type_archive_link( 'post' );

$text_color = 'text-slate-700';
$date_color = 'text-purple-500';
$excerpt_color = 'text-slate-500';
$underline_color = 'border-purple-500';
?>

<section id="latest-posts" class="container mx-auto px-4 py-12">

    <div class="flex items-center">
        <div class="icon icon-morango1"></div>
        <h2 class="font-titulo font-bold px-2 py-2 text-2xl">Últimas Postagens</h2>
    </div>
    
    <div class="text-left mb-10 relative">
        <span class="absolute left-32 bottom-0 transform -translate-x-1/2 translate-y-2 h-2 w-64 
                    bg-transparent border-b-4 <?php echo $underline_color; ?> rounded-full z-0 ">
        </span>
    </div>
    
    <?php if ( $latest_posts_query->have_posts() ) : ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <?php 
            while ( $latest_posts_query->have_posts() ) : $latest_posts_query->the_post();
            
            $post_id    = get_the_ID();
            $post_title = get_the_title();
            $permalink  = get_the_permalink();
            
            $post_date  = get_the_date( 'd/M' ); 
            
            $excerpt    = get_the_excerpt();
            
            $image_url  = get_the_post_thumbnail_url( $post_id, 'large' );
            
            if ( ! $image_url ) {
                $image_url = 'https://professoraantenada.com.br/wp-content/uploads/reels/default-placeholder.jpg'; 
            }
            ?>
                
                <article id="post-<?php echo $post_id; ?>" class="bg-white border border-gray-100 rounded-xl shadow-lg overflow-hidden transition duration-300 hover:shadow-xl">
                    
                    <a href="<?php echo esc_url($permalink); ?>" class="block overflow-hidden">
                        <img src="<?php echo esc_url($image_url); ?>" 
                             alt="<?php echo esc_attr($post_title); ?>"
                             class="w-full h-80 object-cover transform hover:scale-105 transition duration-500" /> 
                    </a>
                    
                    <div class="p-6">
                        
                        <p class="text-xs font-semibold <?php echo $date_color; ?> uppercase mb-2">
                            <?php echo esc_html($post_date); ?>
                        </p>
                        
                        <h3 class="text-xl font-extrabold <?php echo $text_color; ?> mb-3 transition-colors font-titulo">
                            <a href="<?php echo esc_url($permalink); ?>">
                                <?php echo esc_html($post_title); ?>
                            </a>
                        </h3>
                        
                        <div class="text-sm <?php echo $excerpt_color; ?> mb-4">
                            <?php echo esc_html($excerpt); ?>
                        </div>
                        
                        <a href="<?php echo esc_url($permalink); ?>" 
                           class="text-purple-600 font-bold text-sm hover:text-purple-800 transition-colors">
                           Continue Lendo &rarr;
                        </a>
                    </div>
                </article>
                
            <?php
            endwhile;
            ?>
        </div>

    <?php 
    endif;
    
    wp_reset_postdata(); 
    ?>

    <div class="mt-12 text-center">
        <a href="/?s=" 
           class="inline-block px-8 py-3 text-sm text-gray-500 
                  rounded-full border border-gray-300
                  hover:text-indigo-700 hover:border-indigo-300  bg-white">
           Ver Mais Postagens
        </a>
    </div>

</section>