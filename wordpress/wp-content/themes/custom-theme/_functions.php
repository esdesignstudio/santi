<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */


add_filter( 'acf/settings/rest_api_format', function () {
    return 'standard';
} );

add_action( 'wp_ajax_ajax_filter_posts', 'ajax_filter_posts' );
add_action( 'wp_ajax_nopriv_ajax_filter_posts', 'ajax_filter_posts' );

function ajax_filter_posts() {
    $search_text = $_POST['search_text'];
    $sort = $_POST['sort'];
    $meta_key = $_POST['meta_key'];
    $category_id = $_POST['category_id'];
    $specifications_id = $_POST['specifications_id'];
    $bolon_studio_id = $_POST['bolon_studio_id'];
    $color_id = $_POST['color_id'];
    $space_id = $_POST['space_id'];

    $all_category_terms = get_terms('category', ['fields' => 'ids']);
    $all_specifications_terms = get_terms('specifications', ['fields' => 'ids']);
    $all_bolon_studio_terms = get_terms('bolon_studio', ['fields' => 'ids']);
    $all_color_terms = get_terms('color', ['fields' => 'ids']);
    $all_space_terms = get_terms('space', ['fields' => 'ids']);

    // bind all posts's page_title to meta_qurey
    $all_posts_args = array(
        'posts_per_page' => -1,
        'post_type' => 'products',
        'fields'    => 'ids',
    );

    for ($x = 0; $x <= count(get_posts( $all_posts_args ))-1; $x++) {
        update_post_meta(
            get_posts($all_posts_args)[$x],
            'title',
            get_the_title(
                get_posts($all_posts_args)[$x]
            )
        );
        update_post_meta(
            get_posts($all_posts_args)[$x],
            'color',
            get_field('order', 'color_' . wp_get_object_terms(
                get_posts($all_posts_args)[$x],
                'color',
                array('fields' => 'ids', 'orderby' => 'ASC',)
            )[0])
        );
        update_post_meta(
            get_posts($all_posts_args)[$x],
            'new',
            get_field('new', get_posts($all_posts_args)[$x])
        );
    }

    
    // set args
    $args = array(
        'posts_per_page'        => -1,
        'meta_query'            => array(
            'relation'          =>'OR',
            array(
                'key'           => 'product_id',
                'value'         => $search_text,
                'compare'       => 'LIKE',
            ),
            array(
                'key'           => 'title',
                'value'         => $search_text,
                'compare'       => 'LIKE',
            ),
        ),
        'tax_query'             => array( 
            'relation'          =>'AND',
            array(
                'taxonomy'      => 'category',
                'field'         => 'term_id',
                'operator' => 'IN',
                'terms'         => 
                    empty($category_id)
                    ? $all_category_terms
                    : $category_id
            ),
            array(
                'taxonomy'  => 'specifications',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($specifications_id)
                    ? $all_specifications_terms
                    : $specifications_id
            ),
            array(
                'taxonomy'  => 'bolon_studio',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($bolon_studio_id)
                    ? $all_bolon_studio_terms
                    : $bolon_studio_id
            ),
            array(
                'taxonomy'  => 'color',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($color_id)
                    ? $all_color_terms
                    : $color_id
            ),
            array(
                'taxonomy'  => 'space',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($space_id)
                    ? $all_space_terms
                    : $space_id
            ),
        ),
        'meta_key'              => $meta_key,
        'orderby'               => $sort,
        'order'                 => 'DESC',
        'post_type'             => 'products',
        'fields'                => 'ids',
    );
    
    // get post ID by args
    for ($x = 0; $x <= count(get_posts( $args ))-1; $x++) {
        $sort_posts_id[] = get_posts( $args )[$x];   
    }

    // set custom formate
    for ($x = 0; $x <= count($sort_posts_id)-1; $x++) {
        $sort_posts [] = Array(
            "post" => get_post( $sort_posts_id[$x] ),
            "product_id" => get_field('product_id', $sort_posts_id[$x]),
            "guid" => get_permalink($sort_posts_id[$x]),
            "image" => get_field('list_image', $sort_posts_id[$x]),
            "categories" => wp_get_post_categories($sort_posts_id[$x],  array( 'fields' => 'names' ) ),
            "specifications" => wp_get_post_terms($sort_posts_id[$x], "specifications"),
            "color" => wp_get_post_terms($sort_posts_id[$x], "color"),
            "space" => wp_get_post_terms($sort_posts_id[$x], "space"),
            "isnew" => get_field('new', $sort_posts_id[$x]),
        );
    }

    function createCards($cards) {
        foreach ($cards as $card) {
            echo "
                <a
                    class='archive-products__products-product'
                    href='{$card[guid]}'
                >
                    <figure class='archive-products__products-product-img'>
                        <img src='" . $card[image][url] . "' alt='" . $card[image][alt] . "'>
            ";
            if ($card[isnew]) {
              echo "
                    <div class='archive-products__products-product-new'>
                        <p>NEW</p>
                    </div>
              ";
            }
            echo "      <div class='archive-products__products-product-dev'>
                            <div>{$card[product_id]}</div><br>";
            foreach ($card[categories] as $categories) {
                echo "<div>" . $categories . "</div>";
            }
            echo "<br>";
            foreach ($card[specifications] as $specifications) {
                echo "<div>" . $specifications -> name . "</div>";
            }
            echo "<br>";
            foreach ($card[color] as $color) {
                echo "<div style='color:" . $color -> slug . "'>" . $color -> name . "</div>";
            }
            echo "<br>";
            foreach ($card[space] as $space) {
                echo "<div>" . $space -> name . "</div>";
            }
            echo "<br>";
            echo "
                    </figure>
                    <h3 class='archive-products__products-product-title'>{$card[post] -> post_title}</h3>
                </a>
            " ;
        }
    }

    echo createCards($sort_posts);
    die();
}

