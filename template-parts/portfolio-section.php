<?php
/**
 * Template part for displaying the Services Section
 */
?>

<section class="portfolio-section">
    <div class="w-layout-blockcontainer container w-container">
        <div class="portfolio-section-wrapper">
            <div class="portfolio-section-title">
                <div class="section-title-box">
                    <h2 class="section-title">Take a look at our most recent projects</h2>
                </div>
                <div class="section-button-box">
                    <div class="button-block">
                        <a href="/portfolios" class="button border-btn w-inline-block">
                            <div class="button-text">View all projects</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-layout-blockcontainer container-fluid padding-zero w-container">
        <div class="portfolio-section-content">
            <div class="portfolio-merquee-block">
                <div data-w-id="e95fb0f4-f7d2-9661-56c7-6f5c79e6bc5f" class="portfolio-merquee-item">
                    <div class="w-dyn-list">
                        <div role="list" class="portfolio-list-item w-dyn-items">
                            <?php
                            $portfolio_items = new WP_Query([
                                'post_type'      => 'portfolio',
                                'posts_per_page' => 4,
                            ]);
                            if ($portfolio_items->have_posts()) :
                                while ($portfolio_items->have_posts()) : $portfolio_items->the_post(); ?>
                                    <div role="listitem" class="portfolio-item w-dyn-item">
                                        <div class="portfolio-link-block w-inline-block">
                                            <div class="portfolio-image-box">
                                                <img src="<?php the_post_thumbnail_url(); ?>" loading="lazy" alt="Portfolio Image" sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, 47vw" srcset="<?php the_post_thumbnail_url(); ?> 500w, <?php the_post_thumbnail_url(); ?> 900w" class="portfolio-image"/>
                                            </div>
                                            <div class="portfolio-content-box">
                                                <div class="portfolio-category">
                                                    <?php
                                                        $category = get_the_category();
                                                        if ($category) {
                                                            echo esc_html($category[0]->name);
                                                        }
                                                    ?>
                                                </div>
                                                <h3 class="portfolio-title"><?php the_title(); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                            <?php endwhile;
                                wp_reset_postdata();
                            else : ?>
                                <p>No portfolio items found.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div data-w-id="e95fb0f4-f7d2-9661-56c7-6f5c79e6bc5f" class="portfolio-merquee-item marquee-2">
                    <div class="w-dyn-list">
                        <div role="list" class="portfolio-list-item w-dyn-items">
                            <?php
                            $portfolio_items = new WP_Query([
                                'post_type'      => 'portfolio',
                                'posts_per_page' => 4,
                            ]);
                            if ($portfolio_items->have_posts()) :
                                while ($portfolio_items->have_posts()) : $portfolio_items->the_post(); ?>
                                    <div role="listitem" class="portfolio-item w-dyn-item">
                                        <div class="portfolio-link-block w-inline-block">
                                            <div class="portfolio-image-box">
                                                <img src="<?php the_post_thumbnail_url(); ?>" loading="lazy" alt="Portfolio Image" sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, 47vw" srcset="<?php the_post_thumbnail_url(); ?> 500w, <?php the_post_thumbnail_url(); ?> 900w" class="portfolio-image"/>
                                            </div>
                                            <div class="portfolio-content-box">
                                                <div class="portfolio-category">
                                                    <?php
                                                        $category = get_the_category();
                                                        if ($category) {
                                                            echo esc_html($category[0]->name);
                                                        }
                                                    ?>
                                                </div>
                                                <h3 class="portfolio-title"><?php the_title(); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                            <?php endwhile;
                                wp_reset_postdata();
                            else : ?>
                                <p>No portfolio items found.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="portfolio-merquee-top">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/rectangle-2.svg" loading="lazy" alt="Pattern Image" class="pattern-image"/>
                </div>
                <div class="portfolio-merquee-buttom">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/rectangle-1.svg" loading="lazy" alt="Pattern Image" class="pattern-image"/>
                </div>
            </div>
        </div>
    </div>
</section>