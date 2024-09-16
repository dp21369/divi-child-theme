<?php
function dt_enqueue_styles(){
    $parenthandle = 'divi-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
}
add_action( 'wp_enqueue_scripts', 'dt_enqueue_styles' );

function custom_enqueue_styles(){
 wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/custom-style.css', time(), true);
wp_enqueue_script('custom-custom-script', get_stylesheet_directory_uri() . '/scripts.js', array('jquery'), time());
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles', 999);