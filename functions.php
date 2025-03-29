<?php
function mindset_enqueues() {
	// Load style.css on the front-end
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


add_action('wp_enqueue_scripts', 'mindset_enqueues');