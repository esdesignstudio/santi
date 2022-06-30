<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */

add_filter( 'acf/settings/rest_api_format', function () {
    return 'standard';
} );

require_once 'functions/index.php';
require_once 'api/index.php';

add_filter( 'allowed_http_origins', 'add_allowed_origins' );
function add_allowed_origins( $origins ) {
   $origins[] = 'http://192.168.50.60:3000';
   $origins[] = 'http://localhost:3000';
   return $origins;
}

add_action('wp_ajax_contact_form_mail','contact_form_mail');
add_action('wp_ajax_nopriv_contact_form_mail','contact_form_mail');

function contact_form_mail(){
    $data = $_POST['contact_form'];
    $products_id = $_POST['products_id'];

    if (!empty($products_id)) {
        for ($x = 0; $x <= count($products_id)-1; $x++) {
            $products [] = get_the_title($products_id[$x]);
        }
    }

    $custome_user_email = array('letsohyeah@gmail.com');
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
    $message .= '<tr><td class="title">詢問產品</td><td>' . implode(", ", $products) . '</td></tr>';
    $message .= '</table>';
    $message .= '</div>';
    $message .= '<p>&nbsp;</p><p style="text-align:center;">此封Email來自於 《EStest》 最新訊息公告郵件。</p>';
    $message .= '</html>';

    $mailResult = false;
    $mailResult = wp_mail($custome_user_email, $subject, $message, $message_headers);
    wp_send_json($mailResult);
}

register_taxonomy( 'color', ['products', 'projects'], [
    'label'              => '顏色',
    'public'             => true,
    'show_ui'            => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'show_in_quick_edit' => true,
    'default_term'       => [
        'name' => '未分類',
        'slug' => 'uncategorized',
    ],
]);

register_taxonomy( 'bolon_studio', ['products', 'projects'], [
    'label'              => 'BOLON STUDIO™',
    'public'             => true,
    'show_ui'            => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'show_in_quick_edit' => true,
    'default_term'       => [
        'name' => '未分類',
        'slug' => 'uncategorized',
    ],
]);

register_taxonomy( 'specifications', ['products', 'projects'], [
    'label'              => '規格',
    'public'             => true,
    'show_ui'            => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'show_in_quick_edit' => true,
    'default_term'       => [
        'name' => '未分類',
        'slug' => 'uncategorized',
    ],
]);

register_taxonomy( 'space', ['products', 'projects'], [
    'label'              => '適用區域',
    'public'             => true,
    'show_ui'            => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'show_in_quick_edit' => true,
    'default_term'       => [
        'name' => '未分類',
        'slug' => 'uncategorized',
    ],
]);

register_taxonomy( 'area', ['projects'], [
    'label'              => '面積',
    'public'             => true,
    'show_ui'            => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'show_in_quick_edit' => true,
    'default_term'       => [
        'name' => '未分類',
        'slug' => 'uncategorized',
    ],
]);

register_taxonomy( 'nation', ['projects'], [
    'label'              => '國家',
    'public'             => true,
    'show_ui'            => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_admin_column' => true,
    'hierarchical' => true,
    'show_in_quick_edit' => true,
    'default_term'       => [
        'name' => '未分類',
        'slug' => 'uncategorized',
    ],
]);

if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Add styles inline.
		wp_add_inline_style( 'twentytwentytwo-style', twentytwentytwo_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

if ( ! function_exists( 'twentytwentytwo_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', twentytwentytwo_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'twentytwentytwo_editor_styles' );


if ( ! function_exists( 'twentytwentytwo_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions twentytwentytwo_styles() and twentytwentytwo_editor_styles() above.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return string
	 */
	function twentytwentytwo_get_font_face_styles() {

		return "
		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Italic.ttf.woff2' ) . "') format('woff2');
		}
		";

	}

endif;

if ( ! function_exists( 'twentytwentytwo_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'twentytwentytwo_preload_webfonts' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
