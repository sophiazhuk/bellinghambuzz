<?php
/**
 * Plugin Name: Auto Populate Custom Posts
 * Description: A magic button that auto creates custom posts for every location entry.
 * Version: 1.0.0
 * Author: Sophia

 */

if (!defined('ABSPATH')) {
    exit;
}

function fetch_location_data() {
    global $wpdb;
    $table_name = 'restaurants';
    $query = "SELECT * FROM $table_name";
    return $wpdb->get_results($query, ARRAY_A);
}

function get_valid_time($time) {
    return (isset($time) && $time != "Monday Hours" && $time != "") ? date("g:i A", strtotime($time)) : 'Closed';
}

function create_location_posts() {
    $locations = fetch_location_data();

    foreach ($locations as $location) {
        $args = array(
            'post_type'  => 'locations2',
            'title'      => $location['name'],
            'posts_per_page' => 1
        );
        $existing_query = new WP_Query($args);

        if ($existing_query->have_posts()) {
            wp_reset_postdata();
            continue;
        }
        wp_reset_postdata();

        $post_data = array(
            'post_title'    => $location['name'],
            'post_content'  => $location['description'] . '<br><strong>Address:</strong> ' . $location['street_address'],
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'     => 'locations2'
        );

        $post_id = wp_insert_post($post_data);

        if ($post_id) {
            assign_location_categories($post_id, $location);

            $days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
            foreach ($days as $day) {
                update_post_meta($post_id, "{$day}_open", get_valid_time($location["{$day}_open"]));
                update_post_meta($post_id, "{$day}_close", get_valid_time($location["{$day}_close"]));
                update_post_meta($post_id, "happy_hour_{$day}_start", get_valid_time($location["happy_hour_{$day}_start"]));
                update_post_meta($post_id, "happy_hour_{$day}_end", get_valid_time($location["happy_hour_{$day}_end"]));
                    update_post_meta($post_id, 'street_address', $location['street_address']);

            }
        }
    }
}

function assign_location_categories($post_id, $location) {
    $taxonomy_mappings = array(
        'approved_by'            => 'approved_by',
        'type'                   => 'location_type',
        'lowkey_vs_poppin'       => 'lowkey_vs_poppin',
        'sit_relax_vs_up_moving' => 'sit_relax_vs_up_moving',
        'price'                  => 'price',
        'adults_only'            => 'adults_only',
        'dogs_allowed'           => 'dogs_allowed',
        'outdoor_seating_area'   => 'outdoor_seating',
        'bring_parents_here'     => 'bring_parents',
        'accessible'             => 'accessible'
    );

    foreach ($taxonomy_mappings as $db_field => $taxonomy) {
        if (!empty($location[$db_field])) {
            $term = is_numeric($location[$db_field]) ? ($location[$db_field] == 1 ? 'Yes' : 'No') : $location[$db_field];
            wp_set_object_terms($post_id, $term, $taxonomy, false);
        }
    }
}

add_action('init', 'register_locations2_post_type');
function register_locations2_post_type() {
    register_post_type('locations2', array(
        'labels' => array(
            'name'          => __('Locations 2'),
            'singular_name' => __('Location'),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-location',
        'supports'      => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite'       => array('slug' => 'locations2', 'with_front' => false),
    ));
}

register_activation_hook(__FILE__, 'locations2_flush_rewrite_rules');
function locations2_flush_rewrite_rules() {
    register_locations2_post_type();
    flush_rewrite_rules();
}

add_action('init', 'register_location_taxonomies');
function register_location_taxonomies() {
    $taxonomies = array(
        'approved_by'            => 'Approved By',
        'location_type'          => 'Type',
        'lowkey_vs_poppin'       => 'Lowkey vs Poppin',
        'sit_relax_vs_up_moving' => 'Sit & Relax vs Up & Moving',
        'price'                  => 'Price',
        'adults_only'            => 'Adults Only',
        'dogs_allowed'           => 'Dogs Allowed',
        'outdoor_seating'        => 'Outdoor Seating',
        'bring_parents'          => 'Bring Parents Here',
        'accessible'             => 'Accessible'
    );

    foreach ($taxonomies as $taxonomy_key => $taxonomy_label) {
        register_taxonomy($taxonomy_key, 'locations2', array(
            'label'        => __($taxonomy_label),
            'rewrite'      => array('slug' => $taxonomy_key),
            'hierarchical' => true
        ));
    }
}

add_action('admin_menu', 'locations2_admin_menu');
function locations2_admin_menu() {
    add_menu_page(
        'Populate Locations 2',
        'Populate Locations 2',
        'manage_options',
        'populate_locations2',
        'populate_location_posts_callback',
        'dashicons-location',
        20
    );
}

function populate_location_posts_callback() {
    if (isset($_POST['populate_locations2'])) {
        create_location_posts();
        echo '<div class="updated"><p>Locations populated successfully!</p></div>';
    }
    echo '<form method="post">
        <input type="submit" name="populate_locations2" value="Populate Locations 2" class="button button-primary">
    </form>';
}
