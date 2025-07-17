<?php
function setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
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
    $volunteers = get_post_meta($post->ID, '_include_volunteers', true);
    $faq = get_post_meta($post->ID, '_include_faq', true);
    $posts = get_post_meta($post->ID, '_include_posts', true);
    ?>

    <p>
        <label>
            <input type="checkbox" name="include_volunteers" value="1" <?php checked($volunteers, '1'); ?>>
            Include Volunteer Block
        </label>
    </p>
    <p>
        <label>
            <input type="checkbox" name="include_faq" value="1" <?php checked($faq, '1'); ?>>
            Include FAQ Block
        </label>
    </p>
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
    update_post_meta($post_id, '_include_volunteers', isset($_POST['include_volunteers']) ? '1' : '');
    update_post_meta($post_id, '_include_faq', isset($_POST['include_faq']) ? '1' : '');
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
        'Service Icon (SVG File)',
        'render_service_svg_upload_meta_box',
        'service',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_service_svg_upload_meta_box');

function render_service_svg_upload_meta_box($post) {
    wp_nonce_field('save_service_svg_upload_meta_box', 'service_svg_upload_meta_box_nonce');
    $svg_id = get_post_meta($post->ID, '_service_svg_icon_id', true);
    $svg_url = $svg_id ? wp_get_attachment_url($svg_id) : '';

    ?>
    <p>
        <label for="service_svg_icon"><strong>Upload SVG Icon:</strong></label><br>
        <input type="hidden" name="service_svg_icon_id" id="service_svg_icon_id" value="<?php echo esc_attr($svg_id); ?>">
        <input type="button" class="button button-secondary" id="upload_svg_button" value="Upload SVG">
        <div id="svg-preview" style="margin-top:10px;">
            <?php if ($svg_url): ?>
                <p><strong>Current SVG:</strong></p>
                <img src="<?php echo esc_url($svg_url); ?>" alt="SVG Preview" style="max-width:150px;">
            <?php endif; ?>
        </div>
    </p>
    <script>
    jQuery(document).ready(function($) {
        $('#upload_svg_button').click(function(e) {
            e.preventDefault();
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
                $('#service_svg_icon_id').val(attachment.id);
                $('#svg-preview').html('<p><strong>Current SVG:</strong></p><img src="'+attachment.url+'" style="max-width:150px;">');
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
}
add_action('save_post_service', 'save_service_svg_upload_meta_box');
