<?php

function school_register_custom_post_types() {
    // STUDENTS CPT //////////////////////////////////////////////////////
    $labels = array(
        'name'                     => _x( 'Students', 'post type general name', 'school-theme' ),
        'singular_name'            => _x( 'Student', 'post type singular name', 'school-theme' ),
        'add_new'                  => _x( 'Add New', 'student', 'school-theme' ),
        'add_new_item'             => __( 'Add New Student', 'school-theme' ),
        'edit_item'                => __( 'Edit Student', 'school-theme' ),
        'new_item'                 => __( 'New Student', 'school-theme' ),
        'view_item'                => __( 'View Student', 'school-theme' ),
        'view_items'               => __( 'View Students', 'school-theme' ),
        'search_items'             => __( 'Search Students', 'school-theme' ),
        'not_found'                => __( 'No students found.', 'school-theme' ),
        'not_found_in_trash'       => __( 'No students found in Trash.', 'school-theme' ),
        'parent_item_colon'        => __( 'Parent Students:', 'school-theme' ),
        'all_items'                => __( 'All Students', 'school-theme' ),
        'archives'                 => __( 'Student Archives', 'school-theme' ),
        'attributes'               => __( 'Student Attributes', 'school-theme' ),
        'insert_into_item'         => __( 'Insert into student', 'school-theme' ),
        'uploaded_to_this_item'    => __( 'Uploaded to this student', 'school-theme' ),
        'featured_image'           => __( 'Student featured image', 'school-theme' ),
        'set_featured_image'       => __( 'Set student featured image', 'school-theme' ),
        'remove_featured_image'    => __( 'Remove studnet featured image', 'school-theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'school-theme' ),
        'menu_name'                => _x( 'Students', 'admin menu', 'school-theme' ),
        'filter_items_list'        => __( 'Filter student list', 'school-theme' ),
        'items_list_navigation'    => __( 'Students list navigation', 'school-theme' ),
        'items_list'               => __( 'Students list', 'school-theme' ),
        'item_published'           => __( 'Student published.', 'school-theme' ),
        'item_published_privately' => __( 'Student published privately.', 'school-theme' ),
        'item_revereted_to_draft'  => __( 'Student reverted to draft.', 'school-theme' ),
        'item_trashed'             => __( 'Student trashed.', 'school-theme' ),
        'item_scheduled'           => __( 'Student scheduled.', 'school-theme' ),
        'item_updated'             => __( 'Student updated.', 'school-theme' ),
        'item_link'                => __( 'Student link.', 'school-theme' ),
        'item_link_description'    => __( 'A link to a Student.', 'school-theme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'editor', 'featured-image' ),
    );
    register_post_type( 'fwd-student', $args );
}
add_action( 'init', 'school_register_custom_post_types' );

function school_register_taxonomies() {
    // Add Work Category taxonomy //////////////////////////////////////////////////////
    $labels = array(
        'name'                  => _x( 'Student Categories', 'taxonomy general name', 'school-theme' ),
        'singular_name'         => _x( 'Student Category', 'taxonomy singular name', 'school-theme' ),
        'search_items'          => __( 'Search Student Categories', 'school-theme' ),
        'all_items'             => __( 'All Student Category', 'school-theme' ),
        'parent_item'           => __( 'Parent Student Category', 'school-theme' ),
        'parent_item_colon'     => __( 'Parent Student Category:', 'school-theme' ),
        'edit_item'             => __( 'Edit Student Category', 'school-theme' ),
        'view_item'             => __( 'View Student Category', 'school-theme' ),
        'update_item'           => __( 'Update Student Category', 'school-theme' ),
        'add_new_item'          => __( 'Add New Student Category', 'school-theme' ),
        'new_item_name'         => __( 'New Student Category Name', 'school-theme' ),
        'template_name'         => __( 'Student Category Archives', 'school-theme' ),
        'menu_name'             => __( 'Student Category', 'school-theme' ),
        'not_found'             => __( 'No student categories found.', 'school-theme' ),
        'no_terms'              => __( 'No student categories', 'school-theme' ),
        'items_list_navigation' => __( 'Student Categories list navigation', 'school-theme' ),
        'items_list'            => __( 'Student Categories list', 'school-theme' ),
        'item_link'             => __( 'Student Category Link', 'school-theme' ),
        'item_link_description' => __( 'A link to a student category.', 'school-theme' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'work-categories' ),
    );
    register_taxonomy( 'fwd-student-category', array( 'fwd-student' ), $args );
}
add_action( 'init', 'school_register_taxonomies' );





    function school_rewrite_flush() {
        school_register_custom_post_types();
        school_register_taxonomies();
        flush_rewrite_rules();
    }
    add_action( 'after_switch_theme', 'school_rewrite_flush' );