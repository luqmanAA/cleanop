<?php

?>


<section data-w-id="e1d8e8fc-7362-5f81-9e32-5b69fe7323bd" class="team-section">
    <div class="section-gradient-wrap">
        <div class="shadow-gradient"></div>
    </div>
    <div class="w-layout-blockcontainer container w-container">
        <div class="team-section-wrapper">
            <div class="team-section-content">
                <div class="w-layout-grid team-section-grid">
                    <?php
                    $teams = new WP_Query([
                        'post_type'      => 'team',
                        'posts_per_page' => 5,
                    ]);
                    if ($teams->have_posts()) :
                        $custom_class_order = [4, 2, 1, 3, 5];
                        $index = 0;
                        while ($teams->have_posts()) : $teams->the_post(); ?>
                            <div class="team-item-box team-item<?php echo esc_attr($custom_class_order[$index]); ?>">
                                <div class="w-dyn-list">
                                    <div role="list" class="w-dyn-items">
                                        <div role="listitem" class="w-dyn-item">
                                            <div class="team-item-block">
                                                <div class="team-thumbnail">
                                                    <img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="Tean Image" class="team-image"/>
                                                </div>
                                                <div class="team-content">
                                                    <a href="<?php the_permalink(); ?>" class="team-title"><?php the_title(); ?></a>
                                                    <div class="team-position">
                                                        <?php
                                                        $position = get_post_meta(get_the_ID(), 'position', true);
                                                        echo esc_html($position);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $index++;?>
                        <?php endwhile;
                        wp_reset_postdata();
                    else : ?>
                        <p>No team members found.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="team-section-title">
                <div class="section-title-box">
                    <h2 class="section-title">Behind every sparkling home is our dedicated cleaning team</h2>
                </div>
                <div class="section-button-box">
                    <div class="button-block">
                        <a href="<?php echo esc_url( get_post_type_archive_link('team') ); ?>" class="button border-btn w-inline-block">
                            <div class="button-text">View all cleaners</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>