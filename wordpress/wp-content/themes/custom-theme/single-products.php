<?php

$context = Timber::context();

$context['specifications'] = get_the_terms(get_the_ID(), 'specifications');
$context['bolon_studio'] = get_the_terms(get_the_ID(), 'bolon_studio');
$term = get_the_terms(get_the_ID(), 'category');

$context['category'] = Array(
    "name" => get_the_terms(get_the_ID(), 'category')[0] -> name,
    "description" => get_the_terms(get_the_ID(), 'category')[0] -> description,
    "banner" => get_field('banner', array_pop($term)),
);

$projects_id = $posts[0]->custom['projects'];

for ($x = 0; $x <= count($projects_id)-1; $x++) {
    $projects_posts [] = Array(
        "image" => get_field('list_image', $projects_id[$x]),
        "name" => get_the_title($projects_id[$x]),
        "location" => get_field('location', $projects_id[$x]),
        "guid" => get_permalink($projects_id[$x]),
    );   
}

$context['projects'] = $projects_posts;

$products_id = $posts[0]->custom['relative'];

for ($x = 0; $x <= count($products_id)-1; $x++) {
    $products_posts [] = Array(
        "image" => get_field('list_image', $products_id[$x]),
        "name" => get_the_title($products_id[$x]),
        "guid" => get_permalink($products_id[$x]),
    );   
}

$context['products'] = $products_posts;

Timber::render(array('pages/single-' . $context['post']->post_type . '.twig'), $context);
