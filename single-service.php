<?php set_query_var('set_header_bg', true); ?>
<?php get_header(); ?>


<section class="pagetitle-section style2">
    <div class="w-layout-blockcontainer container w-container">
        <div class="pagetitle-section-wrapper">
            <div class="pagetitle-title-box">
                <h1 data-w-id="71c79fb2-838e-8a04-0fe0-5957a52878e2" class="pagetitle-title"><?php the_title(); ?></h1>
            </div>
            <div data-w-id="3b759ec7-7f1e-ff03-1429-af4a1a99ca61" class="pagetitle-desc-box">
                <p class="pagetitle-desc"><?php the_excerpt(); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="service-details-section section-bottom-padding">
    <div class="w-layout-blockcontainer container w-container">
        <div class="service-details-section-wrapper">
            <div class="single-image-wrap">
                <?php
                    $img_url = wp_get_attachment_url(get_post_meta(get_the_ID(), '_service_image_id', true));
                    if ($img_url) {
                        $alt_text = get_the_title();
                        echo '<img src="' . esc_url($img_url) . '" class="single-image" loading="lazy" alt="' . esc_attr($alt_text) . '" />';
                    }
                ?>
            </div>
            <div class="service-details-content">
                <div class="w-layout-grid service-details-grid">
                    <div id="w-node-_840b8a7b-1091-cdcf-73be-b23bfef3081f-a1bbd509" data-w-id="840b8a7b-1091-cdcf-73be-b23bfef3081f" class="service-rich-text-box">
                        <div class="service-rich-text w-richtext">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cta-2-section">
    <div class="w-layout-blockcontainer container-fluid w-container">
        <div class="cta-2-section-wrapper">
            <div class="cta-2-form-content">
                <div class="form-block-wrap">
                    <?php
                        $contact_form_shortcode = get_theme_mod('global_contact_form_shortcode');
                        $form_title = 'Let\'s talk'; // fallback
                        if (preg_match('/title="([^"]+)"/', $contact_form_shortcode, $matches)) {
                            $form_title = $matches[1];
                        }
                    ?>
                    <h2 class="form-title"><?php echo esc_html($form_title); ?></h2>
                    <div class="form-box">
                        <div class="form-block w-form">
                            <?php
                                if ($contact_form_shortcode) {
                                    echo do_shortcode($contact_form_shortcode);
                                } else {
                                    echo '<p>No contact form available.</p>';
                                }
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php set_query_var('wide_testimonial', true); ?>
<?php get_template_part('template-parts/testimonial-section'); ?>
<?php get_footer();?>