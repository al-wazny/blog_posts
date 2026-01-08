<?php

namespace BlogPosts\Service;

use BlogPosts\Core\ServiceInterface;
use BlogPosts\Core\AbstractRepository;

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
}
