<?php

namespace BlogPosts\Service;

use BlogPosts\Core\ServiceInterface;
use BlogPosts\Core\AbstractRepository;

Class AuthService implements ServiceInterface
{
	protected AbstractRepository $repository;

	public function __construct(AbstractRepository $repository)
	{
		$this->repository = $repository;
	}

	public function verifyPassword(string $username, string $password): ?array
	{
		$user = $this->repository->getByUsername($username);

		if (password_verify($password, $user["password"])) {
			return $user;
		}

		return null;
	}

	public function createAuthTokenCookie(string $userId): void
	{
		$expires = time() + (60 * 60 * 24 * 7); // 7 days
	// 	$payload = $userId . '|' . $expires;
	// 	$secret_salt = 'company_secret';
	// 
	// 	$signature = hash_hmac('sha256', $payload, $secret_salt);
	// 	$token = base64_encode($payload . '|' . $signature);
		setcookie(
			'user_id',
			$userId,
			[
				'expires'  => $expires,
				'path'     => '/',
				'httponly' => true,
				'secure'   => false, // true in HTTPS
				'samesite' => 'Lax',
			]
		);
	}

	public function isLoggedIn(): bool
	{
		return isset($_COOKIE['user_id']);
	}
}
