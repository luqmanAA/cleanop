<?php
function setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('editor-styles');
    add_theme_support('page-templates');
}
add_action('after_setup_theme', 'setup');

function register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cleanop'),
        'footer' => __('Footer Menu', 'cleanop'),
        'footer-social' => __('Footer Socials', 'cleanop'),
    ));
}
add_action('after_setup_theme', 'register_menus');


function register_cpts() {
    $types = ['faq', 'partner', 'portfolio', 'service', 'team', 'testimonial'];

    foreach ($types as $type) {
        switch ($type) {
            case 'faq':
                $menu_icon = 'dashicons-editor-help';
                break;
            case 'partner':
                $menu_icon = 'dashicons-groups';
                break;
            case 'portfolio':
                $menu_icon = 'dashicons-portfolio';
                break;
            case 'service':
                $menu_icon = 'dashicons-admin-page';
                break;
             case 'testimonial':
                $menu_icon = 'dashicons-format-quote';
                break;
            case 'team':
                $menu_icon = 'dashicons-groups';
                break;
            default:
                $menu_icon = 'dashicons-admin-post';
        }
        $plural_type = $type . 's';
        register_post_type($type, [
            'labels' => [
                'name' => ucfirst($plural_type),
                'singular_name' => ucfirst($type),
                'add_new_item' => 'Add ' . ucfirst($type),
                'edit_new_item' => 'Edit ' . ucfirst($type),
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'post-formats', 'revisions'],
            'rewrite' => ['slug' => $plural_type],
            'show_in_nav_menus' => true,
            // 'show_in_rest' => true,
            'can_export' => true,
            'menu_icon' => $menu_icon,
        ]);
        if (in_array($type, ['portfolio'])) {
            register_taxonomy_for_object_type('category', $type);
        }
    }
}
add_action('init', 'register_cpts');

