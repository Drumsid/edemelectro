<?php
/**
 * edemelectrotest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edemelectrotest
 */

if ( ! function_exists( 'edemelectrotest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function edemelectrotest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on edemelectrotest, use a find and replace
		 * to change 'edemelectrotest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'edemelectrotest', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.

		// register_nav_menus( array(
		// 	'menu-1' => esc_html__( 'Primary', 'edemelectrotest' ),
		// ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'edemelectrotest_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'edemelectrotest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function edemelectrotest_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'edemelectrotest_content_width', 640 );
}
add_action( 'after_setup_theme', 'edemelectrotest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function edemelectrotest_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'edemelectrotest' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'edemelectrotest' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'edemelectrotest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function edemelectrotest_scripts() {
	wp_enqueue_style( 'edemelectrotest-style', get_stylesheet_uri() );

	wp_enqueue_script( 'edemelectrotest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'edemelectrotest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'edemelectrotest_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
//-------------------------------------
//----my php 
//--подключаю файл navigation.php
function get_navigation() {
	$templates = array();
	$templates[] = 'navigation.php';

	locate_template( $templates, true );
}

//--подключаю стили и скрипты
function load_styles_scripts() {

	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	wp_enqueue_style('style', get_template_directory_uri().'/css/style.css');
	wp_enqueue_style('flexslider', get_template_directory_uri().'/css/flexslider.css');

	wp_enqueue_script('bootstrap-3.1.1.min', get_template_directory_uri().'/js/bootstrap-3.1.1.min.js');
	wp_enqueue_script('simpleCart', get_template_directory_uri().'/js/simpleCart.min.js');
	wp_enqueue_script('responsiveslides', get_template_directory_uri().'/js/responsiveslides.min.js');
	wp_enqueue_script('flexisel', get_template_directory_uri().'/js/jquery.flexisel.js');
}
//--хук для стилей
add_action('wp_enqueue_scripts', 'load_styles_scripts');
//--фильтр чтоб удалить стили woocommerce
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

//--подключаю в админку пункты для изменения логотипа, телефона, и слайдера
function my_options() {

	add_settings_field('url_slide', 'Ссылка слайдера', 'display_url', 'general');
	register_setting('general', 'url_slide');

	add_settings_field('button_slide', 'Заголовок кнопки слайдера', 'display_button', 'general');
	register_setting('general', 'button_slide');

	add_settings_field('top_logo', 'Логотип', 'logo_text', 'general');
	register_setting('general', 'top_logo'); 

	add_settings_field('my_phone', 'Телефон', 'display_phone', 'discussion');
	register_setting('discussion', 'my_phone');

}

function display_url() {
	echo '<input type="text" class="regular-text" name="url_slide" value="'.esc_attr(get_option('url_slide')).'">';
}
function display_button() {
	echo '<input type="text" class="regular-text" name="button_slide" value="'.esc_attr(get_option('button_slide')).'">';
}
function display_phone() {
	echo '<input type="text" class="regular-text" name="my_phone" value="'.esc_attr(get_option('my_phone')).'">';
}
function logo_text() {
	echo '<input type="text" class="regular-text" name="top_logo" value="'.esc_attr(get_option('top_logo')).'">';
}

add_action('admin_menu', 'my_options');
//--подключаю в админку раздел для настройки и работы слайдера
add_action('init', 'banner_index');
function banner_index() {
	register_post_type('slider', array(
		'public'=>true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_position' => 120,
		'menu_icon' => admin_url().'images/media-button-other.gif',
		'labels' => array(
			'name' => 'Слайдер',
			'all_items' => 'Все слайды',
			'add_new' => 'Добавить новый слайд',
			'add_new_item' => 'Новый слайд'
		)
	));
}

//--регистрирую меню
register_nav_menus( array(
	'top' => 'Верхнее меню',
	'bottom' => 'Нижнее меню'
) );


//-------------подключаем класс меню

include "inc/Custom_Walker_Nav_Menu.php";
include "inc/fcollection/widget.php";


//-------------подключаем виджет соцсетей и доставки, можно добавить виджет телефон

function MyTempl_widgets_init() {
	register_sidebar(array(
		'name' => 'Follow us',
		'id' => 'follow us',
		'description' => "Блок для соц сетей",
		'before_widget' => "",
		'after_widget' => ""
	));

	register_sidebar(array(
		'name' => 'Shipping',
		'id' => 'shipping',
		'description' => "Блок для доставки",
		'before_widget' => "",
		'after_widget' => ""
	));

	register_sidebar(array(
		'name' => 'Content bottom',
		'id' => 'content_bottom',
		'description' => "Блок для отображения нижнего слайдера",
		// 'before_widget' => "",
		// 'after_widget' => ""
	));

	register_sidebar(array(
		'name' => 'Footer menu',
		'id' => 'footer',
		'description' => "Блок для отображения нижнего меню",
		'before_widget' => '<div class="col-md-3 span1_of_4">',
		'after_widget' => "</div>",
		'before_title' => "<h4>",
		'after_title' => "</h4>"
	));

	register_sidebar(array(
		'name' => 'Left bar',
		'id' => 'left_sidebar',
		'description' => "Блок для отображения левого меню",
		'before_widget' => '',
		'after_widget' => "",
		'before_title' => "",
		'after_title' => ""
	));
}
add_action('widgets_init', 'MyTempl_widgets_init');

//------------------------
//добавил эти две строчки чтоб заработали файлы из моей папки global, такая же папка есть в директории woocommerce
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 20 );

// закоментил такую же функцию в файле wc_template_functions.php 
if ( ! function_exists( 'woocommerce_output_content_wrapper' ) ) {

	/**
	 * Output the start of the page wrapper.
	 */
	function woocommerce_output_content_wrapper() {
		wc_get_template( 'global/wrapper-start.php' );
	}
}
if ( ! function_exists( 'woocommerce_output_content_wrapper_end' ) ) {

	/**
	 * Output the end of the page wrapper.
	 */
	function woocommerce_output_content_wrapper_end() {
		wc_get_template( 'global/wrapper-end.php' );
	}
}
//---------------------------добавляем разметку в блок last product

function woocommerce_template_loop_product_thumbnail() {
	echo woocommerce_get_product_thumbnail();

	echo '</a><div class="mask"><a href="'.get_the_permalink().'">Quick View</a></div>';
}

function woocommerce_template_loop_product_title() {
	echo '<a class="product_name" href="'.get_the_permalink().'">'.get_the_title().'</a>';
}
//---------------------перемещаем кнопку распродажа в блоке last product_cat

function change__sale_flash() {

	$html = '<div class="offer otop"><p>40%</p><smal>Sale</smal></div>';

	return $html;
}

add_filter('woocommerce_sale_flash','change__sale_flash'); 

//----фильтр для меню футера

add_filter('widget_nav_menu_args', 'change_menu', '', 4);

function change_menu($nav_menu_args, $nav_menu, $args, $instance){
	
	if($args['id'] == 'left_sidebar') {

		$nav_menu_args['container'] = "";
		$nav_menu_args['menu_class'] = "product-list";

		return $nav_menu_args;
	}

	$nav_menu_args['container'] = "";
	$nav_menu_args['menu_class'] = "f_nav";
	
	return $nav_menu_args;
}

//---функция подлючает скрипт add-to-cart.js

add_action('wp_enqueue_scripts','load_script',9);

function load_script() {
	wp_enqueue_script('wc-add-to-cart',get_template_directory_uri().'/js/add-to-cart.js', WC_VERSION, true);
}

//----функция для left menu что сменить обертку div

add_filter('dynamic_sidebar_params','check_sidebar_params');

function check_sidebar_params($params) {

	global $wp_registered_widgets;
	
	if($params[0]['id'] == 'left_sidebar' && $params[0]['widget_id'] == 'nav_menu-'.$params[1]['number']) {
		$params[0]['before_widget'] = '<div class="product-listy">';
		$params[0]['after_widget'] = '</div>';
		$params[0]['before_title'] = '<h2>';
		$params[0]['after_title'] = '</h2>';
	}
	elseif ($params[0]['id'] == 'left_sidebar' && $params[0]['widget_id'] == 'custom_html-'.$params[1]['number']) {
		$params[0]['before_widget'] = '<div class="latest-bis">';
		$params[0]['after_widget'] = '</div>';
	}
	//print_r($params);
	return $params;
}