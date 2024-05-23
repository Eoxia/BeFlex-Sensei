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
	?>
	<div <?php echo $anchor; ?> class="<?php echo esc_attr( $class_name ); ?>">
		<?php if ( ! empty( $profile_url ) ) : ?>
			<a href="<?php echo esc_url( $profile_url ); ?>" class="bf-button bf-button__style-outline bf-button__color-primary">
				<svg xmlns="http://www.w3.org/2000/svg" class="bfs-login__icon bfs-login__courses-icon" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>
				<span class="bfs-login__label bfs-login__courses-label"><?php esc_html_e( 'My courses', 'beflex' ); ?></span>
			</a>
		<?php endif; ?>

		<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="bf-button bf-button__color-light-grey">
			<svg xmlns="http://www.w3.org/2000/svg" class="bfs-login__icon bfs-login__logout-icon" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
			<span class="bfs-login__label bfs-login__logout-label"><?php esc_html_e( 'Logout', 'beflex' ); ?></span>
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
