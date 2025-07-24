<?php set_query_var('set_header_bg', true); ?>
<?php
/*
Template Name: Contact Page
*/
get_header();
?>
    <section class="pagetitle-section">
        <div class="section-gradient-wrap">
            <div class="shadow-gradient page-title"></div>
        </div>
        <div class="w-layout-blockcontainer container w-container">
            <div class="pagetitle-section-wrapper">
                <div class="pagetitle-title-box">
                    <h1 class="pagetitle-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section section-padding">
        <div class="section-gradient-wrap">
            <div class="shadow-gradient"></div>
        </div>
        <div class="w-layout-blockcontainer container w-container">
            <div class="contact-section-wrapper">
                <div class="w-layout-grid contact-section-grid">
                    <div data-w-id="aef23e17-1393-9b79-5be5-a99305be9f14" class="contact-section-title">
                        <div class="section-title-box">
                            <?php the_content(); ?>
                        </div>
                        <div class="contact-info-item-box">
                            <div class="info-item-box">
                                <div class="info-title">Email address</div>
                                <?php
                                    $email = get_post_meta(get_the_ID(), 'email', true);
                                    echo '<a href="mailto:' . esc_html($email) . '" class="info-link">' . esc_html($email) . '</a>';
                                ?>
                            </div>
                            <div class="info-item-box">
                                <div class="info-title">Phone number</div>
                                <?php
                                    $phone = get_post_meta(get_the_ID(), 'phone', true);
                                    echo '<a href="tel:' . esc_html($phone) . '" class="info-link">' . esc_html($phone) . '</a>';
                                ?>
                            </div>
                            <div class="info-item-box">
                                <div class="info-title">Follow us</div>
                                <div class="social-item-wrap">
                                    <?php
                                        $facebook = get_post_meta(get_the_ID(), 'facebook', true);
                                        echo '<a href="' . esc_url($facebook) . '" target="_blank" class="social-item w-inline-block">
                                            <div class="social-item-link">Facebook</div>
                                        </a>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-section-content">
                        <div class="form-block-wrap">
                            <?php
                                $contact_form_shortcode = get_post_meta(get_the_ID(), 'contact_form_shortcode', true);
                                $form_title = 'Let\'s talk'; // fallback

                                // Extract form ID from shortcode like [contact-form-7 id="123" title="..."]
                                // if (preg_match('/id="([a-zA-Z0-9\-]+)"/', $contact_form_shortcode, $matches)) {
                                //     $uuid = sanitize_text_field($matches[1]);

                                //     // Query the CF7 post by UUID
                                //     $cf7_query = new WP_Query([
                                //         'post_type' => 'wpcf7_contact_form',
                                //         'uuid' => $uuid,
                                //     ]);

                                //     if ($cf7_query->have_posts()) {
                                //         $cf7_query->the_post();
                                //         $form_title = get_the_title();
                                //         wp_reset_postdata();
                                //     }
                                // }
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

<?php get_footer(); ?>