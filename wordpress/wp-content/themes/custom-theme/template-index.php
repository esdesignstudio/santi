<?php

/**
 * Template Name: 首頁樣板
 */

$context = Timber::context();

// get features (with ACF fields)
$features_args = array(
    'post_type'   => 'projects',
    'fields' => 'ids',
);

for ($x = 0; $x <= count(get_posts( $features_args ))-1; $x++) {
    $features_id[] = get_posts( $features_args )[$x];   
}

for ($x = 0; $x <= count($features_id)-1; $x++) {
    $features_posts [] = Array(
        "id" => get_posts( $features_args )[$x],
        "guid" => get_permalink($features_id[$x]),
        "title" => html_entity_decode(get_the_title($features_id[$x]), ENT_COMPAT, 'UTF-8'),
        "location" => get_field("location", $features_id[$x]),
        "features" => get_field("features", $features_id[$x]),
    );   
}

$context['features_posts'] = $features_posts;

$products_args = array(
    'post_type'   => '[products]',
    'fields' => 'ids',
);

for ($x = 0; $x <= count(get_posts( $products_args ))-1; $x++) {
    $products_id[] = get_posts( $products_args )[$x];   
}

for ($x = 0; $x <= count($products_id)-1; $x++) {
    $products_posts [] = Array(
        "id" => get_posts( $products_args )[$x],
        "guid" => get_permalink($products_id[$x]),
        "title" => html_entity_decode(get_the_title($products_id[$x]), ENT_COMPAT, 'UTF-8'),
        "image" => get_field('feature', $products_id[$x]),
    );   
}

$context['products_posts'] = $products_posts;

Timber::render(array('pages/page-index.twig'), $context);

