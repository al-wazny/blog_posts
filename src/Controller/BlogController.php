<?php

namespace BlogPosts\Controller;

use BlogPosts\Core\AbstractController;
use BlogPosts\Core\ServiceInterface;
use BlogPosts\Repository\BlogRepository;
use BlogPosts\Service\BlogService;
use BlogPosts\Repository\UserRepository;
use BlogPosts\Service\AuthService;

Class BlogController extends AbstractController
{
	private ServiceInterface $blogService;

	private ServiceInterface $authService;

	public function __construct()
	{
		$this->blogService = new BlogService(new BlogRepository());
		$this->authService = new AuthService(new UserRepository());
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
		$this->view("blog", ["post" => $post]);
	}

	public function create(array $params): void
	{
		if ($this->authService->isLoggedIn()){
			$this->view('new_post');
		} else {
			header("location: /");
		}
	}

	public function store(array $params): void
	{
		$this->blogService->storePost($params);
		header("location: /");
	}
}
