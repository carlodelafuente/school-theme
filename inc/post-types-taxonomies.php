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
        'remove_featured_image'    => __( 'Remove student featured image', 'school-theme' ),
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
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
    register_post_type( 'fwd-student', $args );
}
add_action( 'init', 'school_register_custom_post_types' );

function school_register_taxonomies() {
    // Add Student Category taxonomy //////////////////////////////////////////////////////
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
        'rewrite'           => array( 'slug' => 'student-categories' ),
    );
    register_taxonomy( 'fwd-student-category', array( 'fwd-student' ), $args );
}
add_action( 'init', 'school_register_taxonomies' );


// add staff CPT //////////////////////////////////////////////
function staff_register_custom_post_types() {
    $labels = array(
        'name'                     => _x( 'Staff', 'post type general name', 'school-theme' ),
        'singular_name'            => _x( 'Staff', 'post type singular name', 'school-theme' ),
        'add_new'                  => _x( 'Add New', 'staff', 'school-theme' ),
        'add_new_item'             => __( 'Add New staff', 'school-theme' ),
        'edit_item'                => __( 'Edit Staff', 'school-theme' ),
        'new_item'                 => __( 'New Staff', 'school-theme' ),
        'view_item'                => __( 'View Staff', 'school-theme' ),
        'view_items'               => __( 'View Staff', 'school-theme' ),
        'search_items'             => __( 'Search Staff', 'school-theme' ),
        'not_found'                => __( 'No staff found.', 'school-theme' ),
        'not_found_in_trash'       => __( 'No staff found in Trash.', 'school-theme' ),
        'parent_item_colon'        => __( 'Parent Staff:', 'school-theme' ),
        'all_items'                => __( 'All Staff', 'school-theme' ),
        'archives'                 => __( 'Staff Archives', 'school-theme' ),
        'attributes'               => __( 'Staff Attributes', 'school-theme' ),
        'insert_into_item'         => __( 'Insert into Staff', 'school-theme' ),
        'uploaded_to_this_item'    => __( 'Uploaded to this Staff', 'school-theme' ),
        'featured_image'           => __( 'Staff featured image', 'school-theme' ),
        'set_featured_image'       => __( 'Set Staff featured image', 'school-theme' ),
        'remove_featured_image'    => __( 'Remove Staff featured image', 'school-theme' ),
        'use_featured_image'       => __( 'Use as featured image', 'school-theme' ),
        'menu_name'                => _x( 'Staff', 'admin menu', 'school-theme' ),
        'filter_items_list'        => __( 'Filter department list', 'school-theme' ),
        'items_list_navigation'    => __( 'Staff list navigation', 'school-theme' ),
        'items_list'               => __( 'Staff list', 'school-theme' ),
        'item_published'           => __( 'Staff published.', 'school-theme' ),
        'item_published_privately' => __( 'Staff published privately.', 'school-theme' ),
        'item_reverted_to_draft'   => __( 'Staff reverted to draft.', 'school-theme' ),
        'item_trashed'             => __( 'Staff trashed.', 'school-theme' ),
        'item_scheduled'           => __( 'Staff scheduled.', 'school-theme' ),
        'item_updated'             => __( 'Staff updated.', 'school-theme' ),
        'item_link'                => __( 'Staff link.', 'school-theme' ),
        'item_link_description'    => __( 'A link to a Staff.', 'school-theme' ),
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
        'rewrite'            => array( 'slug' => 'staff' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'template'           => array(
            array('core/paragraph', array(
                'placeholder' => 'Enter Job Title...',
            )),
            array('core/paragraph', array(
                'placeholder' => 'Enter Email Address...',
            )),
        ),
        'template_lock'      => 'all',
        'taxonomies'         => array('fwd-staff-department'),
    );

    register_post_type('fwd-staff', $args);
}
add_action('init', 'staff_register_custom_post_types');


function change_staff_title_placeholder($title, $post) {
    if ($post->post_type === 'staff') {
        return 'Add staff name';
    }
    return $title;
}
add_filter('enter_title_here', 'change_staff_title_placeholder', 10, 2);

function register_staff_department_taxonomy() {
    $labels = array(
        'name'                  => _x( 'Department Categories', 'taxonomy general name', 'school-theme' ),
        'singular_name'         => _x( 'Department Category', 'taxonomy singular name', 'school-theme' ),
        'search_items'          => __( 'Search Department Categories', 'school-theme' ),
        'all_items'             => __( 'All Department Categories', 'school-theme' ),
        'parent_item'           => __( 'Parent Department Category', 'school-theme' ),
        'parent_item_colon'     => __( 'Parent Department Category:', 'school-theme' ),
        'edit_item'             => __( 'Edit Department Category', 'school-theme' ),
        'view_item'             => __( 'View Department Category', 'school-theme' ),
        'update_item'           => __( 'Update Department Category', 'school-theme' ),
        'add_new_item'          => __( 'Add New Department Category', 'school-theme' ),
        'new_item_name'         => __( 'New Department Category Name', 'school-theme' ),
        'menu_name'             => __( 'Department Category', 'school-theme' ),
    );

    $args = array(
        'hierarchical'         => true,
        'labels'               => $labels,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'show_in_rest'         => true,
        'show_admin_column'    => true,
        'query_var'            => true,
        'rewrite'              => array( 'slug' => 'department-categories' ),
        // 'capabilities'         => array(
        //     'manage_terms' => 'do_not_allow',
        //     'edit_terms'   => 'do_not_allow',
        //     'delete_terms' => 'do_not_allow', 
        //     'assign_terms' => 'edit_posts',
        // ),
    );

    register_taxonomy('fwd-staff-department', 'fwd-staff', $args);
}
add_action('init', 'register_staff_department_taxonomy');





    function school_rewrite_flush() {
        school_register_custom_post_types();
        school_register_taxonomies();
        flush_rewrite_rules();
    }
    add_action( 'after_switch_theme', 'school_rewrite_flush' );