<?php
/**
 * Template part para exibir um único Post em Destaque.
 *
 * @package VibeAntenada
 */

$featured_post = array(
    'id' => 100,
    'title' => 'Será que você é um fera na matemática? Descubra já com o jogo Soma dos Dedinhos',
    'permalink' => '/jogo-dos-dedinhos/',
    'date' => 'Outubro/2025',
    'category' => 'Jogos',
    'category_slug' => 'jogos',
    'image' => '/wp-content/uploads/theme/banner-jogo-dedinhos.jpg'
);

$text_color = 'text-white';
$category_bg = 'bg-purple-500';
$category_text = 'text-white';
?>

<section id="featured-post-full" class="container mx-auto px-2 py-4 md:px-4 md:py-12">
    
    <article class="relative w-full h-96 md:h-[500px] overflow-hidden rounded-xl shadow-2xl bg-black">
        
        <div class="absolute inset-0 bg-cover bg-center opacity-60"
            style="background-image: url('<?php echo esc_url($featured_post['image']); ?>');">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative z-10 p-3 md:p-12 h-full flex flex-col justify-end">
            
            <div>
                <a href="<?php echo esc_url( home_url( '/categoria/' . $featured_post['category_slug'] ) ); ?>"
                class="inline-block px-3 py-1 mb-3 text-sm font-semibold w-auto rounded-full 
                        <?php echo $category_bg; ?> <?php echo $category_text; ?> 
                        hover:bg-purple-600 transition-colors duration-200">
                    <?php echo esc_html($featured_post['category']); ?>
                </a>
            </div>
            
            <h2 class="text-2xl md:text-2xl font-extrabold mb-2 leading-tight font-titulo">
                <a href="<?php echo esc_url($featured_post['permalink']); ?>" 
                   class="<?php echo $text_color; ?>">
                    <?php echo esc_html($featured_post['title']); ?>
                </a>
            </h2>
            
            <p class="text-lg font-bold text-gray-100">
                <?php echo esc_html($featured_post['date']); ?>
            </p>
            
        </div>
        
    </article>
</section>