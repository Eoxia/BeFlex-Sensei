<?php
/**
 * The header of theme Beflex
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'beflex' ); ?></a>

	<header id="masthead" class="site-header sticky" role="banner">
		<div class="site-width">

			<div class="site-branding">
				<?php if ( function_exists( 'the_custom_logo' ) ) : ?>
					<?php the_custom_logo(); ?>
				<?php endif; ?>

				<div class="site-branding-container">
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

					<?php $beflex_description = get_bloginfo( 'description', 'display' ); ?>
					<?php if ( $beflex_description ) : ?>
						<p class="site-description"><?php echo esc_html( $beflex_description ); ?></p>
					<?php endif; ?>
				</div>
			</div><!-- .site-branding -->

			<div class="site-navigation">
				<nav id="main-navigation" role="navigation">
					<?php
					$beflex_user = wp_get_current_user();
					if ( has_nav_menu( 'menu-1' ) ) :
						if ( is_beflex_mega_menu() ) :
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'walker'         => new \beflex_pro\Beflex_Mega_Menu(),
								)
							);
						else :
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
						endif;
					elseif ( beflex_allowed( $beflex_user->roles, 'editor,administrator' ) ) :
						echo beflex_notification( __( 'Please set your navigation as "Main navigation" to make it appear', 'beflex' ), 'warning', admin_url( 'nav-menus.php' ) );
					endif;
					?>
				</nav><!-- #main-navigation -->
				<a href="#" class="menu-toggle"><i class="fas fa-bars fa-fw"></i><span><?php esc_html_e( 'Navigation', 'beflex' ); ?></span></a>
			</div><!-- .site-navigation -->

			<div class="site-tool">
				<a href="#" class="js-search"><i class="fas fa-search"></i></a>
				<?php
				if ( is_wpshop() ) :
					$pages_ids = get_option( 'wps_page_ids', \wpshop\Pages::g()->default_options );
					if ( is_array( $pages_ids ) && ! empty( $pages_ids['my_account_id'] ) ) :
						?>
						<a href="<?php echo esc_url( get_permalink( $pages_ids['my_account_id'] ) ); ?>"><i class="fas fa-fw fa-user-alt"></i></a>
						<?php
					endif;
					if ( is_array( $pages_ids ) && ! empty( $pages_ids['cart_id'] ) ) :
						?>
						<a href="<?php echo esc_url( get_permalink( $pages_ids['cart_id'] ) ); ?>"><i class="fas fa-fw fa-shopping-cart"></i></a>
						<?php
					endif;
				endif;
				?>
			</div><!-- .site-tool -->

		</div><!-- .site-width -->
	</header><!-- #masthead -->

	<div id="search-area">
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label>
				<span class="search-icon"><i class="fas fa-search"></i></span>
				<input type="search" class="search-field"
						placeholder="<?php echo esc_attr_x( 'Enter a Keyword', 'placeholder', 'beflex' ); ?>"
						value="<?php echo get_search_query(); ?>" name="s"
						title="<?php echo esc_attr_x( 'Search for:', 'label', 'beflex' ); ?>" />
			</label>
		</form>
		<div class="search-overlay"></div>
	</div><!-- #search-field -->

	<?php
	if ( is_acf() && ! empty( $post ) ) :
		$beflex_is_sidebar = ( get_field( 'beflex_display_page_sidebar', $post->ID ) ) ? 'active-sidebar' : '';
	else :
		$beflex_is_sidebar = '';
	endif;
	?>

	<div id="content" class="site-content site-width <?php echo esc_html( $beflex_is_sidebar ); ?>">
