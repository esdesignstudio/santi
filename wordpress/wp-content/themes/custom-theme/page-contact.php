<?php

$context = Timber::context();

if (isset($_COOKIE['product'])) {
    $cookie = json_decode($_COOKIE['product']);

    for ($x = 0; $x <= count($cookie)-1; $x++) {
        $products [] = Array(
            "id" => $cookie[$x],
            "image" => get_field('list_image', $cookie[$x]),
            "name" => get_the_title($cookie[$x]),
        );   
    }
    if (!empty($products)) {
        $context['products'] = $products;
    }
}

$context['admin_url'] = admin_url( 'admin-ajax.php' );

Timber::render(array('pages/page-contact.twig'), $context);

