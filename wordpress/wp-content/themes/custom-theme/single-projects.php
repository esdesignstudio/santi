<?php

$context = Timber::context();

$products_id = $posts[0]->custom['products'];

for ($x = 0; $x <= count($products_id)-1; $x++) {
    $products_posts [] = Array(
        "image" => get_field('list_image', $products_id[$x]),
        "name" => get_the_title($products_id[$x]),
        "guid" => get_permalink($products_id[$x]),
    );   
}

$context['products'] = $products_posts;

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

Timber::render(array('pages/single-' . $context['post']->post_type . '.twig'), $context);
