<?php get_header(); ?>

<div class="page-title">
    <div class="w-layout-blockcontainer container w-container">
        <div class="sub-title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/sub-title.svg" loading="lazy" alt="Icon"/>
            <div>Get Involved</div>
        </div>
        <h1 class="main-title">Upcoming Events</h1>
    </div>
</div>

<div class="page-data">
    <section class="events">
        <div class="w-layout-blockcontainer container w-container">
            <div class="w-dyn-list">
                <div role="list" class="event-list w-dyn-items">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div role="listitem" class="event-item w-dyn-item">
                            <a href="<?php the_permalink(); ?>" class="event-link w-inline-block">
                                <div class="event-img">
                                    <?php 
                                        $custom_thumbnail = get_post_meta(get_the_ID(), '_event_thumbnail', true);
                                        if ($custom_thumbnail) {
                                            $alt_text = get_the_title();
                                            echo '<img src="' . esc_url($custom_thumbnail) . '" class="event-image" loading="lazy" alt="' . esc_attr($alt_text) . '" />';
                                        }
                                    ?>
                                    <div class="event-category">
                                        <?php
                                            $category = get_the_category();
                                            if ($category) {
                                                echo esc_html($category[0]->name);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="event-data">
                                    <div class="event-title-wrap">
                                        <div class="body-small">
                                            <?php
                                                $date = get_post_meta(get_the_ID(), 'event_date', true);

                                                if ($date) {
                                                    $event_date = DateTime::createFromFormat('Y-m-d', $date);
                                                    if ($event_date) {
                                                        echo $event_date->format('F j, Y');
                                                    } else {
                                                        echo esc_html($date);
                                                    }
                                                }
                                                ?>
                                        </div>
                                        <h4 class="event-title">
                                            <?php the_title(); ?>
                                        </h4>
                                    </div>
                                    <div class="event-location">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/ic-location.svg" loading="lazy" alt="Location Icon" class="location-icon" />
                                        <div>
                                            <?php echo esc_html(get_post_meta(get_the_ID(), 'venue', true)); ?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; else : ?>
                        <p>No events found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
