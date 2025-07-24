<?php set_query_var('set_header_bg', true); ?>
<?php get_header(); ?>

<?php the_post(); ?>


<section class="pagetitle-section style2">
    <div class="w-layout-blockcontainer container w-container">
        <div class="pagetitle-section-wrapper">
            <div class="pagetitle-title-box">
                <div class="blog-author-box center">
                    <div class="blog-author-name"><?php the_author(); ?></div>
                    <div class="blog-date"><?php echo get_the_date(); ?></div>
                </div>
                <h1 class="pagetitle-title small-detail-title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="blog-details-section">
    <div class="w-layout-blockcontainer container w-container">
        <div class="blog-details-section-wrapper">
            <div class="single-image-wrap">
                <img src="<?php the_post_thumbnail_url(); ?>" loading="lazy" alt="Blog Image" sizes="(max-width: 479px) 100vw, (max-width: 767px) 96vw, (max-width: 991px) 97vw, 100vw" srcset="<?php the_post_thumbnail_url(); ?> 500w, <?php the_post_thumbnail_url(); ?> 1300w" class="single-image"/>
            </div>
            <div class="blog-details-content-wrap">
                <div class="w-layout-grid blog-details-grid">
                    <div data-w-id="73b918c8-b6b9-2e0d-d56a-6a0b9582857c" class="blog-details-social-box">
                        <div class="blog-details-social-item">
                            <div class="blog-social-item">
                                <div class="social-item-title">Stay connected</div>
                                <div class="social-item-box">
                                    <?php
                                        $facebook_url = get_theme_mod('global_facebook_url');
                                    ?>
                                    <a href="<?php echo esc_html($facebook_url); ?>" class="social-link">Facebook</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-w-id="a4c6ad95-f1cb-671b-0ec3-1a275c921899" class="blog-details-content-box">
                        <div class="blog-rich-text-box">
                            <div class="blog-rich-text w-richtext">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
