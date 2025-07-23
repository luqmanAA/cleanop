<?php
/**
 * The template for displaying the footer
 */
?>

<section class="footer">
    <div class="section-gradient-wrap">
        <div class="shadow-gradient style2"></div>
    </div>
    <div class="w-layout-blockcontainer container w-container">
        <div class="top-footer">
            <div class="footer-flex">
                <div id="w-node-_38da9ead-aa0f-cd38-de72-d2315623f173-5623f16d" class="footer-subscribe-box">
                    <!-- <div class="logo-wrapper">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-block w-nav-brand">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-white.svg'); ?>" loading="lazy" alt="Logo" class="logo" />
                        </a>
                    </div> -->
                    <div class="footer-info-box">
                        <div class="footer-title-box">
                            <div class="footer-title">Subscribe to our newsletter</div>
                        </div>
                    </div>
                    <div class="footer-form-box">
                        <div class="footer-form-block w-form">
                            <form id="subscribe-form" name="email-form" method="get" class="footer-form">
                                <input class="footer-field w-input" maxlength="256" name="email" placeholder="Email address" type="email" id="subscribe-email" required />
                                <div class="footer-custom-button">
                                    <input type="submit" class="footer-submit-button w-button" value="" />
                                </div>
                            </form>
                            <div class="success-message w-form-done">
                                <div class="success-message-text">Thank you! Your submission has been received!</div>
                            </div>
                            <div class="error-message w-form-fail">
                                <div class="error-message-text">Oops! Something went wrong while submitting the form.</div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-social-box">
                        <div class="social-item-wrap">
                            <?php
                            // Get menu by location
                            $menu_location = 'footer-social';
                            $locations = get_nav_menu_locations();

                            if (isset($locations[$menu_location])) {
                                $menu = wp_get_nav_menu_object($locations[$menu_location]);
                                $menu_items = wp_get_nav_menu_items($menu->term_id);
                                $last_index = count($menu_items) - 1;

                                foreach ($menu_items as $index => $item) {
                                    echo '<a href="' . esc_url($item->url) . '" class="social-item w-inline-block" target="_blank"><div class="footer-link">' . esc_html($item->title) . '</div></a>';
                                    if ($index !== $last_index) {
                                        echo '<div class="social-item-separate"></div>';
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="footer-grid">
                    <div class="footer-nav-wrap">
                        <div class="footer-title-box">
                            <div class="footer-title">Useful link</div>
                        </div>
                        <div class="footer-nav-box">

                            <?php
                            // Get menu by location
                            $menu_location = 'primary';
                            $locations = get_nav_menu_locations();

                            if (isset($locations[$menu_location])) {
                                $menu = wp_get_nav_menu_object($locations[$menu_location]);
                                $menu_items = wp_get_nav_menu_items($menu->term_id);
                                $last_index = count($menu_items) - 1;

                                foreach ($menu_items as $index => $item) {
                                    echo '<a href="' . esc_url($item->url) . '" class="footer-link">' . esc_html($item->title) . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="footer-nav-wrap">
                        <div class="footer-title-box">
                            <div class="footer-title"><strong>Utility pages</strong></div>
                        </div>
                        <div class="footer-nav-box">
                            <?php
                            // Get menu by location
                            $menu_location = 'footer-secondary';
                            $locations = get_nav_menu_locations();

                            if (isset($locations[$menu_location])) {
                                $menu = wp_get_nav_menu_object($locations[$menu_location]);
                                $menu_items = wp_get_nav_menu_items($menu->term_id);
                                $last_index = count($menu_items) - 1;

                                foreach ($menu_items as $index => $item) {
                                    echo '<a href="' . esc_url($item->url) . '" class="footer-link">' . esc_html($item->title) . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <div class="copyright-block">
                <!-- Uncomment if needed -->
                <!-- <div class="copyright-text">
                    <a href="/" class="footer-link">Cleanflow</a>
                    @ <?php echo date('Y'); ?> Powered by <a href="https://branderah.com" target="_blank" class="footer-link">Themetechmount</a>
                    powered by <a href="https://webflow.com/" target="_blank" class="footer-link">Webflow</a>
                </div> -->
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="<?php echo esc_url(get_template_directory_uri() . '/assets/js/scripts.js'); ?>" type="text/javascript"></script>

</body>
</html>