add_action( 'wp_ajax_ajax_filter_projects', 'ajax_filter_projects' );
add_action( 'wp_ajax_nopriv_ajax_filter_projects', 'ajax_filter_projects' );

function ajax_filter_projects() {
    $search_text = $_POST['search_text'];
    $sort = $_POST['sort'];
    $meta_key = $_POST['meta_key'];
    $category_id = $_POST['category_id'];
    $specifications_id = $_POST['specifications_id'];
    $bolon_studio_id = $_POST['bolon_studio_id'];
    $color_id = $_POST['color_id'];
    $space_id = $_POST['space_id'];
    $nation_id = $_POST['nation_id'];
    $area_id = $_POST['area_id'];
    $products_id = $_POST['products_id'];


    $all_category_terms = get_terms('category', ['fields' => 'ids']);
    $all_specifications_terms = get_terms('specifications', ['fields' => 'ids']);
    $all_bolon_studio_terms = get_terms('bolon_studio', ['fields' => 'ids']);
    $all_color_terms = get_terms('color', ['fields' => 'ids']);
    $all_space_terms = get_terms('space', ['fields' => 'ids']);
    $all_nation_terms = get_terms('nation', ['fields' => 'ids']);
    $all_area_terms = get_terms('area', ['fields' => 'ids']);


    // bind all posts's page_title to meta_qurey
    $all_posts_args = array(
        'posts_per_page' => -1,
        'post_type' => 'projects',
        'fields'    => 'ids',
    );

    for ($x = 0; $x <= count(get_posts( $all_posts_args ))-1; $x++) {
        update_post_meta(
            get_posts($all_posts_args)[$x],
            'title',
            get_the_title(
                get_posts($all_posts_args)[$x]
            )
        );
        for ($y = 0; $y <= count(get_field('products',get_posts( $all_posts_args )[$x], false))-1; $y++) {
            update_post_meta(
                get_posts($all_posts_args)[$x],
                'products_' . get_field('products',get_posts( $all_posts_args )[$x], false)[$y],
                get_field('products',get_posts( $all_posts_args )[$x], false)[$y]
            );
        }
    }

    

    
    // set args
    $args = array(
        'posts_per_page'        => -1,
        'meta_query'            => array(
            'relation'          =>'OR',
            array(
                'key'           => 'title',
                'value'         => $search_text,
                'compare'       => 'LIKE',
            ),
        ),
        'tax_query'             => array( 
            'relation'          =>'AND',
            array(
                'taxonomy'      => 'category',
                'field'         => 'term_id',
                'operator' => 'IN',
                'terms'         => 
                    empty($category_id)
                    ? $all_category_terms
                    : $category_id
            ),
            array(
                'taxonomy'  => 'specifications',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($specifications_id)
                    ? $all_specifications_terms
                    : $specifications_id
            ),
            array(
                'taxonomy'  => 'bolon_studio',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($bolon_studio_id)
                    ? $all_bolon_studio_terms
                    : $bolon_studio_id
            ),
            array(
                'taxonomy'  => 'color',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($color_id)
                    ? $all_color_terms
                    : $color_id
            ),
            array(
                'taxonomy'  => 'space',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($space_id)
                    ? $all_space_terms
                    : $space_id
            ),
            array(
                'taxonomy'  => 'nation',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($nation_id)
                    ? $all_nation_terms
                    : $nation_id
            ),
            array(
                'taxonomy'  => 'area',
                'field'     => 'term_id',
                'operator' => 'IN',
                'terms'     =>
                    empty($area_id)
                    ? $all_area_terms
                    : $area_id
            ),
        ),
        'meta_key'              => empty($products_id) ? '' :'products_' . implode('|',$products_id),
        'orderby'               => 'title',
        'order'                 => 'DESC',
        'post_type'             => 'projects',
        'fields'                => 'ids',
    );
    
    // get post ID by args
    for ($x = 0; $x <= count(get_posts( $args ))-1; $x++) {
        $sort_posts_id[] = get_posts( $args )[$x];   
    }

    // set custom formate
    for ($x = 0; $x <= count($sort_posts_id)-1; $x++) {
        $sort_posts [] = Array(
            "post" => get_post( $sort_posts_id[$x] ),
            "product_id" => get_field('product_id', $sort_posts_id[$x]),
            "guid" => get_permalink($sort_posts_id[$x]),
            "image" => get_field('list_image', $sort_posts_id[$x]),
            "location" => get_field('location', $sort_posts_id[$x]),
            "categories" => wp_get_post_categories($sort_posts_id[$x],  array( 'fields' => 'names' ) ),
            "specifications" => wp_get_post_terms($sort_posts_id[$x], "specifications"),
            "color" => wp_get_post_terms($sort_posts_id[$x], "color"),
            "space" => wp_get_post_terms($sort_posts_id[$x], "space"),
            "nation" => wp_get_post_terms($sort_posts_id[$x], "nation"),
            "area" => wp_get_post_terms($sort_posts_id[$x], "area"),
            "products" => get_field('products',$sort_posts_id[$x], false)
        );
    }

    function createCards($cards) {
        foreach ($cards as $card) {
            echo "
                <a
                    class='archive-projects__products-product'
                    href='{$card[guid]}'
                >
                    <figure class='archive-projects__products-product-img'>
                        <img src='" . $card[image][url] . "' alt='" . $card[image][alt] . "'>
                        <div class='archive-projects__products-product-dev'>
                            <div>{$card[product_id]}</div><br>
            ";
            foreach ($card[categories] as $categories) {
                echo "<div>" . $categories . "</div>";
            }
            echo "<br>";
            foreach ($card[specifications] as $specifications) {
                echo "<div>" . $specifications -> name . "</div>";
            }
            echo "<br>";
            foreach ($card[color] as $color) {
                echo "<div style='color:" . $color -> slug . "'>" . $color -> name . "</div>";
            }
            echo "<br>";
            foreach ($card[space] as $space) {
                echo "<div>" . $space -> name . "</div>";
            }
            echo "<br>";
            foreach ($card[nation] as $nation) {
                echo "<div>" . $nation -> name . "</div>";
            }
            echo "<br>";
            foreach ($card[area] as $area) {
                echo "<div>" . $area -> name . "</div>";
            }
            echo "<br>";
            foreach ($card[products] as $products) {
                echo "<div>" . $products . "</div>";
            }
            echo "<br>";
            echo "
                    </figure>
                    <h3 class='archive-projects__products-product-title'>{$card[post] -> post_title}</h3>
                    <p class='archive-projects__products-product-location'>{$card[location]}</p>
                </a>
            " ;
        }
    }
    echo createCards($sort_posts);
    die();
}

