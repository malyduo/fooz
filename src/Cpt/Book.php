<?php

class Book
{
    public function __construct()
    {
        add_action('init', [$this, 'registerCPT']);
        add_action('init', [$this, 'registerTaxonomy']);
    }

    public function registerCPT(): void
    {
        $labels = array(
            'name' => _x('Books', 'Post type general name', 'textdomain'),
            'singular_name' => _x('Book', 'Post type singular name', 'textdomain'),
            'menu_name' => _x('Books', 'Admin Menu text', 'textdomain'),
            'name_admin_bar' => _x('Book', 'Add New on Toolbar', 'textdomain'),
            'add_new' => __('Add New', 'textdomain'),
            'add_new_item' => __('Add New Book', 'textdomain'),
            'new_item' => __('New Book', 'textdomain'),
            'edit_item' => __('Edit Book', 'textdomain'),
            'view_item' => __('View Book', 'textdomain'),
            'all_items' => __('All Books', 'textdomain'),
            'search_items' => __('Search Books', 'textdomain'),
            'parent_item_colon' => __('Parent Books:', 'textdomain'),
            'not_found' => __('No books found.', 'textdomain'),
            'not_found_in_trash' => __('No books found in Trash.', 'textdomain'),
            'featured_image' => _x(
                'Book Cover Image',
                'Overrides the “Featured Image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'set_featured_image' => _x(
                'Set cover image',
                'Overrides the “Set featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'remove_featured_image' => _x(
                'Remove cover image',
                'Overrides the “Remove featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'use_featured_image' => _x(
                'Use as cover image',
                'Overrides the “Use as featured image” phrase for this post type.',
                'textdomain'
            ),
            'archives' => _x(
                'Book archives',
                'The post type archive label used in nav menus. Default “Post Archives”.',
                'textdomain'
            ),
            'insert_into_item' => _x(
                'Insert into book',
                'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post).',
                'textdomain'
            ),
            'uploaded_to_this_item' => _x(
                'Uploaded to this book',
                'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post).',
                'textdomain'
            ),
            'filter_items_list' => _x(
                'Filter books list',
                'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/“Filter pages list”.',
                'textdomain'
            ),
            'items_list_navigation' => _x(
                'Books list navigation',
                'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/“Pages list navigation”.',
                'textdomain'
            ),
            'items_list' => _x(
                'Books list',
                'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/“Pages list”.',
                'textdomain'
            ),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'library'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'author', 'thumbnail', 'excerpt', 'comments'),
            'show_in_rest' => true,
        );

        register_post_type('book', $args);
    }

    public function registerTaxonomy()
    {
        $labels = array(
            'name' => _x('Genres', 'taxonomy general name', 'textdomain'),
            'singular_name' => _x('Genre', 'taxonomy singular name', 'textdomain'),
            'search_items' => __('Search Genres', 'textdomain'),
            'all_items' => __('All Genres', 'textdomain'),
            'parent_item' => __('Parent Genre', 'textdomain'),
            'parent_item_colon' => __('Parent Genre:', 'textdomain'),
            'edit_item' => __('Edit Genre', 'textdomain'),
            'update_item' => __('Update Genre', 'textdomain'),
            'add_new_item' => __('Add New Genre', 'textdomain'),
            'new_item_name' => __('New Genre Name', 'textdomain'),
            'menu_name' => __('Genre', 'textdomain'),
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'book-genre'),
            'show_in_rest' => true,
        );

        register_taxonomy('genre', array('book'), $args);
    }
}