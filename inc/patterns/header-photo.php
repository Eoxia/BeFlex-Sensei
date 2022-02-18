<?php
/**
 * Header photo
 */

return array(
	'title'      => esc_html__( 'Header with background banner', 'beflex' ),
	'categories' => array( 'header' ),
	'keywords'   => array( 'beflex', 'header' ),
	'content'    => '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( 'assets/images/banner.jpg' ) ) . '","id":20,"hasParallax":true,"dimRatio":50,"isDark":false,"align":"full"} -->
					<div class="wp-block-cover alignfull is-light has-parallax" style="background-image:url(' . esc_url( get_theme_file_uri( 'assets/images/banner.jpg' ) ) . ')"><span aria-hidden="true" class="wp-block-cover__gradient-background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","layout":{"inherit":true}} -->
					<div class="wp-block-group has-white-color has-text-color has-link-color"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between","flexWrap":"wrap"}} -->
					<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
					<div class="wp-block-group"><!-- wp:site-logo {"width":50,"className":"is-style-default"} /-->

					<!-- wp:group -->
					<div class="wp-block-group"><!-- wp:site-title {"textColor":"galaxy"} /-->

					<!-- wp:site-tagline /--></div>
					<!-- /wp:group --></div>
					<!-- /wp:group -->

					<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
					<div class="wp-block-group"><!-- wp:navigation {"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"right","orientation":"horizontal"},"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} /--></div>
					<!-- /wp:group --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group -->

					<!-- wp:spacer {"height":250} -->
					<div style="height:250px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->

					<!-- wp:group {"layout":{"inherit":true}} -->
					<div class="wp-block-group"><!-- wp:post-title {"textAlign":"center","level":1,"textColor":"white"} /-->

					<!-- wp:separator {"color":"white","className":"is-style-default"} -->
					<hr class="wp-block-separator has-text-color has-background has-white-background-color has-white-color is-style-default"/>
					<!-- /wp:separator -->

					</div>
					<!-- /wp:group -->

					<!-- wp:spacer {"height":40} -->
					<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer --></div></div>
					<!-- /wp:cover -->',
);
