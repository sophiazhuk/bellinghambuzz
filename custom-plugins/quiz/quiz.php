<?php
/**
 * Plugin Name: Bellingham Buzz Quiz
 * Description: A quiz that recommends restaurants/bars based on preferences.
 * Version: 1.0.0
 * Author: Sophia
 */

if (!defined('ABSPATH')) {
    exit; 
}

function bb_enqueue_scripts() {
    wp_enqueue_style('bb-quiz-style', plugins_url('/style.css', __FILE__), array(), time()); // Force new CSS version
    wp_enqueue_script('bb-quiz-script', plugins_url('/quiz.js', __FILE__), array('jquery'), time(), true); // Force new JS version
    
    global $wpdb;
    $table = 'restaurants';
$restaurants = $wpdb->get_results("
    SELECT r.*, p.ID as post_id, p.post_name as post_slug, r.image as image_url
    FROM $table r 
    LEFT JOIN {$wpdb->prefix}posts p 
    ON r.name = p.post_title AND p.post_type = 'restaurant'
", ARRAY_A);



    wp_localize_script('bb-quiz-script', 'bb_restaurants', $restaurants);
}
add_action('wp_enqueue_scripts', 'bb_enqueue_scripts');

function bb_quiz_shortcode() {
    ob_start();
    ?>
    <div id="bb-quiz">
        <form id="bb-quiz-form">
            <?php
            $questions = [
                "open_tonight" => ["Do you want something <span class='styled'>open</span> tonight?", ["yes" => "Yes", "no" => "No"]],
                "indoor_outdoor" => ["Do you want to stay <span class='styled'>indoors</span> or <span class='styled'>outdoors</span>?", ["indoor" => "Indoors", "outdoor" => "Outdoors"]],
                "vibe" => ["Do you want a more <span class='styled'>Lowkey</span> or <span class='styled'>Poppin</span> vibe?", ["lowkey" => "Lowkey", "poppin" => "Poppin"]],
                "movement" => ["Do you want to <span class='styled'>Sit & Relax</span> vs <span class='styled'>Up & Moving</span>?", ["sit-relax" => "Sit & Relax", "up-moving" => "Up & Moving"]],
                "budget" => ["Do you want to stay on a <span class='styled'>budget</span> or are you feeling <span class='styled'>spendy</span>?", ["cheap" => "Budget", "expensive" => "Spendy"]],
                "adults_only" => ["Do you want to go somewhere that is <span class='styled'>21+</span>?", ["yes" => "Yes", "no" => "No"]],
                "bring_parents" => ["Are you bringing your <span class='styled'>parents</span> here?", ["yes" => "Yes", "no" => "No"]]
            ];

            foreach ($questions as $name => [$question, $options]) {
                echo "<div class='quiz-question' id='question-$name'>";
                echo "<h2>$question</h2>";
                echo "<div class='quiz-options'>";
                foreach ($options as $value => $label) {
                    echo "<button type='button' class='quiz-option' data-name='$name' data-value='$value'>";
                    echo "<img src='" . plugins_url("/images/$name-$value.png", __FILE__) . "' alt='$label' class='quiz-option-image'>";
                    echo "<span>$label</span>";
                    echo "</button>";
                                    }
                echo "</div>";
                echo "<input type='hidden' name='$name' value=''>";
                echo "</div>";
            }
            ?>
            <div id="results-placeholder">
                <button class="show-results" type="submit">Show Results</button>
            </div>
            <div id="top-match-container" class="top-match"></div>

        </form>
        <div id="bb-quiz-results"></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('bb_quiz', 'bb_quiz_shortcode');
?>
