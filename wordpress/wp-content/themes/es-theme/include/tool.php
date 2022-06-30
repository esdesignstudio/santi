<?php 
/*------------------------------------*\
    新加入功能
\*------------------------------------*/
// 加入 body class 名稱
function add_slug_to_body_class($classes) {
    global $post;
    if (is_front_page()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);     // 確保只會有英數當 class
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }
    return $classes;
}
add_filter('body_class', 'add_slug_to_body_class');

// 增加 current menu 的 class 為 active
function special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

//特定頁面關閉 Gutenberg
add_filter( 'use_block_editor_for_post', 'es_disable_gutenberg', 10, 2 );
function es_disable_gutenberg( $can_edit, $post ) {
  if( $post->post_type == 'page' && get_page_template_slug( $post->ID ) == 'page-home.php' ) {
    return true;
  }

  return false;
}
?>