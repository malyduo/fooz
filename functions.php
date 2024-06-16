<?php

require_once (__DIR__ . '/src/Init.php');

function twentytwentyfour_child_enqueue_styles() {
    wp_enqueue_style('twentytwentyfour-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('twentytwentyfour-child-style', get_stylesheet_uri(), array('twentytwentyfour-style'), wp_get_theme()->get('Version'));

    wp_enqueue_script('twentytwentyfour-child-script', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);
    wp_localize_script('twentytwentyfour-child-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));

    wp_enqueue_style('twentytwentyfour-child-custom-style', get_stylesheet_directory_uri() . '/assets/css/styles.css');
}
add_action('wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_styles');

$init = new Init();
$init->init();