add_action('wp_ajax_contact_form_mail','contact_form_mail');
add_action('wp_ajax_nopriv_contact_form_mail','contact_form_mail');

function contact_form_mail(){
    $data = $_POST['contact_form'];

    $custome_user_email = array('les@e-s.tw');
    $subject = '來自 ' . $data['name'] . ' 的詢問';
    $message_headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ES詢問表單 <wordpress@localhost>',
    );
    $message .= '<div style="background-color:#efefef; width:100%;padding-top:50px;padding-bottom:50px;padding-right:20px;padding-left:20px;">';
    $message .= '<style>td{background-color:#fff;border-bottom:1px solid #cccccc;padding:7px 12px;margin:0;color:#5B5B5B;}table{font-size: 14px;width:90%;max-width:600px;margin-right:auto;margin-left:auto;}.title{width:30%;background-color:#5B5B5B;color:#ffffff;}h2{text-align:center;}</style>';
    $message .= '<h2>網站來信詢問內容</h2>';
    $message .= '<table>';
    $message .= '<tr><td class="title">姓名</td><td>' . $data['name'] . '</td></tr>';
    $message .= '<tr><td class="title">聯絡電話</td><td>' . $data['tel'] . '</td></tr>';
    $message .= '<tr><td class="title">電子信箱</td><td>' . $data['email'] . '</td></tr>';
    $message .= '<tr><td class="title">公司名稱/個人</td><td>' . $data['company'] . '</td></tr>';
    $message .= '<tr><td class="title">城市</td><td>' . $data['city'] . '</td></tr>';
    $message .= '<tr><td class="title">您需要什麼協助？</td><td>' . $data['summary'] . '</td></tr>';
    $message .= '</table>';
    $message .= '</div>';
    $message .= '<p>&nbsp;</p><p style="text-align:center;">此封Email來自於 《EStest》 最新訊息公告郵件。</p>';
    $message .= '</html>';

    wp_mail($custome_user_email, $subject, $message, $message_headers);
    wp_send_json($data);
}




