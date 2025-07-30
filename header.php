<?php
/**
 * The header for our theme
 *
 * @package Cleanop
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> data-wf-page="676d0005727d5a9dfb6cd8c2" data-wf-site="676d0005727d5a9dfb6cd8bb">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?>" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Inter:regular,500,600,700,800,900,italic"]
            }
        });
    </script>

    <script>
        !function(o, c) {
            var n = c.documentElement, t = " w-mod-";
            n.className += t + "js";
            ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch");
        }(window, document);
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class('body'); ?>>
<?php wp_body_open(); ?>
<?php 
    $set_header_bg = get_query_var('set_header_bg', false);
    if ($set_header_bg) {
        $header_bg_class = 'bg-color';
    } else {
        $header_bg_class = '';
    }
?>
<div class="page">
    <section class="header <?php echo esc_attr($header_bg_class); ?>">
        <div class="header-content-wrapper">
            <div data-animation="default" data-collapse="medium" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar w-nav">
                <div class="container w-container">
                    <div class="site-navigation">
                        <div class="logo-wrapper">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-block w-nav-brand">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" loading="lazy" alt="<?php bloginfo('name'); ?>" class="logo"/>
                            </a>
                        </div>

                        <nav role="navigation" class="nav-menu w-nav-menu">
                            <?php
                            // Get menu by location
                            $menu_location = 'primary';
                            $locations = get_nav_menu_locations();

                            if (isset($locations[$menu_location])) {
                                $menu = wp_get_nav_menu_object($locations[$menu_location]);
                                $menu_items = wp_get_nav_menu_items($menu->term_id);
                                $last_index = count($menu_items) - 1;

                                foreach ($menu_items as $index => $item) {
                                    echo '<a href="' . esc_url($item->url) . '" class="nav-link w-nav-link">' . esc_html($item->title) . '</a>';
                                    // Only add nav-dot if not the last item
                                    if ($index !== $last_index) {
                                        echo '<div class="nav-dot"></div>';
                                    }
                                }
                            }
                            ?>
                        </nav>

                        <div class="header-btn">
                            <div class="button-block">
                                <a href="/contact-us" class="button w-inline-block">
                                    <div class="button-text">Book an appointment</div>
                                </a>
                            </div>
                        </div>

                        <div class="menu-button bg-color w-nav-button">
                            <div class="menu-icon w-icon-nav-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
