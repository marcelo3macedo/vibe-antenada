<?php
/**
 * O template para exibir a página de resultados da busca.
 *
 * Exibe os posts que correspondem ao termo de busca do usuário.
 *
 * @package VibeAntenada
 */

get_header();

// Obtém o termo de busca atual
$search_query = get_search_query();

$text_color      = 'text-slate-700';
$excerpt_color   = 'text-slate-500';
$date_color      = 'text-purple-500';
$underline_color = 'border-purple-500';
$icon_color      = 'text-red-500';
?>

<div id="primary" class="content-area container mx-auto px-4 py-12">
    <main id="main" class="site-main">

        <header class="page-header text-center mb-10">
            <h1 class="page-title font-titulo font-extrabold text-4xl mb-3 <?php echo $text_color; ?>">
                <span class="<?php echo $icon_color; ?> mr-2">🔍</span>
                Resultados da Busca
            </h1>
            
            <p class="taxonomy-description text-lg max-w-3xl mx-auto <?php echo $excerpt_color; ?> font-semibold">
                Você buscou por: **"<?php echo esc_html( $search_query ); ?>"**
            </p>

            <div class="relative mt-4">
                <span class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-2 h-2 w-48 
                              bg-transparent border-b-4 <?php echo $underline_color; ?> rounded-full z-0">
                </span>
            </div>
        </header>

        <?php 
        // 1. O Loop do WordPress verifica se há posts para o termo de busca
        if ( have_posts() ) : 
        ?>
            <div class="grid grid-cols-2 gap-4">
                
                <?php 
                // 2. Itera sobre os posts encontrados
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
                        '<span class="text-purple-600 font-bold hover:text-purple-800 transition-colors">&larr; Resultados Anteriores</span>'
                    );

                    next_posts_link( 
                        '<span class="text-purple-600 font-bold hover:text-purple-800 transition-colors">Próximos Resultados &rarr;</span>'
                    );
                    ?>
                </div>
            </div>
        
        <?php else : ?>
            
            <div class="text-center py-10 bg-gray-50 border border-gray-100 rounded-lg max-w-lg mx-auto">
                <p class="text-2xl font-titulo font-bold text-gray-700 mb-4">
                    Nenhum post encontrado! 😥
                </p>
                <p class="text-lg text-gray-500 mb-6">
                    Tente buscar por outras palavras-chave ou confira nossas tags em destaque.
                </p>
                <?php get_search_form(); ?>
            </div>

        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>