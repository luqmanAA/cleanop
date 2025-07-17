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
                <div data-w-id="37edc42b-cf88-271c-615e-40567fd27634" class="form-block-wrap">
                    <h2 class="form-title">Let us know how we can help</h2>
                    <div class="form-box">
                        <div class="form-block w-form">
                            <form id="email-form" name="email-form" data-name="Email Form" method="get" class="form" data-wf-page-id="676d22fded2ae13fa1bbd509" data-wf-element-id="37edc42b-cf88-271c-615e-40567fd27639" data-turnstile-sitekey="0x4AAAAAAAQTptj2So4dx43e">
                                <div class="input-block">
                                    <label for="Name" class="form-field">Hello, I'm</label>
                                    <input class="text-field w-input" maxlength="256" name="Name" data-name="Name" placeholder="Name*" type="text" id="Name" required=""/>
                                </div>
                                <div class="input-block">
                                    <label for="Phone" class="form-field">You can reach me at</label>
                                    <input class="text-field w-input" maxlength="256" name="Phone" data-name="Phone" placeholder="Phone number*" type="tel" id="Phone" required=""/>
                                </div>
                                <div class="input-block">
                                    <label for="services-2" class="form-field">Choose your service</label>
                                    <div class="text-field">
                                        <select id="Services" name="Services" data-name="Services" required="" class="select-field w-select">
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
                                <div class="input-block text-top">
                                    <label for="field" class="form-field">Type here</label>
                                    <textarea required="" placeholder="Message*" maxlength="5000" id="field" name="field" data-name="Field" class="text-field textarea w-input"></textarea>
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
<?php set_query_var('wide_testimonial', true); ?>
<?php get_template_part('template-parts/testimonial-section'); ?>
<?php get_footer();?>