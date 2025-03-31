<?php
function school_enqueues() {

	wp_enqueue_style( 
		'school-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' ),
		'all'
	);

    wp_enqueue_style( 
        'school-normalize', 
        'https://unpkg.com/@csstools/normalize.css', 
        array(), 
        '12.1.0'
    );



}
add_action('wp_enqueue_scripts', 'school_enqueues');

function school_setup() {

	add_editor_style( get_stylesheet_uri() );


    add_image_size( '400x500', 400, 500, true );
    add_image_size( '200x250', 200, 250, true );
    add_image_size( '400x200', 400, 200, true );
    add_image_size( '800x400', 800, 400, true );
}
add_action( 'after_setup_theme', 'school_setup' );

function school_add_custom_image_sizes( $size_names ) {
	$new_sizes = array(
		'400x500' => __( '400x500', 'school-theme' ),
		'200x250' => __( '200x250', 'school-theme' ),
        '400x200' => __( '400x200', 'school-theme' ),
		'800x400' => __( '800x400', 'school-theme' ),
	);
	return array_merge( $size_names, $new_sizes );
}
add_filter( 'image_size_names_choose', 'school_add_custom_image_sizes' );

function enqueue_lightgallery_on_home() {
    if (is_front_page()) {
        // Load LightGallery CSS & JS
        wp_enqueue_style('lightgallery-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css', array(), '1.4.0');
        wp_enqueue_script('lightgallery-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js', array('jquery'), '1.4.0', true);
        
        // Load custom JS to initialize LightGallery
        wp_enqueue_script('custom-lightgallery-init', get_template_directory_uri() . '/js/lightgallery-init.js', array('lightgallery-js'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_lightgallery_on_home');


require get_template_directory() . '/inc/post-types-taxonomies.php';