<section class="faq-section">
    <div class="w-layout-blockcontainer container w-container">
        <div class="section-title">
            <div class="sub-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/sub-title.svg" loading="lazy" alt="Icon"/>
                <div>FAQ's</div>
            </div>
            <h2 class="title">Frequently Asked Questions</h2>
        </div>
        <div class="faq-wrap">
            <div class="faq-data">
                <?php
                // Query for 'faq' custom post type
                $faqs = new WP_Query([
                    'post_type'      => 'faq',
                    'posts_per_page' => 5,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);
                $data_id_suffix = [
                    '17f',
                    '18b',
                    '197',
                    '1a3',
                    '1af'
                    
                ];
                if ($faqs->have_posts()) :
                    $first = true;
                    $i = 0;
                    while ($faqs->have_posts()) : $faqs->the_post(); ?>
                        <div class="faq<?php if ($first) { echo ' top'; $first = false; } ?> w-dropdown" data-hover="false" data-delay="0" data-w-id="1ba9f017-1354-621d-c7e2-8758d780c<?php echo $data_id_suffix[$i] ?>">
                            <div class="que w-dropdown-toggle">
                                <h3 class="d-none"></h3>
                                <div class="que-title"><?php the_title(); ?></div>
                                <div class="que-icon">
                                    <div class="vertical-line"></div>
                                    <div class="horizontal-line"></div>
                                </div>
                            </div>
                            <nav class="ans w-dropdown-list">
                                <div class="ans-box">
                                    <div class="ans-text"><?php the_content(); ?></div>
                                </div>
                            </nav>
                        </div>
                    <?php $i++; endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No FAQs found.</p>
                <?php endif; ?>
            </div>
            <div class="faq-right">
                <div class="faq-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/faq-01.png" loading="lazy" sizes="(max-width: 479px) 100vw, (max-width: 767px) 47vw, (max-width: 991px) 48vw, 23vw" srcset="<?php echo get_template_directory_uri(); ?>/assets/faq-01.png 500w, <?php echo get_template_directory_uri(); ?>/assets/faq-01.png 618w" alt="FAQ Image" class="faq-image"/>
                </div>
                <div class="faq-img-wrap">
                    <div class="faq-block bottom">
                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/ic-hygiene-kit.svg" loading="lazy" alt="Icon" class="faq-icon"/>
                            <h5 class="faq-info-title">Making a difference in Saskatchewan. Help us make a difference</h5>
                        </div>
                        <a href="https://www.paypal.com/donate/?hosted_button_id=64W84AK8BQGFC" target="_blank" class="secondary-btn white w-inline-block">
                            <div>Donate Now</div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-white.svg" loading="lazy" alt="Arrow" class="arrow"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>