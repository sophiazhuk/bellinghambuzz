<?php
/**
 * Title: Contact Us
 * Slug: sharkwave/contact-us
 * Categories: sharkwave
 * Keywords: contact-us
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/about-1.jpg","id":86,"dimRatio":0,"customOverlayColor":"#7c6a52","isUserOverlayColor":true,"minHeight":700,"minHeightUnit":"px","style":{"border":{"radius":"10px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-radius:10px;min-height:700px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#7c6a52"></span><img class="wp-block-cover__image-background wp-image-86" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/about-1.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"className":"contact-form","layout":{"type":"constrained"}} -->
<div class="wp-block-group contact-form"><!-- wp:paragraph {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}}} -->
<p style="padding-bottom:var(--wp--preset--spacing--10)"><?php echo esc_html__( 'We are glad that you want to get in touch with us. If you have any questions comments or feedbacks please fill free to contact.', 'sharkwave' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Add yours from shortcode', 'sharkwave' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->