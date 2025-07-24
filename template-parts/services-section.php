<?php
/**
 * Template part for displaying the Services Section
 */
?>

<section class="service-section">
    <div class="section-gradient-wrap">
        <div class="shadow-gradient style2"></div>
    </div>
    <div class="w-layout-blockcontainer container-fluid w-container">
        <div class="service-section-wrapper">
            <div class="service-section-content">
                <div class="service-item-box">
                    <div class="w-dyn-list">
                        <div role="list" class="w-dyn-items">
                            
                            <?php
                            $services = new WP_Query([
                                'post_type'      => 'service',
                                'posts_per_page' => 5,
                            ]);
                            if ($services->have_posts()) :
                                while ($services->have_posts()) : $services->the_post(); ?>
                                    <div role="listitem" class="w-dyn-item">
                                        <a href="<?php the_permalink(); ?>" class="service-link-block w-inline-block">
                                            <div class="service-left-wrap">
                                                <div class="service-icon-box">
                                                    <?php
                                                        $svg_icon_url = wp_get_attachment_url(get_post_meta(get_the_ID(), '_service_svg_icon_id', true));
                                                        if ($svg_icon_url) {
                                                            $alt_text = get_the_title();
                                                            echo '<img src="' . esc_url($svg_icon_url) . '" class="event-image" loading="lazy" alt="' . esc_attr($alt_text) . '" />';
                                                        }
                                                    ?>
                                                </div>
                                                <div class="service-content-box">
                                                    <h3 class="service-title"><?php the_title(); ?></h3>
                                                    <div class="service-desc"><?php the_excerpt(); ?></div>
                                                </div>
                                            </div>
                                            <div class="service-right-wrap">
                                                <div class="service-image-box">
                                                    <img src="<?php the_post_thumbnail_url(); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="service-image"/>
                                                </div>
                                            </div>
                                            <div class="service-content-wrap">
                                                <div class="service-title-box">
                                                    <h2 class="service-main-title"><?php the_title(); ?></h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata();
                            else : ?>
                                <p>No services found.</p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
