<?php
// 註冊兩組選單 
function main_menu(){
    wp_nav_menu(
    array(
        'theme_location'  => 'main_menu',//選單的位置
        'menu'            => '期望顯示',//期望顯示的選單
        'container'       => 'div',//容器標籤
        'container_class' => 'main_menu',                    
        'container_id'    => '',               
        'menu_class'      => '',//ul
        'menu_id'         => 'menu_first',//ul
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',//此選單不存在時，返回默認菜單，設爲false則不返回
        'before'          => '',//a標籤之前
        'after'           => '',//a標籤之後
        'link_before'     => '',//a標籤內文本之前
        'link_after'      => '',//a標籤內文本之後
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,//選單深度
        'walker'          => ''//更高客製化，在進階課程才會講到
        )
    );
}
function es_register(){
    register_nav_menus(array( 
        //可自定義名稱
        'main_menu'   => __('主要選單'), 
    ));
}
add_action('init', 'es_register');
?>