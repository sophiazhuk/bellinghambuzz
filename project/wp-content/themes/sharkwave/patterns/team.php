<?php
/**
 * Title: Team
 * Slug: sharkwave/team
 * Categories: sharkwave
 * Keywords: team
 */
?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--20)"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}},"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="padding-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html__( 'Our Team', 'sharkwave' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"padding":{"bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns" style="padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":750,"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/about-1.jpg" alt="" class="wp-image-750" style="aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":748,"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/about-2.jpg" alt="" class="wp-image-748" style="aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":534,"aspectRatio":"3/4","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/about-1.jpg" alt="" class="wp-image-534" style="aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":86,"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/about-2.jpg" alt="" class="wp-image-86" style="aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}},"layout":{"type":"constrained","contentSize":"750px"}} -->
<div class="wp-block-group" style="padding-bottom:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"22px","lineHeight":"1.5"}},"fontFamily":"heading"} -->
<p class="has-text-align-center has-heading-font-family" style="font-size:22px;line-height:1.5"><?php echo esc_html__( 'Purus rutrum est ut cubilia dolor fames phasellus tempor amet. Integer suspendisse suscipit feugiat proin enim.', 'sharkwave' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Join Our Team', 'sharkwave' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->