<?php 
/*------------------------------------*\
    後臺相關功能
\*------------------------------------*/
function new_login_logo() {                                                             /* 自訂登入畫面LOGO */ 
     echo '<style type="text/css">
     .login h1 a { background-image:url('.get_template_directory_uri().'/assets/imgs/company-logo.png) !important; background-size: 270px 110px!important; width:270px!important; height:110px !important; }
     </style>';
}
add_action('login_head', 'new_login_logo' );

//登入用的css
function eslogin_style() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/include/asset/login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/include/asset/login.css' );
}
add_action( 'login_enqueue_scripts', 'eslogin_style' );

function custom_loginlogo_url($url) { return get_bloginfo('url'); }                     /* 變更自訂登入畫面上LOGO的連結 */ 
add_filter('login_headerurl', 'custom_loginlogo_url' );

function put_my_title(){ return ('FemtoPath'); }                                        /* 變更自訂登入畫面上LOGO的Hover所出現的標題 */
add_filter('login_headertext', 'put_my_title');

function remove_wp_logo( $wp_admin_bar ) { $wp_admin_bar->remove_node( 'wp-logo' ); }   /* 移除控制台左上角WP-LOGO */ 
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function custom_dashboard_footer () {                                                   /* 修改後台底下的wordpress文字宣告 */ 
    echo '網站設計單位 : <a href="https://e-s.tw" target="_blank">ES Design Studio</a>，技術採用：開源程式<a href="https://wordpress.org/" target="_blank">Wordpress CMS</a>'; 
}
add_filter('admin_footer_text', 'custom_dashboard_footer');

function change_footer_admin () {return '&nbsp;';}                                      /* 隱藏後台右下角wp版本號 */ 
add_filter('admin_footer_text', 'change_footer_admin', 9999);

function change_footer_version() {return ' ';}
add_filter( 'update_footer', 'change_footer_version', 9999);



/* 強制關閉後台登入首頁的小工具 */ 
function wpc_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // 活動
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);        // 現況
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);  // 近期迴響
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);   // 收到新鏈結
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);          // 外掛
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);        // 快貼
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);      // 近期草稿
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);            // WordPress Blog
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);          // Other WordPress News
}
add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');



/* 允許後臺上傳 svg */
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/*------------------------------------*\
    手動關閉某些權限
\*------------------------------------*/

function es_remove_menu_items() {
    if( !current_user_can( 'administrator' ) ):
        remove_menu_page( 'edit.php?post_type=cfs' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'wpcf7' );
        remove_menu_page( 'update-core.php' );
        remove_submenu_page( 'themes.php','widgets.php' );
        global $submenu;
        // Appearance Menu
        unset($submenu['themes.php'][6]); // Customize
        add_action('admin_enqueue_scripts', 'custom_style');
    endif;
}
add_action( 'admin_menu', 'es_remove_menu_items' );

/*------------------------------------*\
    載入後台 css & js
\*------------------------------------*/

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/include/asset/style.css');
  wp_enqueue_script('admin-scripts', get_template_directory_uri().'/include/asset/scripts.js');
}
add_action('admin_enqueue_scripts', 'admin_style');

function custom_style() {
  wp_enqueue_style('custom-styles', get_template_directory_uri().'/include/asset/custom.css');
}



?>