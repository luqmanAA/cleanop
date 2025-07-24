<?php
/**
 * Template part for the Steps Section
 */
?>

<section class="step-section">
    <div class="w-layout-blockcontainer container w-container">
        <div data-w-id="4c8118eb-1e24-eb59-45c9-cf26490b5831" class="step-section-wrapper">
            <div class="step-sticky-box">
                <div class="step-section-content">
                    <div class="step-item-count-box">
                        <div class="step-item-count-flex">
                            <div class="step-count-box item-1">
                                <div class="step-text style2">A</div>
                            </div>
                            <div class="step-line-box">
                                <div class="step-line line-1"></div>
                            </div>
                            <div class="step-count-box item-2">
                                <div class="step-text style2">B</div>
                            </div>
                            <div class="step-line-box">
                                <div class="step-line line-2"></div>
                            </div>
                            <div class="step-count-box item-3">
                                <div class="step-text style2">C</div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // Steps data (could come from ACF or options for dynamic content)
                    $steps = [
                        [
                            'label' => 'A',
                            'title' => 'Request a Free Quote',
                            'desc'  => 'Tell us what you need, and we’ll provide a clear estimate tailored to your property.',
                            'image' => 'request-quote.jpg',
                            'btn_text' => 'Get a Free Quote',
                        ],
                        [
                            'label' => 'B',
                            'title' => 'Schedule Your Service',
                            'desc'  => 'Choose a date and time that works for you. Our team is punctual, flexible, and always ready to deliver.',
                            'image' => 'schedule-service.jpg',
                            'btn_text' => 'Pick a Time',
                        ],
                        [
                            'label' => 'C',
                            'title' => 'Enjoy the Results',
                            'desc'  => 'We show up and leave your space sparkling. Sit back and enjoy the fresh, clean finish.',
                            'image' => 'enjoy-result.jpg',
                            'btn_text' => 'Book Now',
                        ],
                    ];

                    foreach ($steps as $index => $step):
                    ?>
                        <div class="step-section-item step-item-<?php echo $index + 1; ?>">
                            <div class="w-layout-grid step-section-grid">
                                <div class="step-item-content-wrap">
                                    <div class="step-item-box">
                                        <div class="step-text"><?php echo esc_html($step['label']); ?></div>
                                    </div>
                                    <div class="step-title-box">
                                        <h2 class="section-title"><?php echo esc_html($step['title']); ?></h2>
                                        <p class="section-desc"><?php echo esc_html($step['desc']); ?></p>
                                    </div>
                                    <div class="step-button-box">
                                        <div class="button-block">
                                            <a href="<?php echo esc_url(site_url('/contact-us')); ?>" class="button w-inline-block">
                                                <div class="button-text"><?php echo esc_html($step['btn_text']); ?></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-item-image-wrap">
                                    <div class="step-image-box">
                                        <img 
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $step['image']); ?>" 
                                            loading="lazy" 
                                            alt="Step Image" 
                                            class="step-image"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <?php 
            $include_partners = get_query_var('include_partners', false);
            if ($include_partners): ?>
                <?php set_query_var('remove_top_border', true); ?>
                <?php get_template_part('template-parts/partners-section'); ?>
                <div class="section-bottom-padding"></div>
        <?php endif; ?>
    </div>
</section>
