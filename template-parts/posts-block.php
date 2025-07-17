<section class="blogs">
    <div class="w-layout-blockcontainer container w-container">
        <div class="section-title">
            <div class="sub-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/sub-title.svg" loading="lazy" alt="Icon"/>
                <div>Our Blogs</div>
            </div>
            <h2 class="title">News & Articles</h2>
        </div>
        <div class="w-dyn-list">
            <div role="list" class="post-list w-dyn-items">
                <?php
                $recent_posts = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                ]);
                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                        <div role="listitem" class="post-item w-dyn-item">
                            <a href="<?php the_permalink(); ?>" class="post-link w-inline-block">
                                <div class="post-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url('medium'); ?>" loading="lazy" alt="<?php the_title_attribute(); ?>" class="post-image"/>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/default-post.png" loading="lazy" alt="Default Post Image" class="post-image"/>
                                    <?php endif; ?>
                                </div>
                                <div class="post-data">
                                    <div class="post-info">
                                        <div><?php echo get_the_date(); ?></div>
                                    </div>
                                    <h4 class="post-title"><?php the_title(); ?></h4>
                                    <div class="post-bottom">
                                        <div>
                                            <?php
                                            $category = get_the_category();
                                            if ($category) {
                                                echo esc_html($category[0]->name);
                                            }
                                            ?>
                                        </div>
                                        <div class="secondary-btn">
                                            <div>Read Article</div>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow.svg" loading="lazy" alt="Arrow" class="arrow"/>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No posts found.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="button-wrap right">
            <a href="<?php echo esc_url(get_option('page_for_posts') ? get_permalink(get_option('page_for_posts')) : get_post_type_archive_link('post')); ?>" class="primary-btn w-inline-block">
                <div>View All Blogs</div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/arrow-white.svg" loading="lazy" alt="Arrow" class="arrow"/>
            </a>
        </div>
    </div>
</section>