<?php get_header(); ?>

    <section class="hero-section">
        <div class="section-gradient-wrap">
            <div class="shadow-gradient style2"></div>
        </div>
        <div class="w-layout-blockcontainer container w-container">
            <div class="hero-section-wrapper">
                <div class="hero-section-content">
                    <div data-w-id="69b20f0a-23f5-f91c-7b15-ca0ca375a788" class="hero-section-title-box">
                        <div class="hero-sub-title">24/7 emergency support</div>
                        <h1 class="hero-title">Your affordable cleaning service</h1>
                    </div>
                    <div data-w-id="a2200691-a6ad-cd52-edc6-fa548c36a835" class="form-block-wrap">
                        <h2 class="form-title">Let us know how we can help</h2>
                        <div class="form-box">
                            <div class="form-block w-form">
                                <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form" data-wf-page-id="676d0005727d5a9dfb6cd8c2" data-wf-element-id="cf0aeef7-48d2-78c0-efc5-548ff6307760" data-turnstile-sitekey="0x4AAAAAAAQTptj2So4dx43e">
                                    <div class="input-block">
                                        <label for="name" class="form-field">Hello, I'm</label>
                                        <input class="text-field w-input" maxlength="256" name="name" data-name="Name" placeholder="Name*" type="text" id="name" required=""/>
                                    </div>
                                    <div class="input-block">
                                        <label for="Phone" class="form-field">You can reach me at</label>
                                        <input class="text-field w-input" maxlength="256" name="Phone" data-name="Phone" placeholder="Phone number*" type="tel" id="Phone" required=""/>
                                    </div>
                                    <div class="input-block">
                                        <label for="services" class="form-field">Choose your service</label>
                                        <div class="text-field">
                                            <select id="services" name="services" data-name="services" required="" class="select-field w-select">
                                                <option value="">Select service*</option>
                                                <option value="First">House cleaning</option>
                                                <option value="Second">Office cleaning</option>
                                                <option value="Third">Deep cleaning</option>
                                                <option value="Fourth">Kitchen cleaning</option>
                                                <option value="Five">Gutter cleaning</option>
                                                <option value="six">Toilet cleaning</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="submit-buuton">
                                        <input type="submit" data-wait="Please wait..." class="button width-100 w-button" value="Send message"/>
                                    </div>
                                </form>
                                <div class="success-message w-form-done">
                                    <div>Thank you! Your submission has been received!</div>
                                </div>
                                <div class="error-message w-form-fail">
                                    <div>Oops! Something went wrong while submitting the form.</div>
                                </div>
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
                        At cleanflow, we believe a clean home is the foundation for a healthier, <span class="about-text-span">happier life.</span>
                        Our mission is to provide top-quality cleaning services tailored to your needs, <span class="about-text-span">Ensuring your space shines</span>
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame-1.svg" loading="lazy" alt="icon" class="about-icon icon-image1"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/frame-2.svg" loading="lazy" alt="icon" class="about-icon icon-image2"/>
                </div>
                <div class="about-section-content">
                    <div class="w-layout-grid about-section-grid">
                        <div class="about-image-box">
                            <div class="single-image-wrap">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/single-img-1.avif" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, (max-width: 991px) 500px, 961px" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/single-img-1-p-500.avif 500w, <?php echo get_template_directory_uri(); ?>/assets/images/single-img-1.avif 961w" alt="Single Image" class="single-image image-size"/>
                            </div>
                        </div>
                        <div id="w-node-daeabb09-8b41-0479-9f6a-325e3a54406d-fb6cd8c2" class="about-contact-box">
                            <div class="single-image-wrap">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/single-img-2.avif" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, (max-width: 991px) 500px, 240px" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/single-img-2-p-500.avif 500w, <?php echo get_template_directory_uri(); ?>/assets/images/single-img-2.avif 961w" alt="Single Image" class="single-image style2"/>
                            </div>
                            <div class="about-content-wrap">
                                <div class="section-title-box">
                                    <h2 class="section-title">We work many fields to clean your area</h2>
                                    <p class="section-desc">Lorem ipsum dolor sit amet consectetur. Ut suspendisse iaculis bibendum nunc pellentesque malesuada. Sed magna accumsan nibh eros viverra lobortis facilisis </p>
                                </div>
                            </div>
                            <div class="ratings-content-box">
                                <h3 class="rating-title">Ratings 4.5</h3>
                                <div class="rating-text">Clients praise our exceptional work.</div>
                                <div class="rating-image-box">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avtar.avif" loading="lazy" alt="Image" class="rating-image"/>
                                    <div class="rating-client-count">677k Clients globally</div>
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
    <?php get_template_part('template-parts/portfolio-section'); ?>
    <?php get_template_part('template-parts/team-section'); ?>
    <?php get_template_part('template-parts/cta-section'); ?>
    <?php get_template_part('template-parts/testimonial-section'); ?>

<?php get_footer(); ?>