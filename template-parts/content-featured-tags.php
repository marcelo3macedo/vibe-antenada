<?php
/**
 * Template part para exibir as Tags em Destaque.
 *
 * @package VibeAntenada
 */

 $args = array(
    'orderby'    => 'count',
    'order'      => 'DESC',
    'number'     => 10,
    'hide_empty' => true
);

$featured_tags = get_tags( $args );

$underline_color = 'border-purple-500'; 
?>
<section id="featured-tags" class="container mx-auto px-4 py-12">
    <div class="border border-slate-200 rounded-lg py-8 px-4 bg-white">    
        <div class="flex items-center">
            <div class="icon icon-duck1"></div>
            <h2 class="font-titulo font-bold px-2 py-2 text-2xl">Tags em Destaque</h2>
        </div>
        <div class="text-left mb-10 relative">
            <span class="absolute left-32 bottom-0 transform -translate-x-1/2 translate-y-2 h-2 w-64 
                        bg-transparent border-b-4 <?php echo $underline_color; ?> rounded-full z-0 ">
            </span>
        </div>

        <div class=" rounded-lg p-6 shadow-sm">
            <div class="flex flex-wrap justify-center gap-3">
                
                <?php 
                if ( ! empty( $featured_tags ) && ! is_wp_error( $featured_tags ) ) :                    
                    foreach ( $featured_tags as $tag ) : 
                        $tag_link = get_term_link( $tag->term_id, $tag->taxonomy );
                ?>
                    <a href="<?php echo esc_url( $tag_link ); ?>"
                    class="inline-block px-4 py-2 text-sm font-medium rounded-full border border-slate-100 text-slate-400
                            bg-slate-100 hover:bg-purple-100 hover:text-purple-600 
                            transition-colors duration-200">
                        #<?php echo esc_html( $tag->name ); ?>
                    </a>
                <?php 
                    endforeach; 
                endif; 
                ?>

            </div>
        </div>
    </div>
</section>