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

                <div class="footer-grid">
                    <div class="footer-nav-wrap">
                        <div class="footer-title-box">
                            <div class="footer-title">Social Links</div>
                        </div>
                        <div class="footer-nav-box">

                            <?php
                            // Get menu by location
                            $menu_location = 'footer-social';
                            $locations = get_nav_menu_locations();

                            if (isset($locations[$menu_location])) {
                                $menu = wp_get_nav_menu_object($locations[$menu_location]);
                                $menu_items = wp_get_nav_menu_items($menu->term_id);
                                $last_index = count($menu_items) - 1;

                                foreach ($menu_items as $index => $item) {
                                    $icon_class = !empty($item->classes) ? implode(' ', array_filter($item->classes)) : '';
                                    echo '<a href="' . esc_url($item->url) . '" class="footer-link fs-14" target="_blank">';
                                    echo '<div>';
                                    if ($icon_class) {
                                        echo '<i class="mr-10 ' . esc_attr($icon_class) . '"></i>';
                                    }
                                    echo esc_html($item->title);
                                    echo '</div>';
                                    echo '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="footer-nav-wrap">
                        <div class="footer-title-box">
                            <div class="footer-title">Quick Links</div>
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

                </div>
            </div>
        </div>

        <div class="bottom-footer">
            <div class="copyright-block">
                <!-- Uncomment if needed -->
                <div class="copyright-text">
                    <a href="/" class="footer-link">Cypress Window Cleaning</a>
                    @ <?php echo date('Y'); ?>. Powered by <a href="https://branderah.com" target="_blank" class="footer-link">Branderah</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="<?php echo esc_url(get_template_directory_uri() . '/assets/js/scripts.js'); ?>" type="text/javascript"></script>

    <?php
        $thank_you_path = trim(get_theme_mod('global_thank_you_page_url'));

        if (!empty($thank_you_path)) :
        ?>
        <script>
            document.addEventListener('wpcf7mailsent', function(event) {
                setTimeout(() => {
                    location.href = <?php echo json_encode(esc_url(home_url($thank_you_path))); ?>;
                }, 1000); // Redirect after 1 second
            }, false);
        </script>
    <?php endif; ?>

</body>
</html>
