<?php
/**
 * login.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'bfs-login';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Admin classes
if ( is_admin() ) :
    $class_name .= ' is-admin';
	esc_html_e( 'Display Sensei login navigation', 'beflex' );
endif;

if ( is_user_logged_in() ) :
	$profile_url = Sensei()->learner_profiles->get_permalink( get_current_user_id() );
	$user = wp_get_current_user();
	?>

	<div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
		<?php if ( ! empty( $profile_url ) ) : ?>
			<a href="<?php echo esc_url( $profile_url ); ?>" class="bfs-login__profile">
				<?php echo get_avatar( $user->data->ID, 32 ); ?>
				<div class="bfs-login__profile-data">
					<div class="bfs-login__profile-name"><?php echo esc_html( $user->data->display_name ); ?></div>
					<div class="bfs-login__profile-label"><?php esc_html_e( 'Check my profile', 'beflex' ); ?></div>
				</div>
			</a>
		<?php endif; ?>

		<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="bf-button bf-button__square bf-button__color-light-grey">
			<svg xmlns="http://www.w3.org/2000/svg" class="bfs-login__icon bfs-login__logout-icon" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z"/></svg>
		</a>
	</div>
<?php
else :
	$beflex_registration_url = get_field( 'page_url_register', 'options' );
	if ( empty( $beflex_registration_url ) ) :
		$my_account_page_id      = intval( Sensei()->settings->settings['my_course_page'] );
		$beflex_registration_url = get_permalink( $my_account_page_id );
	endif;

	if ( ! empty( $beflex_registration_url ) ) :
		?>
		<div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
			<a href="<?php echo esc_url( $beflex_registration_url ); ?>" class="bf-button bf-button__style-outline bf-button__color-primary">
				<svg xmlns="http://www.w3.org/2000/svg" class="bfs-login__icon bfs-login__login-icon" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M272 304h-96C78.8 304 0 382.8 0 480c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32C448 382.8 369.2 304 272 304zM48.99 464C56.89 400.9 110.8 352 176 352h96c65.16 0 119.1 48.95 127 112H48.99zM224 256c70.69 0 128-57.31 128-128c0-70.69-57.31-128-128-128S96 57.31 96 128C96 198.7 153.3 256 224 256zM224 48c44.11 0 80 35.89 80 80c0 44.11-35.89 80-80 80S144 172.1 144 128C144 83.89 179.9 48 224 48z"/></svg>
				<span class="bfs-login__label bfs-login__login-label"><?php esc_html_e( 'Login', 'beflex' ); ?></span>
			</a>
		</div>
	<?php
	endif;
endif;
?>
