<?php
get_header();

$price = get_post_meta(get_the_ID(), 'ticket_price', true);
$date = get_post_meta(get_the_ID(), 'event_date', true);
$start_time = get_post_meta(get_the_ID(), 'event_start_time', true);
$end_time = get_post_meta(get_the_ID(), 'event_end_time', true);
$venue = get_post_meta(get_the_ID(), 'venue', true);
$paypalProductId = get_post_meta(get_the_ID(), 'paypal_product_id', true); // should be an array

// Format date
$formatted_date = '';
if ($date) {
    $dt = DateTime::createFromFormat('Y-m-d', $date);
    if ($dt) {
        $formatted_date = $dt->format('F j, Y'); // September 20, 2025
    }
}

// Format time (24h → 12h with AM/PM)
function format_time_12h($time) {
    $t = DateTime::createFromFormat('H:i', $time);
    return $t ? $t->format('g:i A') : $time;
}

$formatted_start = $start_time ? format_time_12h($start_time) : '';
$formatted_end = $end_time ? format_time_12h($end_time) : '';
?>

<div class="page-title">
    <div class="w-layout-blockcontainer container w-container">
        <div class="sub-title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/sub-title.svg" loading="lazy" alt="Icon"/>
            <div>
                <?php
                    $category = get_the_category();
                    if ($category) {
                        echo esc_html($category[0]->name);
                    }
                ?>
            </div>
        </div>
        <h1 class="event-main-title"><?php the_title(); ?></h1>
    </div>
</div>

<div class="page-data">
    <section class="event-main">
        <div class="w-layout-blockcontainer container w-container">
            <div class="event-wrap">
                <div class="event-left">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="event-main-img mb-50">
                            <?php the_post_thumbnail('large', ['class' => 'event-main-image']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="objective">
                        <div class="event-info w-richtext">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <div class="event-right">
                    <div class="event-info-wrap">
                        <?php if ($price): ?>
                        <div class="event-info-block">
                            <div class="date-title">
                                <div>Ticket Price: $<?php echo esc_html($price); ?> CAD</div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="event-info-block">
                            <div class="date-title">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/date.svg" loading="lazy" alt="Icon"/>
                                <div>Date & Time</div>
                            </div>
                            <div class="date-wrap">
                                <?php if ($formatted_date): ?>
                                    <div><?php echo esc_html($formatted_date); ?></div>
                                <?php endif; ?>
                                <?php if ($formatted_start || $formatted_end): ?>
                                    <div><?php echo trim("$formatted_start - $formatted_end"); ?> CST</div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ($venue): ?>
                        <div class="event-info-block location">
                            <div class="location-title">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/location-lite.svg" loading="lazy" alt="Icon"/>
                                <div>Venue</div>
                            </div>
                            <div class="location-text"><?php echo esc_html($venue); ?></div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($paypalProductId): ?>
                        <div id="paypal-container-<?php echo esc_attr($paypalProductId); ?>" class="event-info-block location"></div>
                        <script>
                            paypal.HostedButtons({
                                hostedButtonId: "<?php echo esc_js($paypalProductId); ?>",
                            }).render("#paypal-container-<?php echo esc_js($paypalProductId); ?>");
                        </script>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/faq'); ?>
</div>

<?php get_footer(); ?>