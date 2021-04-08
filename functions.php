<?php
/**
 * Theme functions
 *
 * @author    Eoxia <contact@eoxia.com>
 * @copyright (c) 2006-2019 Eoxia <contact@eoxia.com>
 * @license   AGPLv3 <https://spdx.org/licenses/AGPL-3.0-or-later.html>
 * @package   beflex
 * @since     3.0.0
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'beflex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function beflex_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'beflex', get_template_directory() . '/languages' );

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Support custom logo in customizer
		 */
		$defaults = array(
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable excerpt on pages
		 */
		add_post_type_support( 'page', 'excerpt' );

		/*
		 * Add Wide alignment for Gutenberg
		 */
		add_theme_support( 'align-wide' );

		/*
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Main Navigation', 'beflex' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Add custom style for tinymce.
		 */
		add_editor_style( 'css/custom-editor-style.css' );

		/**
		 * Define content width
		 */
		if ( ! isset( $content_width ) ) :
			$content_width = 900;
		endif;
	}
endif;
add_action( 'after_setup_theme', 'beflex_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function beflex_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Blog', 'beflex' ),
			'id'            => 'sidebar-blog',
			'description'   => esc_html__( 'Display on blog / post / archive pages.', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	if ( is_wpshop() ) :
		register_sidebar(
			array(
				'name'          => esc_html__( 'Shop', 'beflex' ),
				'id'            => 'boutique',
				'description'   => esc_html__( 'Display on shop pages', 'beflex' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title">',
				'after_title'   => '</div>',
			)
		);
	endif;
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sensei LMS (Lessons)', 'beflex' ),
			'id'            => 'sensei-lesson',
			'description'   => esc_html__( 'Display in Sensei lesson/quizz pages', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Boxfoot 1', 'beflex' ),
			'id'            => 'boxfoot-1',
			'description'   => esc_html__( '1 Boxfoot. Boxfoot display before Footer', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Boxfoot 2', 'beflex' ),
			'id'            => 'boxfoot-2',
			'description'   => esc_html__( '2 Boxfoot. Boxfoot display before Footer', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Boxfoot 3', 'beflex' ),
			'id'            => 'boxfoot-3',
			'description'   => esc_html__( '3 Boxfoot. Boxfoot display before Footer', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Boxfoot 4', 'beflex' ),
			'id'            => 'boxfoot-4',
			'description'   => esc_html__( '4 Boxfoot. Boxfoot display before Footer', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'beflex' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Display on right in Footer', 'beflex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'beflex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function beflex_frontend_scripts() {
	// Google Font.
	wp_enqueue_style( 'beflex-font-open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap', false );
	// Enqueue Style.
	if ( ! is_beflex_aft() ) :
		wp_enqueue_style( 'beflex-font-awesome', get_template_directory_uri() . '/css/fontawesome/fontawesome-all.min.css' );
	endif;
	wp_enqueue_style( 'beflex-style', get_template_directory_uri() . '/css/style.min.css' );
	wp_enqueue_style( 'beflex-custom-style', get_stylesheet_uri() );
	wp_enqueue_style( 'custom-beflex-pro', get_template_directory_uri() . '/modules/css/style.min.css' );

	// Enqueue Scripts.
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'beflex-simple-lightbox', get_template_directory_uri() . '/js/inc/simple-lightbox.min.js', array(), '', true );
	wp_enqueue_script( 'beflex-skip-link-focus-fix', get_template_directory_uri() . '/js/inc/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'beflex-main-js', get_template_directory_uri() . '/js/main.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'beflex_frontend_scripts' );

/**
 * Enqueue scripts and styles in admin.
 */
function beflex_admin_scripts() {
	wp_enqueue_style( 'beflex-style', get_template_directory_uri() . '/css/style-admin.min.css' );
}
add_action( 'admin_enqueue_scripts', 'beflex_admin_scripts' );

/**
 * Affiche le bloc du plugin Yoast SEO tout en bas des pages
 *
 * @method beflex_display_yoast_bottom
 * @return string
 */
function beflex_display_yoast_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'beflex_display_yoast_bottom' );

/**
 * Filter the except length to 30 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function beflex_custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'beflex_custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function beflex_excerpt_more( $more ) {
	return ' (...)';
}
add_filter( 'excerpt_more', 'beflex_excerpt_more' );

/**
 * [beflex_init_tiny_buttons description]
 *
 * @param  Array $buttons liste des boutons.
 * @return Array $buttons liste des boutons.
 */
function beflex_init_tiny_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'beflex_init_tiny_buttons' );

/**
 * Ajoute des boutons personnalisés dans la barre de Tiny MCE
 *
 * @param  Array $init_array Liste des boutons.
 * @return Array Liste des boutons.
 */
function beflex_add_custom_formats( $init_array ) {
	$style_formats = array(
		array(
			'title'   => 'Entete',
			'block'   => 'div',
			'classes' => 'beflex-entete',
			'wrapper' => true,
		),
		array(
			'title'   => 'Bouton',
			'block'   => 'a',
			'classes' => 'button primary',
			'wrapper' => true,
		),
	);

	$init_array['style_formats'] = wp_json_encode( $style_formats );
	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'beflex_add_custom_formats' );

/**
* WordPress cutomizer settings
*/
require get_template_directory() . '/inc/customizer.php';

/**
 * Display in the Head user colors
 */
function beflex_custom_styles_enqueue() {
	get_template_part( 'inc/option-color' );
}
add_action( 'wp_head', 'beflex_custom_styles_enqueue' );

/**
 * Enqueue custom Theme Gutenberg style
 */
function beflex_custom_styles_enqueue_admin() {
	get_template_part( 'inc/gutenberg-editor' );
}
add_action( 'admin_head', 'beflex_custom_styles_enqueue_admin' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Additional features to allow styling of the templates.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions toolbox for the theme
 */
require get_template_directory() . '/inc/general-functions.php';


/**
 * Function on init
 *
 * @return [type] [description]
 */
function beflex_child_theme_setup() {
	add_theme_support( 'sensei' );

	add_image_size( 'beflex-call-to-action-course', 300, 300, true );

	require get_stylesheet_directory() . '/sensei/functions.php';
}
add_action( 'after_setup_theme', 'beflex_child_theme_setup' );


/**
 * Add Course type to Call To Action
 *
 * @param  array  $bloc_data Data of Call to Action.
 * @param  string $type      Type of the CTA.
 * @param  int    $id_block  Gutenberg bloc ID.
 *
 * @return array $bloc_data Data of Call to Action.
 */
function beflex_call_to_action_courses( $bloc_data, $type, $id_block ) {
	if ( 'course' == $type ) {
		$call_to_courses = get_field( 'beflex_call_courses', $id_block );
		if ( 'manual' == $call_to_courses['course_filter'] ) :
			$posts_ids = $call_to_courses['course_manual'];
		elseif ( 'category' == $call_to_courses['course_filter'] ) :
			$course_category = $call_to_courses['course_category'];
			$course_count    = $call_to_courses['course_count'];
			$args            = array(
				'post_type'           => 'course',
				'posts_per_page'      => ( ! empty( $course_count ) ) ? $course_count : 3,
				'ignore_sticky_posts' => 1,
				'tax_query'      => array(
					array(
						'taxonomy'         => 'course-category',
						'field'            => 'term_id',
						'terms'            => $course_category,
						'include_children' => false,
					),
				),
			);

			$dynamic_data = new \WP_Query( $args );
			if ( ! empty( $dynamic_data->posts ) ) :
				$posts_ids = $dynamic_data->posts;
			endif;
		else :
			return array();
		endif;

		if ( ! empty( $posts_ids ) ) :
			$i              = 0;
			$bloc_data = array();

			foreach ( $posts_ids as $element ) :
				$bloc_data[ $i ] = array(
					'id'               => $element->ID,
					'title'            => ( ! empty( $element->post_title ) ) ? $element->post_title : false,
					'categories'       => get_the_terms( $element->ID, 'course-category' ),
					'image'            => get_post_thumbnail_id( $element ),
					'content'          => get_the_excerpt( $element ),
					'permalink'        => get_permalink( $element ),
					'permalink_label'  => __( 'Aperçu du cours', 'beflex-child' ),
					'permalink_target' => '_self',
					'author'           => ( ! empty( $element->post_author ) ) ? $element->post_author : false,
					'course_length'    => beflex_get_course_length( $element->ID ),
					'row'              => $i,
				);
				$i++;
			endforeach;
		else :
			return array();
		endif;
	}

	return $bloc_data;
}
add_filter( 'beflex_callto_data_type', 'beflex_call_to_action_courses', 10, 3 );

/**
 * Display course elements for Call To Action courses type.
 *
 * @param  array  $call_atts Call To Ation datas.
 * @param  array  $block     Gutenberg block data.
 *
 * @return array $call_atts Call To Ation datas.
 */
function beflex_call_to_action_atts_course( $call_atts, $block ) {
	$type = get_field( 'beflex_call_data_type', $block['ID'] );
	if ( 'course' == $type ) :
		$display_elt = get_field( 'beflex_option_data_display_course', $block['ID'] );

		$call_atts['display_image']      = ( ! empty( $display_elt ) && in_array( 'image', $display_elt, true ) ) ? 1 : 0;
		$call_atts['display_title']      = ( ! empty( $display_elt ) && in_array( 'title', $display_elt, true ) ) ? 1 : 0;
		$call_atts['display_categories'] = ( ! empty( $display_elt ) && in_array( 'cat', $display_elt, true ) ) ? 1 : 0;
		$call_atts['display_content']    = ( ! empty( $display_elt ) && in_array( 'content', $display_elt, true ) ) ? 1 : 0;
		$call_atts['display_button']     = ( ! empty( $display_elt ) && in_array( 'button', $display_elt, true ) ) ? 1 : 0;
		$call_atts['display_author']     = ( ! empty( $display_elt ) && in_array( 'author', $display_elt, true ) ) ? 1 : 0;
		$call_atts['display_length']     = ( ! empty( $display_elt ) && in_array( 'length', $display_elt, true ) ) ? 1 : 0;
	endif;

	return $call_atts;
}
add_filter( 'beflex_callto_bloc', 'beflex_call_to_action_atts_course', 10, 2 );
