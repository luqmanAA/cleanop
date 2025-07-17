<?php

?>
<section class="testimonial-section section-padding">
    <div class="w-layout-blockcontainer container w-container">
        <div class="testimonial-section-wrapper">
            <div class="testimonial-section-title">
                <div class="section-title-box">
                    <h2 class="section-title">What our clients say about us</h2>
                </div>
            </div>
            <div class="testimonial-section-content">
                <div class="testimonial-item-box">
                    <div data-delay="3200" data-animation="slide" class="testimonial-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="800" data-infinite="true">
                        <div class="testimonial-mask w-slider-mask">
                            <?php
                            $testimonials = new WP_Query([
                                'post_type'      => 'testimonial',
                                'posts_per_page' => -3,
                            ]);
                            if ($testimonials->have_posts()) :
                            while ($testimonials->have_posts()) : $testimonials->the_post();?>
                                <div class="testimonial-slide w-slide">
                                    <div class="testimonial-item">
                                        <div class="testimonial-content">
                                            <div class="textimonial-quote-box">
                                                <blockquote class="textimonial-quote"><?php the_excerpt(); ?></blockquote>
                                            </div>
                                            <div class="testimonial-buttom-content">
                                                <div class="testimonial-auther-box">
                                                    <img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="testimonial-auther-image"/>
                                                    <div class="testimonial-auther-detail">
                                                        <h3 class="testimonial-auther-name">- <?php the_title(); ?></h3>
                                                        <div class="testimonial-auther-position">
                                                            <?php
                                                            $position = get_post_meta(get_the_ID(), 'position', true);
                                                            echo esc_html($position);
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="testimonial-quote-image">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quotes.svg" loading="lazy" alt="Quote Image" class="quote-image"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata();
                            else : ?>
                                <p>No testimonials found.</p>
                            <?php endif; ?>
                        </div>
                        <div class="arrow-block right-arrow w-slider-arrow-left">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" loading="lazy" alt="icon" class="right-arrow-icon"/>
                        </div>
                        <div class="arrow-block left-arrow w-slider-arrow-right">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" loading="lazy" alt="icon" class="left-arrow-icon"/>
                        </div>
                        <div class="slide-nav w-slider-nav w-round w-num"></div>
                    </div>
                </div>
                <div class="counter-item-box">
                    <div class="counter-item">
                        <h3 class="counter-number">99%</h3>
                        <div class="counter-number-text">Customer satisfaction</div>
                    </div>
                    <div class="counter-item">
                        <h3 class="counter-number">12m+</h3>
                        <div class="counter-number-text">Amazing customer</div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_template_part('template-parts/partners-section'); ?>
    </div>
</section>