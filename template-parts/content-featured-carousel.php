<?php
/**
 * Template part para exibir o Carrossel de Posts em Destaque.
 *
 * @package VibeAntenada
 */

$featured_posts = array(
    array('title' => 'Dicas de Inovação em Sala de Aula', 'date' => '05/Set', 'image' => 'https://professoraantenada.com.br/wp-content/uploads/reels/20250831150130598Z-1756652490598_3.jpg'),
    array('title' => 'Guia Completo de Ensino Híbrido', 'date' => '28/Ago', 'image' => 'https://professoraantenada.com.br/wp-content/uploads/reels/20250831150130598Z-1756652490598_3.jpg'),
    array('title' => 'Como Usar IA na Educação', 'date' => '20/Ago', 'image' => 'https://professoraantenada.com.br/wp-content/uploads/reels/20250831150130598Z-1756652490598_3.jpg'),
    array('title' => 'O Poder da Gamificação', 'date' => '10/Ago', 'image' => 'https://professoraantenada.com.br/wp-content/uploads/reels/20250831150130598Z-1756652490598_3.jpg'),
    array('title' => 'Planejamento Semanal Eficaz', 'date' => '01/Ago', 'image' => 'https://professoraantenada.com.br/wp-content/uploads/reels/20250831150130598Z-1756652490598_3.jpg'),
);
$underline_color = 'border-purple-500'; 
?>

<section id="featured-carousel-section" class="container mx-auto px-4 py-12">
    <div class="flex items-center">
        <div class="icon icon-flower2"></div>
        <h2 class="font-titulo font-bold px-2 py-2 text-2xl">Novidades e Destaques</h2>
    </div>
    <div class="text-left mb-10 relative">
        <span class="absolute left-32 bottom-0 transform -translate-x-1/2 translate-y-2 h-2 w-64 
                    bg-transparent border-b-4 <?php echo $underline_color; ?> rounded-full z-0 ">
        </span>
    </div>
    
    <div class="swiper" id="main-swiper">
        
        <div class="swiper-wrapper">
        
            <?php foreach ($featured_posts as $post) : ?>
                
                <div class="swiper-slide px-4">
                    
                    <div class="bg-white border border-slate-100 rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
                        
                        <div class="aspect-video md:aspect-auto overflow-hidden h-80 mx-auto"> 
                            <img src="<?php echo esc_url($post['image']); ?>" 
                                 alt="<?php echo esc_attr($post['title']); ?>"
                                 class="w-full h-80 object-contain py-2" />
                        </div>
                        
                        <div class="p-6 md:p-10 flex flex-col justify-center h-full mx-auto">
                            <h3 class="text-xl font-extrabold text-slate-800 mb-4 font-titulo">
                                <?php echo esc_html($post['title']); ?>
                            </h3>
                            <p class="text-sm font-semibold text-gray-500 mb-2"><?php echo esc_html($post['date']); ?></p>
                            <a href="#" 
                               class="text-purple-600 font-bold hover:text-indigo-800 transition-colors">
                               Ler Mais &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                
            <?php endforeach; ?>

        </div>
        
    </div>

    <div class="flex justify-center space-x-4 mt-4">            
        <button id="carousel-prev" 
                class="px-4 py-2 rounded-full shadow-sm
                    text-gray-600 
                    hover:bg-slate-100 hover:border-slate-300
                    transition-colors duration-200 border border-gray-100"
                aria-label="Anterior">
            <i class="fas fa-arrow-left text-lg"></i>
        </button>
        
        <button id="carousel-next" 
                class="px-4 py-2 rounded-full shadow-sm
                    text-gray-600 
                    hover:bg-slate-100 hover:border-slate-300
                    transition-colors duration-200 border border-gray-100"
                aria-label="Próximo">
            <i class="fas fa-arrow-right text-lg"></i>
        </button>
    </div>

</section>
        
        