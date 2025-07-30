<?php set_query_var('set_header_bg', true); ?>
<?php get_header(); ?>

    <section class="pagetitle-section">
        <div class="section-gradient-wrap">
            <div class="shadow-gradient page-title"></div>
        </div>
        <div class="w-layout-blockcontainer container w-container">
            <div class="pagetitle-section-wrapper">
                <div class="pagetitle-title-box">
                    <h1 class="pagetitle-title">Our Portfolio</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="portfolio-2-section section-padding">
        <div class="w-layout-blockcontainer container w-container">
            <div class="portfolio-2-section-wrapper">
                <div class="portfolio-2-section-content">
                    <div class="portfolio-tab-item-box">
                        <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="portfolio-tabs w-tabs">
                            <div class="tabs-content w-tab-content">
                                <div data-w-tab="Tab 1" class="portfolio-tab-pane w-tab-pane w--tab-active">
                                    <div class="portfolio-item-content">
                                        <div class="w-dyn-list">
                                            <div role="list" class="portfolio-item-grid w-dyn-items">
                                                <?php 
                                                    $services = new WP_Query([
                                                        'post_type'      => 'portfolio',
                                                        'posts_per_page' => -1,
                                                    ]);
                                                    if ($services->have_posts()) :
                                                        while ($services->have_posts()) : $services->the_post(); ?>
                                                        <div role="listitem" class="w-dyn-item">
                                                            <div class="portfolio-link-block style2 w-inline-block">
                                                                <div class="portfolio-image-box">
                                                                    <img loading="lazy" src="<?php the_post_thumbnail_url(); ?>" class="portfolio-image"/>
                                                                </div>
                                                                <div class="portfolio-content-box style2">
                                                                    <!-- <div class="portfolio-category"><?php the_excerpt(); ?></div> -->
                                                                    <h3 class="portfolio-title"><?php the_title(); ?></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endwhile;
                                                        wp_reset_postdata();
                                                    else : ?>
                                                        <p>No projects found.</p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                

    <?php get_template_part('template-parts/cta-section'); ?>
<?php get_footer(); ?>
