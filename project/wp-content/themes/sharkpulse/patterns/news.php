<?php
/**
 * Title:Latest News
 * Slug: sharkpulse/news
 * Categories: sharkpulse
 * Keywords: blog
 */
?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<main class="wp-block-group has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--20)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"center","style":{"color":{"text":"#6467ec"},"elements":{"link":{"color":{"text":"#6467ec"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
<p class="has-text-align-center has-text-color has-link-color" style="color:#6467ec;font-style:normal;font-weight:600"><?php echo esc_html__( 'Blog', 'sharkpulse' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"75%"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700","fontSize":"42px","letterSpacing":"1px","lineHeight":"1.3"}},"fontFamily":"body"} -->
<h2 class="wp-block-heading has-text-align-center has-body-font-family" style="font-size:42px;font-style:normal;font-weight:700;letter-spacing:1px;line-height:1.3"><?php echo esc_html__( 'Read Our Latest News', 'sharkpulse' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"84%"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}},"typography":{"fontSize":"16px","fontStyle":"normal","fontWeight":"400"}},"textColor":"contrast-2"} -->
<p class="has-text-align-center has-contrast-2-color has-text-color has-link-color" style="font-size:16px;font-style:normal;font-weight:400"><?php echo esc_html__( 'Phasellus nec sem in justo pellentesque facilisis. Morbi mollis tellus ac sapien. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Fusce a quam. Duis lobortis massa imperdiet quam.', 'sharkpulse' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":26,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"0px"}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|10","left":"var:preset|spacing|10"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--10)"><!-- wp:post-date {"isLink":true,"style":{"elements":{"link":{"color":{"text":"#288f04"}}},"color":{"text":"#288f04"},"typography":{"fontStyle":"normal","fontWeight":"600"}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"21px"}},"fontFamily":"body"} /-->

<!-- wp:post-excerpt {"excerptLength":15} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></main>
<!-- /wp:group -->