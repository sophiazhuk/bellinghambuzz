<?php
    echo do_blocks('<!-- wp:template-part {"slug":"header","tagName":"header"} /-->');
    get_header();
?>

<?php
function format_time_12hr($time) {
    if (!$time || $time == "Closed" || $time == "N/A") return "Closed";
    return date("g:i A", strtotime($time));
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
    @media screen and (max-width: 768px) {
    .location-container {
        padding: 0 18px !important;
    }   
    .location-content {
        flex-direction: column !important;
    }

    .location-left,
    .location-right {
        min-width: 100% !important;
    }
}
</style>
<div class="location-container">
    <div class="location-header">
        <h1 class="location-title"><?php the_title(); ?></h1>
    </div>

    <div class="location-content">
        
        <!-- Left Column -->
        <div class="location-left">
            <?php
            $image_id = get_post_meta(get_the_ID(), 'location_image', true);
            $image_url = $image_id ? wp_get_attachment_url($image_id) : '';

            if ($image_url) {
                echo '<div class="location-image"><img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '"></div>';
            } elseif (has_post_thumbnail()) {
                echo '<div class="location-image">';
                the_post_thumbnail('large');
                echo '</div>';
            }
            ?>

            <div class="location-meta">
                <div class="loc-type bubble"><?php echo get_the_terms(get_the_ID(), 'location_type')[0]->name ?? 'N/A'; ?></div>

                <?php
$approved_by = get_the_terms(get_the_ID(), 'approved_by')[0]->name ?? 'N/A';
$border_color = '#000'; 
if ($approved_by === 'Kiley') {
    $border_color = '#FFC700';
} elseif ($approved_by === 'Maya') {
    $border_color = '#c02bff';
} elseif ($approved_by === 'Sophia') {
    $border_color = '#442bff';
}
?>
<?php if (!empty($approved_by) && $approved_by !== 'N/A'): ?>
    <div class="loc-approved bubble" style="border-color: <?php echo $border_color; ?>;"><?php echo $approved_by; ?>'s Pick</div>
<?php endif; ?>
                <div class="loc-price bubble">
                    <?php
                    $price_term = get_the_terms(get_the_ID(), 'price')[0]->name ?? 'N/A';
                
                    if ($price_term === 'cheap') {
                        echo '<span class="white-dollar">$</span><span class="gray-dollar">$</span><span class="gray-dollar">$</span><span class="gray-dollar">$</span>';
                    } elseif ($price_term === 'expensive') {
                        echo '<span class="white-dollar">$</span><span class="white-dollar">$</span><span class="white-dollar">$</span><span class="gray-dollar">$</span>';
                    } else {
                        echo $price_term; 
                    }
                    ?>
                </div>
                <div class="loc-21plus bubble">
                    <?php
                    $adults_only = get_the_terms(get_the_ID(), 'adults_only')[0]->name ?? 'N/A';
                    echo ($adults_only === 'Yes') ? '21+' : 'All Ages';
                    ?>
                </div>
                <div class="loc-vibe bubble">
                    <?php
                    $vibe = get_the_terms(get_the_ID(), 'lowkey_vs_poppin')[0]->name ?? 'N/A';
                    echo ($vibe === 'lowkey') ? 'Lowkey' : 'Poppin';
                    ?>
                </div>
                <div class="loc-active bubble">
                    <?php
                    $active = get_the_terms(get_the_ID(), 'sit_relax_vs_up_moving')[0]->name ?? 'N/A';
                    echo ($active === 'sit-relax') ? 'Sit Down' : 'Up & Movin';
                    ?>
                </div>
            </div>

            <div class="location-description">
                <?php the_content(); ?>
            </div>

            <?php
            global $wpdb;
$post_title = html_entity_decode(wp_specialchars_decode(get_the_title(), ENT_QUOTES));

            
$restaurant = $wpdb->get_row($wpdb->prepare("
    SELECT * FROM restaurants WHERE REPLACE(name, \"’\", \"'\") = REPLACE(%s, \"’\", \"'\")", $post_title
), ARRAY_A);


            
            if ($restaurant) :
            ?>

            <?php endif; ?>

        </div>

        <!-- Right Column -->
        <div class="location-right">




                <div class="restaurant-info">
                    <h3>Restaurant Details</h3>
                        <ul>
                            <li><strong>Is it wheelchair accessible?</strong> <?php echo isset($restaurant['accessible']) && $restaurant['accessible'] == 1 ? 'Yes' : 'No'; ?></li>
                            <li><strong>Can you bring your dog?</strong> <?php echo isset($restaurant['dogs_allowed']) && $restaurant['dogs_allowed'] == 1 ? 'Yes' : 'No'; ?></li>
                            <li><strong>Does this place have a happy hour?</strong> <?php echo isset($restaurant['happy_hour']) && $restaurant['happy_hour'] == 1 ? 'Yes' : 'No'; ?></li>
                            <li><strong>Is there outdoor seating?</strong> <?php echo isset($restaurant['outdoor_seating_area']) && $restaurant['outdoor_seating_area'] == 1 ? 'Yes' : 'No'; ?></li>
                        </ul>
                </div>
                <div class="info-buttons">
                    <?php if (!empty($restaurant['website'])): ?>
                            <a href="<?php echo esc_url($restaurant['website']); ?>" target="_blank" class="visit-website-button">Visit Website</a>
                
                    <?php endif; ?>
                    
                    <?php if (!empty($restaurant['street_address'])): ?>
                            <a href="https://www.google.com/maps/search/?api=1&query=<?php echo urlencode($restaurant['street_address']); ?>" 
                               target="_blank" 
                               class="directions-button">
                                Get Directions
                            </a>
                    <?php endif; ?>
                </div>
                
                <div class="location-hours">
                <h3>Opening Hours</h3>
                <table class="hours-table">
                    <tr><th>Day</th><th>Hours</th></tr>
                    <?php
                    $days = ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"];
                    foreach ($days as $day) {
                        $open = isset($restaurant[$day . '_open']) && !empty($restaurant[$day . '_open']) ? date("g:i A", strtotime($restaurant[$day . '_open'])) : 'Closed';
                        $close = isset($restaurant[$day . '_close']) && !empty($restaurant[$day . '_close']) ? date("g:i A", strtotime($restaurant[$day . '_close'])) : 'Closed';
                        
                        echo "<tr><td>" . ucfirst($day) . "</td><td>" . (($open === 'Closed' || $close === 'Closed') ? 'Closed' : "$open - $close") . "</td></tr>";
                    }
                    ?>
                </table>
            </div>

<?php
get_footer();
?>
