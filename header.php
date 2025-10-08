<?php
/**
 * Arquivo Header.php
 * Inclui SEO Básico para Post, Categoria e Página Principal.
 *
 * @package VibeAntenada
 */

$site_url = esc_url( home_url( '/' ) );
$logo_url = 'https://professoraantenada.com.br/wp-content/uploads/2025/01/cropped-Logo-150x150.png';
$default_image = 'https://professoraantenada.com.br/wp-content/uploads/2025/01/default-image.jpg'; // Adicione uma imagem padrão real
$default_description = 'Professora antenada: Sempre antenada sobre Educação, recursos grátis e inovação pedagógica!'; // Sua descrição padrão
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <?php
    $seo_title = get_bloginfo('name');
    $seo_description = get_bloginfo('description');
    $seo_url = $site_url;
    $seo_image = $default_image;
    $og_type = 'website';
    $article_published = '';
    $article_modified = '';

    if ( is_single() || is_page() ) {
        global $post;
        
        $seo_title = get_the_title() . ' - ' . get_bloginfo('name');
        
        if ( ! empty( $post->post_excerpt ) ) {
            $seo_description = esc_html( wp_trim_words( $post->post_excerpt, 30 ) );
        } else {
            $seo_description = esc_html( wp_trim_words( strip_tags( $post->post_content ), 30 ) );
        }
        
        $seo_url = get_permalink();
        $og_type = 'article';
        
        if ( has_post_thumbnail() ) {
            $seo_image = get_the_post_thumbnail_url( $post->ID, 'large' );
        }
        
        $article_published = get_the_time( 'c' );
        $article_modified = get_the_modified_time( 'c' );

    } elseif ( is_category() ) {
        $current_category = get_queried_object();
        
        $seo_title = 'Posts na Categoria: ' . $current_category->name . ' - ' . get_bloginfo('name');
        $seo_description = ! empty( $current_category->description ) ? esc_html( $current_category->description ) : $default_description;
        $seo_url = get_term_link( $current_category );
        $og_type = 'website';

    } elseif ( is_front_page() && is_home() ) {
        $seo_title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
        $seo_description = $default_description;
        $seo_url = $site_url;
        $og_type = 'website';
    }
    
    if ( $seo_description === get_bloginfo('description') ) {
        $seo_description = $default_description;
    }
    ?>
    <title><?php echo esc_html( $seo_title ); ?></title>

    <link rel="canonical" href="<?php echo esc_url( $seo_url ); ?>">

    <meta name="description" content="<?php echo esc_attr( $seo_description ); ?>">

    <meta property="og:locale" content="<?php bloginfo( 'language' ); ?>">
    <meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( $seo_title ); ?>">
    <meta property="og:description" content="<?php echo esc_attr( $seo_description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $seo_url ); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:image" content="<?php echo esc_url( $seo_image ); ?>">
    <?php if ( $og_type === 'article' ) : ?>
    <meta property="article:published_time" content="<?php echo esc_attr( $article_published ); ?>">
    <meta property="article:modified_time" content="<?php echo esc_attr( $article_modified ); ?>">
    <meta name="author" content="<?php echo esc_attr( get_the_author_meta( 'display_name', $post->post_author ) ); ?>">
    <?php endif; ?>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr( $seo_title ); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr( $seo_description ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $seo_image ); ?>">


    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?ver=6.7.4" data-ad-client="ca-pub-9829912735551664" crossorigin="anonymous"></script>    
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>

