<?php

class BookAjax
{
    public function __construct()
    {
        add_action('wp_ajax_get_books_list', [$this, 'getBooksListCallback']);
        add_action('wp_ajax_nopriv_get_books_list', [$this, 'getBooksListCallback']);
    }

    function getBooksListCallback(): void
    {
        $args = array(
            'post_type' => 'book',
            'posts_per_page' => 20,
            'orderby' => 'date',
            'order' => 'DESC',
        );

        $query = new WP_Query($args);

        $books = array();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                $bookName = get_the_title();
                $bookDate = get_the_date('Y-m-d');
                $bookGenre = wp_get_post_terms(get_the_ID(), 'genre', array('fields' => 'names'));
                $bookExcerpt = get_the_excerpt();

                $book = array(
                    'name' => $bookName,
                    'date' => $bookDate,
                    'genre' => $bookGenre,
                    'excerpt' => $bookExcerpt,
                );

                $books[] = $book;
            }
            wp_reset_postdata();
        }

        wp_send_json($books);
    }
}