<?php
/**
 * insday functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package insday
 */

if ( ! function_exists( 'insday_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function insday_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on insday, use a find and replace
		 * to change 'insday' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'insday', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'insday' ),
		) );

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
		add_theme_support( 'custom-background', apply_filters( 'insday_custom_background_args', array(
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


		if( function_exists('acf_add_options_page') ) {
			
			acf_add_options_page(array(
				'page_title' => 'contacts',
				'menu_title' => 'Контакты',
				'menu_slug' => 'theme-general-settings',
				'capability' => 'edit_posts',
				'redirect' => false,
				'icon_url' => 'dashicons-phone',
			));		

			acf_add_options_page(array(
				'page_title' => 'Меню',
				'menu_title' => 'Меню',
				'menu_slug' => 'theme-general-menu',
				'capability' => 'edit_posts',
				'redirect' => false,
				// 'icon_url' => 'dashicons-phone',
			));	

		}	
		add_action( 'wp_ajax_nopriv_load_items', 'load_items');
		add_action( 'wp_ajax_load_items', 'load_items' );

		function load_items() {
			$items = $_GET['items'];
			$data = array();
			if ($items) {
				foreach ($items as $key => $item) { ?>
				<?php $inner = ""; ?>
					<?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 1, 'page_id' => $item ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php
						$cats =  get_the_terms($post->ID, 'portfolio');
						!empty($cats[0]) ? $cat = $cats[0]->name : $cat = '';
						$inner .= '<div class="card__inner">';
							$inner .= '<a href="'. get_the_permalink() .'" class="card__link"></a>';
							$inner .= '<div class="cardPhoto">';
								$inner .= '<div class="cardPhoto__preview" style="background-image: url('. get_the_post_thumbnail_url() .');"></div>';
								$inner .= '<div class="cardPhoto__action"></div>';
							$inner .= '</div>';
							$inner .= '<div class="card__body">';
								$inner .= '<div class="card__title">' . get_the_title() . '</div>';
								$inner .= '<div class="card__subtitle">'. $cat .'</div>';
							$inner .= '</div>';
						$inner .= '</div>';             
                    ?>
                    <?php endwhile; wp_reset_query(); ?>
				<?php 
                   	$data['items'][$key]['inner'] = $inner;
                   	$data['items'][$key]['id'] = $item;
				}

				exit(json_encode($data));
				
			}
		}

		function cc_mime_types($mimes) {
		  $mimes['svg'] = 'image/svg+xml';
		  return $mimes;
		}
		add_filter('upload_mimes', 'cc_mime_types');
		// function wph_hide_editor() {
		//     $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
		//     if(!isset($post_id)) return;
		 
		//     $template_file = get_post_meta($post_id, '_wp_page_template', true);
		//     if($template_file == 'template-page/constructor-page.php'){ 
		//         remove_post_type_support('page', 'editor');
		//     }
		// }
		// add_action('admin_init', 'wph_hide_editor');
	}
endif;
add_action( 'after_setup_theme', 'insday_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function insday_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'insday_content_width', 640 );
}
add_action( 'after_setup_theme', 'insday_content_width', 0 );

		add_filter('wpcf7_form_elements', function($content) {
		    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

		    return $content;
		});
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function insday_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'insday' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'insday' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'insday_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function insday_scripts() {
	wp_enqueue_style( 'app-css', get_template_directory_uri() . '/css/app.css' );

	//wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'insday_scripts' );

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

function construct_template($templates) 
{
	if (is_array($templates)){
		foreach($templates as $key => $template) {
			$path = 'constructor/' . $template['acf_fc_layout'] . '.php';
			if (file_exists(locate_template($path))) {
				include (locate_template($path));
			}
		}
		
	}
}
function add_taxonomy_portfolio() {		
	register_taxonomy('portfolio',
		array('post'),
		array(
			'hierarchical' => true,

			'labels' => array(
				'name' => 'Портфолио',
				'singular_name' => 'Портфолио',
				'search_items' =>  'Найти Портфолио',
				'popular_items' => 'Портфолио',
				'all_items' => 'Портфолио',
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => 'Редактировать платформу', 
				'update_item' => 'Обновить платформу',
				'add_new_item' => 'Добавить новую платформу',
				'new_item_name' => 'Название новой платформы',
				'separate_items_with_commas' => 'Разделяйте платформы запятыми',
				'add_or_remove_items' => 'Добавить или удалить платформу',
				'choose_from_most_used' => 'Выбрать из наиболее часто используемых платформ',
				'menu_name' => 'Категории'
			),
			'public' => true, 
			/* каждый может использовать таксономию, либо
			только администраторы, по умолчанию - true */
			'show_in_nav_menus' => true,
			/* добавить на страницу создания меню */
			'show_ui' => true,
			/* добавить интерфейс создания и редактирования */
			'show_tagcloud' => true,
			/* нужно ли разрешить облако тегов для этой таксономии */
			'update_count_callback' => '_update_post_term_count',
			/* callback-функция для обновления счетчика $object_type */
			'query_var' => true,
			/* разрешено ли использование query_var, также можно 
			указать строку, которая будет использоваться в качестве 
			него, по умолчанию - имя таксономии */
			'rewrite' => array(
			/* настройки URL пермалинков */
				'slug' => 'portfolio', // ярлык
				'hierarchical' => true, // разрешить вложенность

			),
		)
	);
}
add_action( 'init', 'add_taxonomy_portfolio', 100 );

function PortfolioPostType() {

	$labels = array(
		'name'                  => _x( 'Портфолио', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Портфолио', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Портфолио', 'text_domain' ),
		'name_admin_bar'        => __( 'Портфолио', 'text_domain' ),
		'archives'              => __( 'Архив', 'text_domain' ),
		'attributes'            => __( 'Аттрибуты', 'text_domain' ),
		'parent_item_colon'     => __( 'Родители:', 'text_domain' ),
		'all_items'             => __( 'Все записи', 'text_domain' ),
		'add_new_item'          => __( 'Создать запись', 'text_domain' ),
		'add_new'               => __( 'Создать', 'text_domain' ),
		'new_item'              => __( 'Новая запись', 'text_domain' ),
		'edit_item'             => __( 'Редактировать запись', 'text_domain' ),
		'update_item'           => __( 'Обновить запись', 'text_domain' ),
		'view_item'             => __( 'Посмотреть запись', 'text_domain' ),
		'view_items'            => __( 'Посмотреть записи', 'text_domain' ),
		'search_items'          => __( 'Найти', 'text_domain' ),
		'not_found'             => __( 'Не найдено', 'text_domain' ),
		'not_found_in_trash'    => __( 'Не найдено', 'text_domain' ),
		'featured_image'        => __( 'Миниатюра', 'text_domain' ),
		'set_featured_image'    => __( 'Задать миниатюру', 'text_domain' ),
		'remove_featured_image' => __( 'Удалить миниатюру', 'text_domain' ),
		'use_featured_image'    => __( 'Использовать миниатюру', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Портфолио', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array('portfolio'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'menu_icon' => 'dashicons-layout',
		'rewrite' => array('slug' => 'portfolio','with_front' => false),
	);
	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'PortfolioPostType', 100 );


function getPortfolioBlockClass($number, $row) 
{
	$row = ceil($row/3);
	if ($row%2 == 0) {
		//четная строка
		switch ($number) {
			case 1 : echo 'col-3 col-offest-left-1'; break;
			case 2 : echo 'card--lg col-6 col-offest-left-1';break;
			case 3 : echo 'col-3 col-offest-left-2';break;
			default : echo 'col-3';break;
		}
	} else {
		switch ($number) {
			case 1 : echo 'card--lg col-6';break;
			case 2 : echo 'col-3 col-offest-left-3';break;
			case 3 : echo 'col-3 col-offest-left-1';break;
			default : echo 'col-3';break;
		}

	}
}