function enqueue_scripts() {
    // wp_enqueue_style('accornweb-style', get_stylesheet_uri());
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_scripts');

function custom_page_blocks_meta_box() {
    add_meta_box(
        'page_blocks_meta',                  // ID
        'Page Template Blocks',              // Title
        'render_page_blocks_meta_box',       // Callback
        'page',                              // Post type
        'side',                              // Context (side column)
        'default'                            // Priority
    );
}
add_action('add_meta_boxes', 'custom_page_blocks_meta_box');

function render_page_blocks_meta_box($post) {
    // Use nonce for security
    wp_nonce_field('save_page_blocks_meta', 'page_blocks_meta_nonce');

    // Get saved values
    $posts = get_post_meta($post->ID, '_include_posts', true);
    ?>
    <p>
        <label>
            <input type="checkbox" name="include_posts" value="1" <?php checked($posts, '1'); ?>>
            Include Posts Block
        </label>
    </p>
<?php
}

function save_page_blocks_meta($post_id) {
    // Security checks
    if (!isset($_POST['page_blocks_meta_nonce']) || !wp_verify_nonce($_POST['page_blocks_meta_nonce'], 'save_page_blocks_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!current_user_can('edit_page', $post_id)) return;

    // Save each checkbox
    update_post_meta($post_id, '_include_posts', isset($_POST['include_posts']) ? '1' : '');
}
add_action('save_post', 'save_page_blocks_meta');


function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['avif'] = 'image/avif';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');


function add_service_svg_upload_meta_box() {
    add_meta_box(
        'service_svg_upload_meta_box',
        'Service Icons (SVG Files) & Image',
        'render_service_svg_upload_meta_box',
        'service',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_service_svg_upload_meta_box');

function render_service_svg_upload_meta_box($post) {
    wp_nonce_field('save_service_svg_upload_meta_box', 'service_svg_upload_meta_box_nonce');

    $svg1_id = get_post_meta($post->ID, '_service_svg_icon_id', true);
    $svg2_id = get_post_meta($post->ID, '_service_svg_icon_id_2', true);
    $img_id  = get_post_meta($post->ID, '_service_image_id', true); // new image field

    $svg1_url = $svg1_id ? wp_get_attachment_url($svg1_id) : '';
    $svg2_url = $svg2_id ? wp_get_attachment_url($svg2_id) : '';
    $img_url  = $img_id  ? wp_get_attachment_url($img_id)  : '';
    ?>

    <p>
        <label><strong>Upload SVG Icon (Light Version):</strong></label><br>
        <input type="hidden" name="service_svg_icon_id" id="service_svg_icon_id_1" value="<?php echo esc_attr($svg1_id); ?>">
        <input type="button" class="button button-secondary upload_svg_button" data-target="1" value="Upload SVG 1">
        <div id="svg-preview-1" style="margin-top:10px;">
            <?php if ($svg1_url): ?>
                <p><strong>Current SVG 1:</strong></p>
                <img src="<?php echo esc_url($svg1_url); ?>" style="max-width:150px;">
            <?php endif; ?>
        </div>
    </p>

    <p>
        <label><strong>Upload SVG Icon (Dark Version):</strong></label><br>
        <input type="hidden" name="service_svg_icon_id_2" id="service_svg_icon_id_2" value="<?php echo esc_attr($svg2_id); ?>">
        <input type="button" class="button button-secondary upload_svg_button" data-target="2" value="Upload SVG 2">
        <div id="svg-preview-2" style="margin-top:10px;">
            <?php if ($svg2_url): ?>
                <p><strong>Current SVG 2:</strong></p>
                <img src="<?php echo esc_url($svg2_url); ?>" style="max-width:150px;">
            <?php endif; ?>
        </div>
    </p>

    <p>
        <label><strong>Upload Regular Image (PNG, JPG, etc):</strong></label><br>
        <input type="hidden" name="service_image_id" id="service_image_id" value="<?php echo esc_attr($img_id); ?>">
        <input type="button" class="button button-secondary upload_image_button" value="Upload Image">
        <div id="image-preview" style="margin-top:10px;">
            <?php if ($img_url): ?>
                <p><strong>Current Image:</strong></p>
                <img src="<?php echo esc_url($img_url); ?>" style="max-width:150px;">
            <?php endif; ?>
        </div>
    </p>

    <script>
    jQuery(document).ready(function($) {
        $('.upload_svg_button').click(function(e) {
            e.preventDefault();
            const target = $(this).data('target');
            let frame = wp.media({
                title: 'Select or Upload SVG',
                button: { text: 'Use this SVG' },
                multiple: false
            });
            frame.on('select', function() {
                let attachment = frame.state().get('selection').first().toJSON();
                if (attachment.subtype !== 'svg+xml') {
                    alert('Please select a valid SVG file.');
                    return;
                }
                $('#service_svg_icon_id_' + target).val(attachment.id);
                $('#svg-preview-' + target).html('<p><strong>Current SVG ' + target + ':</strong></p><img src="'+attachment.url+'" style="max-width:150px;">');
            });
            frame.open();
        });

        $('.upload_image_button').click(function(e) {
            e.preventDefault();
            let frame = wp.media({
                title: 'Select or Upload Image',
                button: { text: 'Use this image' },
                multiple: false
            });
            frame.on('select', function() {
                let attachment = frame.state().get('selection').first().toJSON();
                if (!['image/png', 'image/jpeg', 'image/jpg', 'image/webp'].includes(attachment.mime)) {
                    alert('Please select a valid image file (JPG, PNG, WebP).');
                    return;
                }
                $('#service_image_id').val(attachment.id);
                $('#image-preview').html('<p><strong>Current Image:</strong></p><img src="'+attachment.url+'" style="max-width:150px;">');
            });
            frame.open();
        });
    });
    </script>
    <?php
}

function save_service_svg_upload_meta_box($post_id) {
    if (!isset($_POST['service_svg_upload_meta_box_nonce']) || !wp_verify_nonce($_POST['service_svg_upload_meta_box_nonce'], 'save_service_svg_upload_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['service_svg_icon_id'])) {
        update_post_meta($post_id, '_service_svg_icon_id', intval($_POST['service_svg_icon_id']));
    }

    if (isset($_POST['service_svg_icon_id_2'])) {
        update_post_meta($post_id, '_service_svg_icon_id_2', intval($_POST['service_svg_icon_id_2']));
    }

    if (isset($_POST['service_image_id'])) {
        update_post_meta($post_id, '_service_image_id', intval($_POST['service_image_id']));
    }
}
add_action('save_post_service', 'save_service_svg_upload_meta_box');

add_filter('wpcf7_autop_or_not', '__return_false');

function allow_menu_html_icons($item_output, $item, $depth, $args) {
    // Remove escaping so HTML in Navigation Label is rendered
    return $args->before . $item->title . $args->after;
}
add_filter('walker_nav_menu_start_el', 'allow_menu_html_icons', 10, 4);


function mytheme_customize_register($wp_customize) {
    // Add section
    $wp_customize->add_section('global_settings_section', [
        'title'    => __('Global Settings', 'mytheme'),
        'priority' => 30,
    ]);

    // Add setting for global contact form shortcode
    $wp_customize->add_setting('global_contact_form_shortcode', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    // Add control for contact form shortcode
    $wp_customize->add_control('global_contact_form_shortcode', [
        'label'       => __('Default Contact Form 7 Shortcode', 'mytheme'),
        'section'     => 'global_settings_section',
        'type'        => 'text',
        'input_attrs' => [
            'placeholder' => '[contact-form-7 id="123" title="Contact form"]',
        ],
    ]);

    // Add setting for Thank You page URL
    $wp_customize->add_setting('global_thank_you_page_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);

    // Add control for Thank You page
    $wp_customize->add_control('global_thank_you_page_url', [
        'label'       => __('Thank You Page URL', 'mytheme'),
        'section'     => 'global_settings_section',
        'type'        => 'url',
        'input_attrs' => [
            'placeholder' => '/thank-you',
        ],
    ]);

    // Add setting for Facebook URL
    $wp_customize->add_setting('global_facebook_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);

    // Add control for Facebook URL
    $wp_customize->add_control('global_facebook_url', [
        'label'       => __('Facebook URL', 'mytheme'),
        'section'     => 'global_settings_section',
        'type'        => 'url',
        'input_attrs' => [
            'placeholder' => 'https://facebook.com/yourpage',
        ],
    ]);

    $wp_customize->add_setting('global_google_review_shortcode', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);

    $wp_customize->add_control('global_google_review_shortcode', [
        'label'       => __('Google Review Shortcode', 'mytheme'),
        'section'     => 'global_settings_section',
        'type'        => 'text',
        'input_attrs' => [
            'placeholder' => '[google-reviews]',
        ],
    ]);

}
add_action('customize_register', 'mytheme_customize_register');

add_action('template_redirect', function () {
    // Set the slug of the page you want to protect
    $restricted_slug = 'thank-you'; // Change to your actual slug

    if (is_page($restricted_slug)) {
        $referrer = wp_get_referer();
        $site_url = home_url();

        // If no referrer or referrer is not from this site
        if (empty($referrer) || strpos($referrer, $site_url) !== 0) {
            // Redirect to homepage or another page
            wp_redirect($site_url);
            exit;
        }
    }
});
