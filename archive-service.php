<?php set_query_var('set_header_bg', true); ?>
<?php get_header(); ?>

<section class="pagetitle-section">
    <div class="section-gradient-wrap">
        <div class="shadow-gradient page-title"></div>
    </div>
    <div class="w-layout-blockcontainer container w-container">
        <div class="pagetitle-section-wrapper">
            <div class="pagetitle-title-box">
                <h1 data-w-id="6817c074-d6e3-46ab-9cb5-c71e8cccfc11" class="pagetitle-title">Our Services</h1>
            </div>
        </div>
    </div>
</section>

<section class="service-2-section section-padding">
    <div class="w-layout-blockcontainer container w-container">
        <div style="opacity:0" class="service-2-section-wrapper">
            <div class="service-2-section-content">
                <div class="w-dyn-list">
                    <div role="list" class="service-2-list collection-list w-dyn-items">
                        <?php 
                        $services = new WP_Query([
                            'post_type'      => 'service',
                            'posts_per_page' => 5,
                        ]);
                        if ($services->have_posts()) :
                            while ($services->have_posts()) : $services->the_post(); ?>
                            <div role="listitem" class="w-dyn-item">
                                <a href="<?php the_permalink(); ?>" class="service-2-link-block w-inline-block">
                                    <div class="service-2-content">
                                        <div class="service-icon-box">
                                            <?php
                                                $svg_icon_url = wp_get_attachment_url(get_post_meta(get_the_ID(), '_service_svg_icon_id_2', true));
                                                if ($svg_icon_url) {
                                                    $alt_text = get_the_title();
                                                    echo '<img src="' . esc_url($svg_icon_url) . '" class="service-icon" loading="lazy" alt="' . esc_attr($alt_text) . '" />';
                                                }
                                            ?>
                                        </div>
                                        <div class="service-content-box">
                                            <h3 class="service-title dark"><?php the_title(); ?></h3>
                                            <div class="service-desc dark"><?php the_excerpt(); ?></div>
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
</section>
    <?php set_query_var('include_partners', true); ?>
    <?php get_template_part('template-parts/why-us-section'); ?>
    <?php get_template_part('template-parts/cta-section'); ?>
<?php get_footer(); ?>
