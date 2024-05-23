<?php
/**
 * Default course tempalte for Sensei LMS
 */

return array(
	'title'      => esc_html__( 'BFS Sensei - course template', 'beflex' ),
	'blockTypes'  => array( 'sensei-lms/post-content' ),
	'categories' => array( 'sensei-lms' ),
	'keywords'   => array( 'beflex', 'header' ),
	'content'     => '<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
<h2 class="wp-block-heading">Sous-titre</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at tempus est. Suspendisse placerat elit auctor tincidunt molestie. Proin augue elit, elementum eget neque vestibulum, commodo sodales leo. Nam vitae lacus turpis. Sed rutrum vehicula enim quis lobortis. Duis semper elementum congue. Aenean dapibus dignissim odio a ultrices.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Sous-titre</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p class="">Suspendisse vestibulum est et posuere vestibulum. Aliquam aliquet nec leo ac pretium. Curabitur in porttitor nunc, sit amet eleifend enim. Sed sit amet convallis tortor. Duis augue turpis, venenatis sit amet tristique id, dignissim a magna. Phasellus maximus ante nec dolor congue cursus. Praesent tincidunt libero a fringilla volutpat. Donec ac sollicitudin orci. Cras vitae est sodales, porttitor nibh eget, pulvinar risus. Nullam sed auctor orci, quis ornare justo. Suspendisse non iaculis enim.</p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":45,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . esc_url( get_theme_file_uri( 'assets/images/paysage.jpg' ) ) . '" alt="" class="wp-image-45"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:sensei-lms/course-progress {"defaultBarColor":"primary"} /-->

<!-- wp:sensei-lms/course-outline {"className":"is-style-beflex"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
);
