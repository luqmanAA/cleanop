<?php get_header(); ?>

    <section class="hero-section">
        <div class="section-gradient-wrap">
            <div class="shadow-gradient style2"></div>
        </div>
        <div class="w-layout-blockcontainer container w-container">
            <div class="hero-section-wrapper">
                <div class="hero-section-content">
                    <div data-w-id="69b20f0a-23f5-f91c-7b15-ca0ca375a788" class="hero-section-title-box">
                        <div class="hero-sub-title">Located in Monterey</div>
                        <h1 class="hero-title">Professional Exterior Cleaning Services for Spotless Results.</h1>
                    </div>
                    <div data-w-id="a2200691-a6ad-cd52-edc6-fa548c36a835" class="form-block-wrap">
                        <?php
                            $contact_form_shortcode = get_post_meta(get_the_ID(), 'contact_form_shortcode', true);
                            $form_title = 'Let\'s talk';

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
    </section>

    <section class="about-section section-padding">
        <div class="section-gradient-wrap">
            <div class="shadow-gradient style3"></div>
        </div>
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="48c9dafc-ad43-6343-471f-7f54711c3b98" class="about-section-wrapper">
                <div class="about-section-title">
                    <div class="about-text">
                        At Cypress Window Cleaning, we believe a clean exterior is the first step to a beautiful, well-maintained home. Our mission is to provide top-quality exterior cleaning services tailored to your property's needs. From windows to roofs, we make sure your space shines from the outside in.
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame-1.svg" loading="lazy" alt="icon" class="about-icon icon-image1"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame-2.svg" loading="lazy" alt="icon" class="about-icon icon-image2"/>
                </div>
                <div class="about-section-content">
                    <div class="w-layout-grid about-section-grid">
                        <div class="about-image-box">
                            <div class="single-image-wrap">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us.jpg" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, (max-width: 991px) 500px, 961px" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/single-img-1-p-500.avif 500w, <?php echo get_template_directory_uri(); ?>/assets/images/about-us.jpg 961w" alt="Single Image" class="single-image image-size"/>
                            </div>
                        </div>
                        <div id="w-node-daeabb09-8b41-0479-9f6a-325e3a54406d-fb6cd8c2" class="about-contact-box">
                            <div class="single-image-wrap">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us-2.jpg" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, (max-width: 991px) 500px, 240px" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/about-us-2.jpg 500w, assets/images/about-us-2.jpg 961w" alt="Single Image" class="single-image style2"/>
                            </div>
                            <div class="about-content-wrap">
                                <div class="section-title-box">
                                    <h2 class="section-title">We're not just cleaners; we're caretakers.</h2>
                                    <p class="section-desc">
                                        We treat the exterior of your home or business just like we would ours. Our team combines professional-grade equipment with eco-conscious methods to deliver outstanding, damage-free results every time.
                                    </p>
                                    <!-- <ul class="section-checklist">
                                        <li><span class="checklst-icon">✓</span> Reliable & On-Time</li>
                                        <li><span class="checklst-icon">✓</span> Fully Insured</li>
                                        <li><span class="checklst-icon">✓</span> Satisfaction Guaranteed</li>
                                    </ul> -->

                                </div>
                            </div>
                            <div class="ratings-content-box">
                                <h3 class="rating-title">Ratings 5.0</h3>
                                <div class="rating-text">Clients praise our exceptional work.</div>
                                <div class="rating-image-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avtar.avif" loading="lazy" alt="Image" class="rating-image"/>
                                    <div class="rating-client-count">500+ Amazing Clients</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/services-section'); ?>
    <?php get_template_part('template-parts/why-us-section'); ?>
    <!-- <?php get_template_part('template-parts/portfolio-section'); ?> -->
    <!-- <?php get_template_part('template-parts/team-section'); ?> -->
    <?php get_template_part('template-parts/cta-section'); ?>
    <?php get_template_part('template-parts/testimonial-section'); ?>

<?php get_footer(); ?>