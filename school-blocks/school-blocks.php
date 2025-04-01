<?php
/**
 * Blocks Loader
 */

// Auto-register all blocks
foreach (glob(__DIR__ . '/build/*/block.json') as $block_json) {
    register_block_type($block_json);
}

// Enqueue shared AOS assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, true);
    wp_add_inline_script('aos-js', 'AOS.init({ 
        once: true,
        duration: 600,
        // Add other settings here
    });');
});

error_log('BLOCK PATH: ' . __DIR__ . '/build/aos/block.json');
error_log('BLOCK EXISTS: ' . (file_exists(__DIR__ . '/build/aos/block.json') ? 'YES' : 'NO'));

$result = register_block_type(__DIR__ . '/build/aos/block.json');
error_log('REGISTRATION RESULT: ' . ($result ? 'SUCCESS' : 'FAILED'));

function fix_aos_registration() {
    // First unregister the old namespace
    unregister_block_type('fwd-blocks/aos');
    
    // Then register with correct namespace
    $result = register_block_type(__DIR__ . '/build/aos/block.json');
    error_log('AOS Re-registration: ' . ($result ? 'Success' : 'Failed'));
}
add_action('init', 'fix_aos_registration', 20);