/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
        add_action( 'after_setup_theme', array($this, 'default_setup'));
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}
	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['site'] = $this;
        $context['NODE_ENV'] = WP_DEBUG ? 'development' : 'production';
        $context['blog_public'] = get_option('blog_public');
        $context['site_options'] = get_field('site_options', 'option');
        $context['main_menu'] = get_menu('main_menu');
        $context['global_options'] = get_field('global_options', 'option');
        $context = array_merge($context, get_singular_context());
        $context = array_merge($context, get_archive_context());

        return $context;
	}

	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

    public function default_setup()
    {
        require_once 'functions/index.php';

        if (is_admin()) {
            add_action('admin_enqueue_scripts', 'admin_style');
            add_action('admin_menu', 'editor_menu_role');
            add_filter('upload_mimes', 'upload_svg');
            add_filter('admin_footer_text', 'admin_copyright');
            add_filter('wpm_acf_image_config', '__return_empty_array');
            add_filter('wpm_acf_textarea_config', '__return_empty_array');
        } else {
            remove_action('wp_head', '_wp_render_title_tag', 1);
            add_action('login_enqueue_scripts', 'admin_style');
            add_action('pre_get_posts', 'pre_posts_page');
            add_filter('show_admin_bar', 'is_blog_admin');
        }
    }

	/** This Would return 'foo bar!'.
	 *
	 * @param string $text being 'foo', then returned 'foo bar!'.
	 */
	public function myfoo( $text ) {
		$text .= ' bar!';
		return $text;
	}

	/** This is where you can add your own functions to twig.
	 *
	 * @param string $twig get extension.
	 */
	public function add_to_twig( $twig ) {
		$twig->addExtension( new Twig\Extension\StringLoaderExtension() );
		$twig->addFilter( new Twig\TwigFilter( 'myfoo', array( $this, 'myfoo' ) ) );
        $twig->addFunction(new Timber\Twig_Function('enqueue_script', 'enqueue_script'));
        $twig->addFunction(new Timber\Twig_Function('enqueue_style', 'enqueue_style'));
        $twig->addFunction(new Timber\Twig_Function('require_assets', 'require_assets'));
		return $twig;
	}

}

new StarterSite();
