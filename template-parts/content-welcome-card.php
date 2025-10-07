<?php
/**
 * Template part para exibir o Card de Boas-Vindas e Redes Sociais.
 *
 * @package VibeAntenada
 */

$logo_url = 'https://professoraantenada.com.br/wp-content/uploads/2025/01/cropped-Logo-150x150.png';
$message = 'Professora Antenada, sempre conectada com o futuro da educação! Aqui você encontra atividades inovadoras, jogos pedagógicos e as melhores ferramentas digitais para transformar sua sala de aula.';

$social_links = array(
    'facebook' => 'https://www.facebook.com/profantenada',
    'instagram' => 'https://instagram.com/professoraantenada',
    'youtube' => 'https://www.youtube.com/@BlogProfessoraAntenada',
);

$border_color = 'border-gray-100'; 
$text_color = 'text-slate-700';
?>

<section id="welcome-card" class="container mx-auto px-4 py-12">
    <div class="border <?php echo $border_color; ?> rounded-lg p-6 bg-white shadow-sm text-center">
    
        <div class="mb-4">
            <img src="<?php echo esc_url($logo_url); ?>" 
                alt="Logo Professora Antenada" 
                class="h-20 w-auto mx-auto object-contain" />
        </div>

        <h3 class="text-lg font-bold <?php echo $text_color; ?> mb-2 font-titulo">
            Professora Antenada
        </h3>
        <p class="text-sm text-slate-600 mb-6 italic">
            <?php echo esc_html($message); ?>
        </p>

        <hr class="border-t <?php echo $border_color; ?> mb-6">
        
        <div class="flex justify-center space-x-6">
            
            <?php if (!empty($social_links['facebook'])) : ?>
                <a href="<?php echo esc_url($social_links['facebook']); ?>" target="_blank"
                class="text-slate-400 hover:text-indigo-600 transition-colors duration-300"
                aria-label="Facebook">
                    <i class="fab fa-facebook-f text-2xl"></i>
                </a>
            <?php endif; ?>

            <?php if (!empty($social_links['instagram'])) : ?>
                <a href="<?php echo esc_url($social_links['instagram']); ?>" target="_blank"
                class="text-slate-400 hover:text-indigo-600 transition-colors duration-300"
                aria-label="Instagram">
                    <i class="fab fa-instagram text-2xl"></i>
                </a>
            <?php endif; ?>
            
            <?php if (!empty($social_links['youtube'])) : ?>
                <a href="<?php echo esc_url($social_links['youtube']); ?>" target="_blank"
                class="text-slate-400 hover:text-indigo-600 transition-colors duration-300"
                aria-label="YouTube">
                    <i class="fab fa-youtube text-2xl"></i>
                </a>
            <?php endif; ?>

        </div>
    </div>
</section>