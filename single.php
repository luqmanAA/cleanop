<?php
get_header();
?>

<div class="page-title">
    <div class="w-layout-blockcontainer container w-container">
        <div class="post-title-wrap">
            <div class="blog-title-wrap">
                <div class="post-info">
                    <div class="author-name">
                        <div class="body-small">
                            <?php
                            $category = get_the_category();
                            if ($category) {
                                echo esc_html($category[0]->name);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="body-small"><?php echo get_the_date(); ?></div>
                </div>
                <h1 class="post-main-title"><?php the_title(); ?></h1>
            </div>
            <!-- Optional Author Info -->
            <!--
            <div class="post-author">
                <div class="author-img">
                    <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                </div>
                <div class="author-name">
                    <div class="body-small">By</div>
                    <div class="body-small"><?php the_author(); ?></div>
                </div>
            </div>
            -->
        </div>
    </div>
</div>

<div class="page-data">
    <section class="post-main">
        <div class="w-layout-blockcontainer container w-container">
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-maini-mg">
                    <img 
                        src="<?php the_post_thumbnail_url('large'); ?>" 
                        loading="eager"
                        alt="<?php the_title_attribute(); ?>"
                        sizes="(max-width: 479px) 92vw, (max-width: 767px) 95vw, 96vw"
                        srcset="<?php echo wp_get_attachment_image_srcset(get_post_thumbnail_id()); ?>"
                        class="post-main-image"
                    />
                </div>
            <?php endif; ?>

            <div class="post-details w-richtext">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
