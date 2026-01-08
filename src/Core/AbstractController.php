<?php

namespace BlogPosts\Core;

abstract class AbstractController
{
    abstract public function index(): void;

    protected function view(String $page, array $params = []): void
    {
        extract($params);
        // Include the template file
        include __DIR__ . "/../../views/$page.html.php";
    }
}
