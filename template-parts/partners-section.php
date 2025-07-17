<?php


?>

<?php 
    $remove_top_border = get_query_var('remove_top_border', false);
    if ($remove_top_border) {
        $top_border_class = 'style2';
    } else {
        $top_border_class = '';
    }
?>

<div class="client-content-wrapper <?php echo esc_attr($top_border_class); ?>">
    <div class="client-content">
        <div class="client-text-box">
            <div class="client-text">Partnering with top tiers to revolutionize cleaning services.</div>
        </div>
        <div class="marquee-wrapper">
            <?php for ($i = 0; $i < 3; $i++) : ?>
                <div class="marquee-block">
                    <?php
                    $partners = new WP_Query([
                        'post_type'      => 'partner',
                        'posts_per_page' => 10,
                    ]);
                    if ($partners->have_posts()) :
                        while ($partners->have_posts()) : $partners->the_post(); ?>
                        <div class="client-item">
                            <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" alt="Client Image" class="client-image"/>
                        </div>
                    <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p>No clients found.</p>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>