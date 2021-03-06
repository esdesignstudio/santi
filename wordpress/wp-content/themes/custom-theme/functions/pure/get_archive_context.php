<?php
function get_archive_context()
{
    $context = [];

    if(is_archive()){
        global $posts;
        $post_type = get_post_type();
        $context['posts'] = $posts;
        $context['posts']['pagination'] = new Timber\Pagination();
        $context['fields'] = get_fields($post_type . '_options');
        $context['seo'] = get_seo($fields['seo'] ?? []);
        $context['title'] = post_type_archive_title(null, false);
        $context['breadcrumb'] = get_breadcrumb('main_menu', function ($item) use ($post_type) {
            return $item['url'] == get_post_type_archive_link($post_type);
        });
    }

    return $context;
}