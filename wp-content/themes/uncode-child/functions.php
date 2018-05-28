<?php
/**
 * uncode functions and definitions
 *
 * @package uncode
 */
$ok_php = true;
$ok_t_ch = true;

if (function_exists('phpversion')) {
    $php_version = phpversion();
    if (version_compare($php_version, '5.3.0') < 0)
        $ok_php = false;
}
if (!$ok_php && !is_admin()) {
    $title = esc_html__('PHP version obsolete', 'uncode');
    $html = '<h2>' . esc_html__('Ooops, obsolete PHP version', 'uncode') . '</h2>';
    $html .= '<p>' . sprintf(wp_kses('We have coded the Uncode theme to run with modern technology and we have decided not to support the PHP version 5.2.x just because we want to challenge our customer to adopt what\'s best for their interests.%sBy running obsolete version of PHP like 5.2 your server will be vulnerable to attacks since it\'s not longer supported and the last update was done the 06 January 2011.%sSo please ask your host to update to a newer PHP version for FREE.%sYou can also check for reference this post of WordPress.org <a href="https://wordpress.org/about/requirements/">https://wordpress.org/about/requirements/</a>', 'uncode', array('a' => 'href')), '</p><p>', '</p><p>', '</p><p>') . '</p>';

    wp_die($html, $title, array('response' => 403));
}


add_action('after_setup_theme', 'uncode_language_setup');

function uncode_language_setup() {
    load_child_theme_textdomain('uncode', get_stylesheet_directory() . '/languages');
}

function theme_enqueue_styles() {
    $production_mode = ot_get_option('_uncode_production');
    $resources_version = ($production_mode === 'on') ? null : rand();
    $parent_style = 'uncode-style';
    $child_style = array('uncode-custom-style');
    //wp_enqueue_style($parent_style, get_template_directory_uri() . '/library/css/style.css', array(), $resources_version);
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/css/style-child.css', $child_style, $resources_version);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Load elements partial.
 */
if ($ok_php)
    require_once get_stylesheet_directory() . '/partials/elements.php';

/**
 * uncode-child functions and definitions
 *
 * @package uncode-child
 */
if (!function_exists('custom_post_type_especialista')) {

// Register Custom Post Type
    function custom_post_type_especialista() {

        $labels = array(
            'name' => _x('Especialistas', 'Post Type General Name', 'text_domain'),
            'singular_name' => _x('Especialista', 'Post Type Singular Name', 'text_domain'),
            'menu_name' => __('Especialistas', 'text_domain'),
            'name_admin_bar' => __('Especialista', 'text_domain'),
            'archives' => __('Especialista', 'text_domain'),
            'parent_item_colon' => __('Especialista superior', 'text_domain'),
            'all_items' => __('Todos los especialistas', 'text_domain'),
            'add_new_item' => __('Añadir nuevo especialista', 'text_domain'),
            'add_new' => __('Añadir nuevo Especialista', 'text_domain'),
            'new_item' => __('Nuevo especialista', 'text_domain'),
            'edit_item' => __('Editar especialista', 'text_domain'),
            'update_item' => __('Actualizar especialista', 'text_domain'),
            'view_item' => __('Ver especialista', 'text_domain'),
            'search_items' => __('Buscar especialista', 'text_domain'),
            'not_found' => __('Not found', 'text_domain'),
            'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
            'featured_image' => __('Imagen destacada', 'text_domain'),
            'set_featured_image' => __('Añadir imagen destacada', 'text_domain'),
            'remove_featured_image' => __('Quitar Imagen destacada', 'text_domain'),
            'use_featured_image' => __('Usar como Imagen destacada', 'text_domain'),
            'insert_into_item' => __('Insert into item', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list' => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list' => __('Filter items list', 'text_domain'),
        );
        $args = array(
            'label' => __('Especialista', 'text_domain'),
            'description' => __('Especialista', 'text_domain'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'post-formats',),
            'taxonomies' => array('category', 'post_tag'),
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('especialista', $args);
    }

    add_action('init', 'custom_post_type_especialista', 0);
}

/**
 * Proper way to enqueue scripts and styles.
 */
function uncode_child_scripts() {
    wp_enqueue_script('ini', get_stylesheet_directory_uri() . '/js/ini.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'uncode_child_scripts');




/** Dynamic List for Contact Form 7 * */

/** Usage: [select name term:taxonomy_name] * */
function dynamic_select_list($tag, $unused) {
    $options = (array) $tag['options'];

    foreach ($options as $option)
        if (preg_match('%^term:([-0-9a-zA-Z_]+)$%', $option, $matches))
            $term = $matches[1];

    //check if post_type is set
    if (!isset($term))
        return $tag;

    $taxonomy = get_terms(array('taxonomy' => "category", 'hide_empty' => false, 'parent' => $term));

    if (!$taxonomy)
        return $tag;

    $tag['raw_values'][] = '';
    $tag['values'][] = '';
    $tag['labels'][] = 'Seleccione';

    foreach ($taxonomy as $cat) {
        $tag['raw_values'][] = esc_attr($cat->name);
        $tag['values'][] = esc_attr($cat->term_id);
        $tag['labels'][] = esc_attr($cat->name);
    }

//    $tag['raw_values'][] = 'Other';
//    $tag['values'][] = 'Other';
//    $tag['labels'][] = 'Other - Please Specify Below';

    return $tag;
}

add_filter('wpcf7_form_tag', 'dynamic_select_list', 10, 2);


/**
 * Ajax select especialista landing page.
 */
add_action('wp_enqueue_scripts', 'uncode_child_landing_select_ajax');

function uncode_child_landing_select_ajax() {
//	if (!is_home()) return;
    //wp_enqueue_script('ini', get_stylesheet_directory_uri() . '/js/select-ajax.js', array(), '1.0.0', true);
    wp_register_script('uc_landing_select_ajax', get_stylesheet_directory_uri() . '/js/select-ajax.js', array('jquery'), '1', true);
    wp_enqueue_script('uc_landing_select_ajax');

    wp_localize_script('uc_landing_select_ajax', 'uc_vars', ['ajaxurl' => admin_url('admin-ajax.php')]);
}

add_action('wp_ajax_loadspecialists', 'uncode_child_loadspecialists_ajax_handler');
add_action('wp_ajax_nopriv_loadspecialists', 'uncode_child_loadspecialists_ajax_handler');

function uncode_child_loadspecialists_ajax_handler() {

    // prepare our arguments for the query
    $params['cat'] = $_POST['id_post']; // we need next page to be loaded
    $params['post_type'] = 'especialista';

    $posts = new WP_Query($params);

    if (!$posts->have_posts()) {
        //get_template_part('content', 'none');
        echo '<option>NO hay especialistas</option>';
    } else {
        while ($posts->have_posts()) {
            $posts->the_post();
//            $posts->the_post();
//            get_template_part('content', get_post_format());
            ?>
            <option value="<?php echo esc_url( post_permalink() ); ?>">
                <?php the_title(); ?>
            </option>
            <?php
        }
        wp_reset_postdata();
    }

    die();
}

