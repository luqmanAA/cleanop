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
        <!-- <div class="client-text-box"> -->
            <?php
                $google_review_shortcode = get_theme_mod('global_google_review_shortcode');
                if ($google_review_shortcode) {
                    echo do_shortcode($google_review_shortcode);
                } else {
                    echo '<p>' . esc_html__('No Google Reviews available.', 'mytheme') . '</p>';
                }
            ?>
        <!-- </div> -->
    </div>
</div>