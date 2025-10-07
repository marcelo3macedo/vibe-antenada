<?php
/**
 * Template part para a seção de Posts Dinâmicos (Populares vs. Recentes).
 * A lógica de alternância é gerenciada por JavaScript.
 *
 * @package VibeAntenada
 */

$recent_posts = array(
    array('id' => 10, 'title' => 'Atividade de completar as letras faltantes', 'date' => 'Outubro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/6_letras_faltantes.jpg', 'slug' => '/principais/alfabetizacao/3767/completando-imagens-com-letras-2/'),
    array('id' => 9, 'title' => 'Pintura: Tema animais e profissões', 'date' => 'Setembro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/7_pintura_animais_e_profissoes.jpg', 'slug' => '/principais/alfabetizacao/3717/atividades-de-completar-letras-conheca-as-figuras-e-profissoes/'),
    array('id' => 8, 'title' => 'Imagens: Escreva a palavra referente a imagem', 'date' => 'Setembro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/8_imagens_palavra_referente.jpg', 'slug' => '/principais/alfabetizacao/3582/completando-a-primeira-letra-atividades-de-compreensao-visual/'),
    array('id' => 7, 'title' => 'Primeira Letra: Identifique a primeira letra das imagens', 'date' => 'Setembro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/9_primeira_letra_das_imagens.jpg', 'slug' => '/principais/alfabetizacao/3592/completando-a-primeira-letra-atividades-criativas/'),
    array('id' => 6, 'title' => 'Atividade: Identifique as imagens e complete a palavra', 'date' => 'Setembro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/10_complete_a_palavra.jpg', 'slug' => '/principais/alfabetizacao/3612/completando-a-primeira-letra-atividades-de-identificacao-para-professores-e-pais/'),
);

$popular_posts = array(
    array('id' => 5, 'title' => 'Figurinhas disponíveis para Download', 'date' => 'Março/2025', 'image' => '/wp-content/uploads/theme/em_destaque/1_figurinhas_para_download.jpg', 'slug' => '/figurinhas'),
    array('id' => 4, 'title' => 'Vídeo: Coelho Pipoca e o Gatinho Nino', 'date' => 'Fevereiro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/2_video_coelho_pipoca.jpg', 'slug' => 'https://youtu.be/rMw9DcVRAyY'),
    array('id' => 3, 'title' => 'Vídeo: Os amigos Léo e Luna brincando na floresta', 'date' => 'Janeiro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/3_video_leo_e_luna.jpg', 'slug' => 'https://youtu.be/BMzLAvRPj8U'),
    array('id' => 2, 'title' => 'Reels: Coleção de atividades para Download', 'date' => 'Janeiro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/4_colecao_de_atividades.jpg', 'slug' => '/reels'),
    array('id' => 1, 'title' => 'Jogo de Memória - Quantos pontos você conseguirá fazer?', 'date' => 'Janeiro/2025', 'image' => '/wp-content/uploads/theme/em_destaque/5_jogo_da_memoria.jpg', 'slug' => '/jogo-da-memoria'),
);

$active_button_classes = 'bg-purple-700 text-white border-purple-600';
$inactive_button_classes = 'bg-white text-slate-700 border-gray-200 hover:bg-slate-50';
$underline_color = 'border-pink-500';
?>

<section id="dynamic-posts" class="container mx-auto px-4 py-12">
    <div class="border border-slate-200 rounded-lg p-4 bg-white">    
            
        <div class="flex items-center">
            <div class="icon icon-flower1"></div>
            <h2 class="font-titulo font-bold px-2 py-2 text-2xl">Destaques do Blog</h2>
        </div>
        <div class="text-left mb-5 relative">
            <span class="absolute left-32 bottom-0 transform -translate-x-1/2 translate-y-2 h-2 w-64 
                        bg-transparent border-b-4 <?php echo $underline_color; ?> rounded-full z-0 ">
            </span>
        </div>
        

        <div class="flex space-x-2 mb-6">
            <button id="tab-popular" data-target="content-popular" 
                    class="px-4 py-2 text-sm font-semibold rounded-lg border transition-colors duration-200 
                        <?php echo $active_button_classes; ?>">
                Populares
            </button>
            <button id="tab-recent" data-target="content-recent" 
                    class="px-4 py-2 text-sm font-semibold rounded-lg border transition-colors duration-200 
                        <?php echo $inactive_button_classes; ?>">
                Recentes
            </button>
        </div>

        <div id="content-container">
            
            <ul id="content-popular" data-content="tab" class="space-y-2">
                <?php foreach ($popular_posts as $post) : ?>
                    <li class="flex items-start pb-2 border-b border-gray-100 last:border-b-0">
                        <a href="<?php echo esc_attr($post['slug']); ?>" class="flex-shrink-0 mr-4 block w-24 h-[85px] overflow-hidden rounded-md">
                            <img src="<?php echo esc_url($post['image']); ?>" alt="<?php echo esc_attr($post['title']); ?>" 
                                class="w-full h-full object-cover" />
                        </a>
                        <div>
                            <a href="<?php echo esc_attr($post['slug']); ?>" class="font-bold text-slate-700 hover:text-indigo-600 transition-colors">
                                <?php echo esc_html($post['title']); ?>
                            </a>
                            <p class="text-xs text-slate-500 mt-1"><?php echo esc_html($post['date']); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <ul id="content-recent" data-content="tab" class="space-y-2 hidden">
                <?php foreach ($recent_posts as $post) : ?>
                    <li class="flex items-start pb-2 border-b border-gray-100 last:border-b-0">
                        <a href="<?php echo esc_attr($post['slug']); ?>" class="flex-shrink-0 mr-4 block w-24 h-[85px] overflow-hidden rounded-md">
                            <img src="<?php echo esc_url($post['image']); ?>" alt="<?php echo esc_attr($post['title']); ?>" 
                                class="w-full h-full object-cover" />
                        </a>
                        <div>
                            <a href="<?php echo esc_attr($post['slug']); ?>" class="font-bold text-slate-700 hover:text-indigo-600 transition-colors">
                                <?php echo esc_html($post['title']); ?>
                            </a>
                            <p class="text-xs text-slate-500 mt-1"><?php echo esc_html($post['date']); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>