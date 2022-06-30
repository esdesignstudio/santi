<?php

function get_seo(Array $field = [])
{
    return array_merge([
        'site_name' => get_bloginfo('name'),
        'title' => wp_get_document_title(),
        'title_template' => get_bloginfo('description'),
        'page_title' => get_the_title(),
        'desc' => get_bloginfo('description'),
        'thumbnail' => get_the_post_thumbnail_url(get_post(2)),
        'lang' => 'zh-hant',
        'url' => get_permalink(),
        'og_type' => 'website'
    ], $field);
}
