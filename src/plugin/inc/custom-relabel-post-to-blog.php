<?php

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blogs';
    $submenu['edit.php'][5][0] = 'Blogs';
    $submenu['edit.php'][10][0] = 'Add Blog';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blogs';
    $labels->singular_name = 'Blogs';
    $labels->add_new = 'Add Blog';
    $labels->add_new_item = 'Add Blog';
    $labels->edit_item = 'Edit Blog';
    $labels->new_item = 'Blogs';
    $labels->view_item = 'View Blog';
    $labels->search_items = 'Search Blogs';
    $labels->not_found = 'No Blogs found';
    $labels->not_found_in_trash = 'No Blogs found in Trash';
    $labels->all_items = 'All Blogs';
    $labels->menu_name = 'Blogs';
    $labels->name_admin_bar = 'Blogs';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );