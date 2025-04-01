<?php
/**
 * Blocks Loader
 */
 
defined('ABSPATH') || exit;

// Enqueue shared AOS assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, true);
    wp_add_inline_script('aos-js', 'AOS.init({ 
        once: true,
        duration: 600,
        offset: 100
    });');
});

// Register blocks with error handling
add_action('init', function() {
    $block_path = get_template_directory() . '/school-blocks/build/aos/block.json';
    
    // Debug output
    error_log('AOS Block Path: ' . $block_path);
    error_log('AOS Block Exists: ' . (file_exists($block_path) ? 'Yes' : 'No'));
    
    // Clean old registration first
    unregister_block_type('fwd-blocks/aos');
    
    // Register new block
    $result = register_block_type($block_path);
    error_log('AOS Registration: ' . ($result ? 'Success' : 'Failed'));
}, 20);