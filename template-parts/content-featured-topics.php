<?php

$args = array(
    'taxonomy'   => 'category',
    'orderby'    => 'count',
    'order'      => 'DESC',
    'hide_empty' => true,
    'number'     => 10,
);

$featured_topics = get_categories( $args );

if ( ! empty( $featured_topics ) ) {
    usort($featured_topics, function($a, $b) {
        return strcasecmp($a->name, $b->name);
    });
}


$border_color = 'border-gray-100'; 
$text_color = 'text-slate-700';
$icon_color = 'text-purple-500';
$underline_color = 'border-yellow-500';
?>

<section id="featured-topics" class="container mx-auto px-4 py-12">
    
    <div class="border <?php echo $border_color; ?> rounded-lg p-6 bg-white shadow-sm">
    
        <div class="flex items-center">
            <div class="icon icon-bee1"></div>
            <h2 class="font-titulo font-bold px-2 py-2 text-2xl">Tópicos em Destaque</h2>
        </div>
        <div class="text-left mb-10 relative">
            <span class="absolute left-32 bottom-0 transform -translate-x-1/2 translate-y-2 h-2 w-64 
                        bg-transparent border-b-4 <?php echo $underline_color; ?> rounded-full z-0 ">
            </span>
        </div>

        <?php if ( ! empty( $featured_topics ) && ! is_wp_error( $featured_topics ) ) : ?>
        
            <ul>
                <?php 
                $count = 0;
                $total = count($featured_topics);
                
                foreach ($featured_topics as $topic) : 
                    $count++;
                    
                    $topic_link = esc_url( get_category_link( $topic->term_id ) );
                    $topic_name = esc_html( $topic->name );
                    $post_count = intval( $topic->count );
                ?>
                    <li class="py-2">
                        <a href="<?php echo $topic_link; ?>" 
                        class="flex items-center group hover:text-indigo-600 transition-colors duration-200">
                            
                            <span class="mr-2 <?php echo $icon_color; ?> font-bold group-hover:text-indigo-600 transition-colors">
                                &gt;
                            </span>
                            
                            <span class="font-bold <?php echo $text_color; ?> group-hover:text-indigo-600">
                                <?php echo $topic_name; ?>
                                <span class="text-sm font-normal text-gray-400 ml-1">(<?php echo $post_count; ?>)</span>
                            </span>
                        </a>
                    </li>
                    
                    <?php 
                    if ($count < $total) : ?>
                        <hr class="<?php echo $border_color; ?>">
                    <?php endif; ?>
                    
                <?php endforeach; ?>
            </ul>

        <?php else : ?>
            <p class="text-center text-gray-500">Nenhuma categoria encontrada.</p>
        <?php endif; ?>

    </div>    
</section>