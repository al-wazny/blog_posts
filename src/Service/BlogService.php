<?php

namespace BlogPosts\Service;

use BlogPosts\Core\ServiceInterface;
use BlogPosts\Core\AbstractRepository;
use PDOException;

Class BlogService implements ServiceInterface
{
	protected AbstractRepository $repository;

	public function __construct(AbstractRepository $repository)
	{
		$this->repository = $repository;
	}

	public function getAllBlogs(): array
	{
		return $this->repository->getAll();
	}

	public function getSpecificBlog($id): array
	{
		return $this->repository->getById($id);
	}

	public function storePost(array $params): void
	{
		try {
			$this->repository->create($params);
		} catch (PDOException $e) {
			echo "couldn't store new post" . $e->getMessage();
		}
	}

	public function addCommentToPost(array $params): void
	{
		// TODO
	}
}
