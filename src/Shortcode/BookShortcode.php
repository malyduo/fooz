<?php

class BookShortcode
{
    public function __construct()
    {
        add_shortcode('recent_book_title', [$this, 'getMostRecentBookTitle']);
        add_shortcode('genre_books_list', array($this, 'getGenreBooksList'));
    }

    public function getMostRecentBookTitle(): string
    {
        $args = array(
            'post_type' => 'book',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $query->the_post();
            $title = get_the_title();
            wp_reset_postdata();
            return $title;
        }

        return 'No recent books';
    }

    public function getGenreBooksList($atts): string
    {
        $atts = shortcode_atts(array(
            'genre_id' => '',
        ), $atts);

        if (! $atts['genre_id']) {
            return 'Please specify a genre ID.';
        }

        $args = array(
            'post_type'      => 'book',
            'posts_per_page' => 5,
            'orderby'        => 'title',
            'order'          => 'ASC',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'genre',
                    'field'    => 'term_id',
                    'terms'    => $atts['genre_id'],
                ),
            ),
        );

        $query = new WP_Query($args);
        $booksList = '';

        if ($query->have_posts()) {
            $booksList .= '<ul>';
            while ($query->have_posts()) {
                $query->the_post();
                $booksList .= '<li>' . get_the_title() . '</li>';
            }
            $booksList .= '</ul>';
            wp_reset_postdata();
        } else {
            $booksList = 'No books found in this genre.';
        }

        return $booksList;
    }
}