</head>
<body <?php body_class( 'bg-gray-100 font-sans antialiased text-gray-800 bg-cyan-300' ); ?>>

    <header class="border-b border-slate-100 bg-white sticky top-0 z-50">
        <div class="container mx-auto px-5 py-4 flex justify-between items-center">
            
            <h1 class="text-3xl font-bold text-indigo-600">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url($logo_url); ?>" 
                        alt="Logo Professora Antenada" 
                        class="h-20 w-auto mx-auto object-contain" />
                </a>
            </h1>

            <div class="flex items-center space-x-4">
                
                <button id="search-toggle" class="py-2 px-4 border bg-purple-500 rounded-full text-purple-600 hover:bg-purple-900 transition-colors duration-300"
                        aria-label="Abrir Pesquisa">
                    <i class="fas fa-search text-lg text-white"></i>
                </button>

                <button id="menu-toggle" class="py-2 px-4 text-slate-700 hover:bg-purple-900 bg-purple-500 rounded-full transition-colors duration-300"
                        aria-label="Abrir Menu">
                    <i class="fas fa-bars text-xl text-white"></i>
                </button>
            </div>
        </div>
    </header>

    <div id="search-overlay" class="fixed top-0 left-0 w-full h-full bg-white z-50 opacity-0 invisible pointer-events-none transition-opacity duration-300">
        <div class="container mx-auto p-12 md:p-20">
            
            <button id="search-close" class="absolute top-6 right-6 text-slate-500 hover:text-slate-800 transition-colors duration-300"
                    aria-label="Fechar Pesquisa">
                <i class="fas fa-times text-3xl"></i>
            </button>

            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="max-w-xl mx-auto mt-20">
                <div class="flex border-b-2 border-purple-500 pb-2">
                    <input type="search" name="s" placeholder="Digite o que deseja pesquisar..." required
                           class="w-full text-xl outline-none border-none placeholder-slate-400 focus:ring-0">
                    
                    <button type="submit" class="ml-4 px-6 py-2 bg-purple-500 text-white rounded-full hover:bg-purple-600 transition-colors duration-300">
                        Pesquisar
                    </button>
                </div>
            </form>

        </div>
    </div>


    <div id="menu-overlay" class="fixed top-0 left-0 w-full h-full bg-black/50 z-50 opacity-0 invisible pointer-events-none transition-opacity duration-300">

        <div id="menu-sidebar" class="w-80 h-full bg-white absolute right-0 shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">

            <button id="menu-close" class="absolute top-6 right-6 text-slate-700 hover:text-indigo-600 z-10"
                    aria-label="Fechar Menu">
                <i class="fas fa-times text-2xl"></i>
            </button>

            <div class="p-8 flex-grow flex flex-col justify-center items-center text-center">

                <div class="mb-8">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/01/cropped-Logo-150x150.png' ) ); ?>"
                        alt="Logo do Blog"
                        class="max-w-[80px] h-auto rounded-full shadow-lg mx-auto"
                    >
                </div>

                <nav class="w-full mb-8">
                    <ul class="space-y-3 text-lg font-medium">
                        <li>
                            <a href="<?php echo esc_url( home_url( '/sobre-o-blog/' ) ); ?>"
                            class="block py-2 text-slate-700 hover:text-white hover:bg-indigo-600 rounded-lg transition-all duration-200">
                            Sobre o Blog
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/politicas-privacidade/' ) ); ?>"
                            class="block py-2 text-slate-700 hover:text-white hover:bg-indigo-600 rounded-lg transition-all duration-200">
                            Políticas de Privacidade
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/figurinhas/' ) ); ?>"
                            class="block py-2 text-slate-700 hover:text-white hover:bg-indigo-600 rounded-lg transition-all duration-200">
                            Figurinhas
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/jogo-da-memoria/' ) ); ?>"
                            class="block py-2 text-slate-700 hover:text-white hover:bg-indigo-600 rounded-lg transition-all duration-200">
                            Jogo da Memória
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/jogo-dos-dedinhos/' ) ); ?>"
                            class="block py-2 text-slate-700 hover:text-white hover:bg-indigo-600 rounded-lg transition-all duration-200">
                            Jogo dos Dedinhos
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="mt-auto pt-4 border-t border-slate-200 w-full">
                    <p class="text-sm text-slate-600 italic">
                        Obrigado por acessar o nosso blog! Sua presença é muito importante para nós.
                    </p>
                </div>

            </div>
        </div>
    </div>
    
    <div id="content" class="site-content min-h-screen">