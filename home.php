<?php
/*
Template Name: Custom Blog Page
*/
get_header();
?>

<div class="page-title">
    <div class="w-layout-blockcontainer container w-container">
        <div class="sub-title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/sub-title.svg" loading="lazy" alt="Icon"/>
            <div>Our Blogs</div>
        </div>
        <h1 class="main-title">News &amp; Articles</h1>
    </div>
</div>

<div class="page-data">
    <section class="blogs">
        <div class="w-layout-blockcontainer container w-container">
            <div class="w-dyn-list">
                <div role="list" class="post-list w-dyn-items">
                    <?php
                    $paged = get_query_var('paged') ?: 1;
                    $blog_posts = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'paged' => $paged,
                    ]);
                    if ($blog_posts->have_posts()) :
                        while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                            <div role="listitem" class="post-item w-dyn-item">
                                <a data-w-id="c1e95c48-1432-c366-5545-91ef9c4f6209" href="<?php the_permalink(); ?>" class="post-link w-inline-block">
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
                                                echo $category ? esc_html($category[0]->name) : 'Uncategorized';
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
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>

                <!-- Optional Pagination -->
                <div class="pagination">
                    <?php
                    echo paginate_links([
                        'total' => $blog_posts->max_num_pages,
                        'prev_text' => '« Prev',
                        'next_text' => 'Next »',
                    ]);
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
