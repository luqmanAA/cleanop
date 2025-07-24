<section class="blog-section section-padding">
    <div class="w-layout-blockcontainer container w-container">
        <div class="blog-section-wrapper">
            <div class="blog-section-title">
                <div class="section-title-box">
                    <h2 class="section-title">Explore our blog & articles</h2>
                </div>
            </div>
            <div class="blog-section-content">
                <div class="w-layout-grid blog-section-grid">
                    <?php
                    $recent_posts = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                    ]);
                    $counter = 0;
                    if ($recent_posts->have_posts()) :
                        $recent_posts->the_post(); ?>
                        <div class="blog-item-content">
                            <div class="w-dyn-list">
                                <div role="list" class="w-dyn-items">
                                    <div role="listitem" class="w-dyn-item">
                                        <div class="blog-item-block">
                                            <div class="blog-thumbnail">
                                                <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="blog-image"/>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-author-box">
                                                    <div class="blog-author-name"><?php echo get_the_author(); ?></div>
                                                    <div class="blog-date"><?php echo get_the_date(); ?></div>
                                                </div>
                                                <div class="blog-title-box">
                                                    <a href="<?php echo get_permalink(); ?>" class="blog-title"><?php echo get_the_title(); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="blog-item-content">
                            <?php
                                $box_classes = ['first-child', 'style2', 'last-child'];
                                $post_index = 0;
                                while ($recent_posts->have_posts()) :
                                    $recent_posts->the_post();
                                    $class = isset($box_classes[$post_index]) ? $box_classes[$post_index] : '';
                                ?>
                                <div class="blog-item-box <?php echo esc_attr($class); ?>">
                                    <div class="w-dyn-list">
                                        <div role="list" class="w-dyn-items">
                                            <div role="listitem" class="w-dyn-item">
                                                <div class="blog-item-block">
                                                    <div class="blog-thumbnail style2">
                                                        <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="blog-image"/>
                                                    </div>
                                                    <div class="blog-content style2">
                                                        <div class="blog-author-box">
                                                            <div class="blog-author-name"><?php echo get_the_author(); ?></div>
                                                            <div class="blog-date"><?php echo get_the_date(); ?></div>
                                                        </div>
                                                        <div class="blog-title-box">
                                                            <a href="<?php echo get_permalink(); ?>" class="blog-title"><?php echo get_the_title(); ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $post_index++; endwhile; ?>
                        </div>
                        <?php
                        wp_reset_postdata();
                    else : ?>
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
