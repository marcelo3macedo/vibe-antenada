<?php
/**
 * Template part para exibir o feed do Instagram.
 *
 * @package VibeAntenada
 */

$instagram_url = 'https://instagram.com/professoraantenada';
$instagram_handle = '@professoraantenada';

$posts = array(
    'https://professoraantenada.com.br/wp-content/uploads/reels/20250831150130598Z-1756652490598_3.jpg',
    'https://professoraantenada.com.br/wp-content/uploads/reels/20250519150336229Z-1747667016229_4.jpg',
    'https://professoraantenada.com.br/wp-content/uploads/reels/20250519150047587Z-1747666847587_3.jpg',
    'https://professoraantenada.com.br/wp-content/uploads/reels/20250512170051801Z-1747069251801_4.jpg',
    'https://professoraantenada.com.br/wp-content/uploads/reels/20250512163640785Z-1747067800785_1.jpg',
);
?>

<section id="instagram-feed" class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-3 grid-rows-2 gap-1">
        
        <?php 
        for ($i = 0; $i < 3; $i++) : ?>
            <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" class="aspect-square overflow-hidden group">
                <img src="<?php echo esc_url($posts[$i]); ?>" 
                     alt="Último post do Instagram <?php echo $i + 1; ?>" 
                     class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105" />
            </a>
        <?php endfor; ?>

        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" class="aspect-square overflow-hidden group">
            <img src="<?php echo esc_url($posts[3]); ?>" 
                 alt="Último post do Instagram 4" 
                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105" />
        </a>

        <div class="flex items-center justify-center">
            <a href="<?php echo esc_url($instagram_url); ?>" target="_blank"
                class="inline-flex items-center px-4 py-2 text-white rounded-full text-md font-semibold shadow-xl                        
                       bg-gradient-to-r from-purple-500 to-purple-700
                       hover:from-purple-600 hover:to-purple-800                        
                       transition-all duration-300 leading-tight transform hover:scale-105 text-center">
                <?php echo $instagram_handle; ?> no Instagram
            </a>
        </div>

        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank" class="aspect-square overflow-hidden group">
            <img src="<?php echo esc_url($posts[4]); ?>" 
                 alt="Último post do Instagram 5" 
                 class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105" />
        </a>
        
    </div>
</section>