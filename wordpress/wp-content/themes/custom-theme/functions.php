<?php


/*------------------------------------*\
    版本訊息
\*------------------------------------*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', '網站更新訊息', 'custom_dashboard_help');
}
function custom_dashboard_help() {
    $ES_update = include("update.txt");
    echo "<p>$ES_update</p>";
}
/*------------------------------------*\
    載入外部檔案
\*------------------------------------*/
// include_once "include/cpt.php";         // 自定義文章
include_once "include/nav.php";         // 選單
// include_once "include/widget.php";      // 側邊欄小工具
include_once "include/shortcode.php";   // shortcode
include_once "include/tool.php";        // 新增功能
include_once "include/admin.php";       // 後台相關設定

/*------------------------------------*\
    增加主題支援功能
\*------------------------------------*/
if (function_exists('add_theme_support')) {
    add_theme_support( 'post-thumbnails', array( 'post' ) );
    add_theme_support('menus');
}
/*------------------------------------*\
    載入網站資源
\*------------------------------------*/
//載入 js                                                                                   
function easondesign_lang_header_scripts() {      
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/lib/modernizr-2.7.1.min.js', array(), null);
        wp_enqueue_script('modernizr');
        wp_register_script('support', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null);
        wp_enqueue_script('support');
        wp_register_script('esjs', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null);
        wp_enqueue_script('esjs');
    }
}
add_action('init', 'easondesign_lang_header_scripts'); 
// 載入 css
function easondesign_styles() {
    wp_register_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), null, 'all');
    wp_enqueue_style('normalize'); 
    wp_register_style('ani', get_template_directory_uri() . '/assets/css/ani.css', array(), null, 'all');
    wp_enqueue_style('ani'); 
    wp_register_style('escss', get_template_directory_uri() . '/assets/css/main.css', array(), null, 'all');
    wp_enqueue_style('escss'); 
    wp_register_style('rwd', get_template_directory_uri() . '/assets/css/rwd.css', array(), null, 'all');
    wp_enqueue_style('rwd'); 
}
add_action('wp_enqueue_scripts', 'easondesign_styles');


/*------------------------------------*\  
	Actions + Filters 
\*------------------------------------*/
add_filter('show_admin_bar', '__return_false'); //在前臺不顯示 admin 選單

// add_filter('xmlrpc_enabled', '__return_false'); //關閉預設的 xml發布功能，增加安全性，此使用會影響到 Jetpack外掛
// remove_action('wp_head', 'feed_links_extra', 3);
// remove_action('wp_head', 'feed_links', 2);
// remove_action('wp_head', 'rsd_link');
// remove_action('wp_head', 'wlwmanifest_link'); 
// remove_action('wp_head', 'index_rel_link');
// remove_action('wp_head', 'parent_post_rel_link', 10, 0);
// remove_action('wp_head', 'start_post_rel_link', 10, 0);
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// remove_action('wp_head', 'wp_generator');
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'rel_canonical');
// remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// remove_action('wp_head', 'print_emoji_detection_script', 7 );
// remove_action('wp_print_styles', 'print_emoji_styles' );
// remove_action('welcome_panel', 'wp_welcome_panel');
// remove_filter('the_excerpt', 'wpautop');

?>
