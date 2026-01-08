<?php

namespace BlogPosts\Controller;

use BlogPosts\Core\AbstractController;
use BlogPosts\Core\ServiceInterface;
use BlogPosts\Repository\UserRepository;
use BlogPosts\Service\AuthService;

Class LoginController extends AbstractController
{
	private ServiceInterface $authService;

	public function __construct()
	{
		$this->authService = new AuthService(new UserRepository());
	}

    	public function index(): void
	{
		$this->view('login');
	}

	public function logout(): void
	{
		setcookie("auth_token", "", time() - 3600, "/");
		unset($_COOKIE['auth_token']);

		header("location: /");
	}

	public function authenticate(array $params): void
	{
		$user = $this->authService->verifyPassword($params['username'], $params['password']);

		if ($user) {
			if (empty($_COOKIE['auth_token'])) {
				$this->authService->createAuthTokenCookie($user['id']);
			}
		}

		header("location: /");
	}
}
