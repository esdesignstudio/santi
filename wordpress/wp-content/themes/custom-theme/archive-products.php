<?php

$post_type = get_post_type();

if ($post_type) {
    $context = Timber::context();

    $taxonomies = array_reduce(get_object_taxonomies($post_type), function ($acc, $taxonomy) {
        $acc[$taxonomy] = get_terms([
            'taxonomy' => [
                $taxonomy,
            ],
            'hide_empty' => true,
        ]);
        return $acc;
    }, []);


    // get color hex code
    for ($x = 0; $x <= count($taxonomies['color'])-1; $x++) {
        $taxonomies['color'][$x] -> {"hex"} = get_field('color', 'color_' . $taxonomies['color'][$x] -> {"term_id"});
    }

    $context['taxonomies'] = $taxonomies;

    if (is_tax()) {
        /**
         * ?[taxonomy_name]=slug 
         * /[taxonomy_name]/slug 
         */
    }

    if (is_tag()) {
        /** ?tag=slug */
    }

    if (is_category()) {
        /** ?cat=cat_ID */
    }

    // set admin_url
    $admin_url = admin_url( 'admin-ajax.php' );
    $context['admin_url'] = $admin_url;

    // get all products (with ACF fields)
    $products_args = array(
        'posts_per_page' => -1,
        'post_type'   => 'products',
        'orderby' => 'date',
        'order'  => 'ASC',
        'fields' => 'ids',
    );

    for ($x = 0; $x <= count(get_posts( $products_args ))-1; $x++) {
        $products_id[] = get_posts( $products_args )[$x];   
    }

    for ($x = 0; $x <= count($products_id)-1; $x++) {
        $products_posts [] = Array(
            "id" => get_posts( $products_args )[$x],
            "guid" => get_permalink($products_id[$x]),
            "name" => get_the_title($products_id[$x]),
            "product_id" => get_field('product_id', $products_id[$x]),
            "image" => get_field('list_image', $products_id[$x]),
            "categories" => wp_get_post_categories($products_id[$x],  array( 'fields' => 'names' ) ),
            "specifications" => wp_get_post_terms($products_id[$x], "specifications"),
            "color" => wp_get_post_terms($products_id[$x], "color"),
            "space" => wp_get_post_terms($products_id[$x], "space"),
            "new" => get_field('new', $products_id[$x]),
        );   
    }
    $context['products_posts'] = $products_posts;

    Timber::render(array('pages/archive-' . $post_type . '.twig'), $context);
    return;
}
require_once '404.php';
