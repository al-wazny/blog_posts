<?php

namespace BlogPosts\Controller;

use BlogPosts\Core\AbstractController;
use BlogPosts\Core\ServiceInterface;
use BlogPosts\Repository\BlogRepository;
use BlogPosts\Service\BlogService;

Class BlogController extends AbstractController
{
	private ServiceInterface $blogService;

	public function __construct()
	{
		$this->blogService = new BlogService(new BlogRepository());
	}

    	public function index(): void
	{
		$allBlogs = $this->blogService->getAllBlogs();
		$this->view('index', ['posts' => $allBlogs]);
	}

	public function detail(array $params): void
	{
		$id = $params['id'];
		$post = $this->blogService->getSpecificBlog($id);
		var_dump($post);
		$this->view("blog", ["post" => $post]);
	}
}
