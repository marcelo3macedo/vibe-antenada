<?php
/**
 * O template para exibir o arquivo de tags.
 *
 * Exibe a lista de posts de uma tag específica.
 *
 * @package VibeAntenada
 */

get_header();

// A função get_queried_object() retorna o objeto de termo (tag) atual
$current_tag = get_queried_object();

$text_color      = 'text-slate-700';
$excerpt_color   = 'text-slate-500';
$date_color      = 'text-purple-500';
$underline_color = 'border-purple-500';
// Ícone alterado para diferenciar visualmente da categoria
$icon_color      = 'text-sky-500'; 
?>

<div id="primary" class="content-area container mx-auto px-4 py-12">
    <main id="main" class="site-main">

        <header class="page-header text-center mb-10">
            <h1 class="page-title font-titulo font-extrabold text-4xl mb-3 <?php echo $text_color; ?>">
                <span class="<?php echo $icon_color; ?> mr-2">🏷️</span>
                #<?php echo esc_html( $current_tag->name ); ?>
            </h1>
            
            <?php 
            // Tags também podem ter descrição, embora seja menos comum
            if ( ! empty( $current_tag->description ) ) : ?>
                <div class="taxonomy-description text-lg max-w-3xl mx-auto <?php echo $excerpt_color; ?>">
                    <?php echo wp_kses_post( $current_tag->description ); ?>
                </div>
            <?php endif; ?>

            <div class="relative mt-4">
                <span class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-2 h-2 w-48 
                              bg-transparent border-b-4 <?php echo $underline_color; ?> rounded-full z-0">
                </span>
            </div>
        </header>

        <?php 
        // O Loop do WordPress busca automaticamente os posts da tag atual
        if ( have_posts() ) : 
        ?>
            <div class="grid grid-cols-2 gap-4">
                
                <?php 
                while ( have_posts() ) : the_post();
                    
                    $post_id    = get_the_ID();
                    $permalink  = get_the_permalink();
                    $title      = get_the_title();
                    $excerpt    = get_the_excerpt();
                    $post_date  = get_the_date( 'd/M' );
                    
                    $image_url  = get_the_post_thumbnail_url( $post_id, 'medium' );
                    if ( ! $image_url ) {
                        $image_url = get_template_directory_uri() . '/assets/images/placeholder.jpg'; 
                    }
                ?>

                    <article id="post-<?php echo $post_id; ?>" <?php post_class('bg-white border border-gray-100 rounded-xl shadow-lg overflow-hidden transition duration-300 hover:shadow-xl'); ?>>
                        
                        <a href="<?php echo esc_url($permalink); ?>" class="block overflow-hidden">
                            <img src="<?php echo esc_url($image_url); ?>" 
                                 alt="<?php echo esc_attr($title); ?>"
                                 class="w-full h-96 object-cover transform hover:scale-105 transition duration-500" />
                        </a>
                        
                        <div class="p-5">
                            
                            <p class="text-xs font-semibold <?php echo $date_color; ?> uppercase mb-2">
                                <?php echo esc_html($post_date); ?>
                            </p>
                            
                            <h3 class="text-xl font-extrabold <?php echo $text_color; ?> mb-3 transition-colors font-titulo">
                                <a href="<?php echo esc_url($permalink); ?>">
                                    <?php echo esc_html($title); ?>
                                </a>
                            </h3>
                            
                            <div class="text-sm <?php echo $excerpt_color; ?> mb-4">
                                <?php echo esc_html( wp_trim_words( $excerpt, 25, '...' ) ); ?>
                            </div>
                            
                            <a href="<?php echo esc_url($permalink); ?>" 
                               class="text-purple-600 font-bold text-sm hover:text-purple-800 transition-colors">
                               Leia Mais &rarr;
                            </a>
                        </div>
                    </article>

                <?php endwhile; ?>

            </div>
            
            <div class="mt-12 text-center">
                <div class="flex justify-between items-center px-4 md:px-0">
                    <?php 
                    previous_posts_link( 
                        '<span class="text-purple-600 font-bold hover:text-purple-800 transition-colors">&larr; Posts Anteriores</span>'
                    );

                    next_posts_link( 
                        '<span class="text-purple-600 font-bold hover:text-purple-800 transition-colors">Próximos Posts &rarr;</span>'
                    );
                    ?>
                </div>
            </div>
            <?php else : ?>
            
            <p class="text-center text-xl text-gray-500 py-10">
                Ainda não há posts publicados com esta tag.
            </p>

        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>