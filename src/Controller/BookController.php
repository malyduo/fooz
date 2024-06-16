<?php

class BookController
{
    public function __construct()
    {
        add_action('pre_get_posts', [$this, 'customPostsPerPage']);
    }

    public function customPostsPerPage($query): void
    {
        if (!is_admin() && $query->is_main_query() && is_tax('genre')) {
            $query->set('posts_per_page', 5);
        }
    }
}