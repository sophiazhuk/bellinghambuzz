<?php
/**
 * Plugin Name: I'm Feelin' Lucky
 * Description: A random restaurant selector for Bellingham Buzz.
 * Version: 1.0.0
 * Author: Sophia
 */

if (!defined('ABSPATH')) {
    exit;
}

function lucky_enqueue_scripts() {
    wp_enqueue_style('lucky-style', plugins_url('/lucky-style.css', __FILE__), array(), time()); // Force new CSS version
    wp_enqueue_script('lucky-script', plugins_url('/lucky.js', __FILE__), array('jquery'), time(), true); // Force new JS version
    
    global $wpdb;
    $table = 'restaurants';
$restaurants = $wpdb->get_results("
    SELECT r.*, p.ID as post_id, p.post_name as post_slug, r.image as image_url
    FROM $table r 
    LEFT JOIN {$wpdb->prefix}posts p 
    ON r.name = p.post_title AND p.post_type = 'restaurant'
", ARRAY_A);


foreach ($restaurants as &$restaurant) {
    $slug = !empty($restaurant['post_slug']) 
        ? $restaurant['post_slug'] 
        : sanitize_title($restaurant['name']); // WordPress function to properly generate slugs

    $restaurant['post_url'] = "https://thebellinghambuzz.com/locations2/" . $slug;
}



wp_localize_script('lucky-script', 'lucky_restaurants', $restaurants);

}
add_action('wp_enqueue_scripts', 'lucky_enqueue_scripts');

function lucky_shortcode() {
    ob_start();
    ?>
    <div id="lucky-container">

        <div id="lucky-results" class="top-match"></div>
		        <button id="lucky-reroll">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
				<polyline points="23 4 23 10 17 10"></polyline>
				<polyline points="1 20 1 14 7 14"></polyline>
				<path d="M3.51 9a9 9 0 0 1 13.66-4L23 10"></path>
				<path d="M20.49 15a9 9 0 0 1-13.66 4L1 14"></path>
			</svg>
			Reroll
		</button>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('im_feelin_lucky', 'lucky_shortcode');
?>
