<?php

require_once(__DIR__ . '/Cpt/Book.php');
require_once(__DIR__ . '/Controller/BookController.php');
require_once(__DIR__ . '/Shortcode/BookShortcode.php');
require_once(__DIR__ . '/Ajax/BookAjax.php');

class Init
{
    public function init(): void
    {
        new Book();
        new BookController();
        new BookShortcode();
        new BookAjax();
    }
}