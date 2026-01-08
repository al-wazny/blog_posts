<?php

namespace BlogPosts\Repository;

use BlogPosts\Core\AbstractRepository;

Class UserRepository extends AbstractRepository
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function create(array $data): int
       	{
		//no need to create users so far 
		return -1;
	}

	public function getById(int $id): ?array
	{
		$stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
		$stmt->execute(["id" => $id]);

		return $stmt->fetch();
	}

	public function getAll(): array
	{
		return $this->db->query("SELECT * FROM users")->fetchAll();
	}

	public function update(int $id, array $data): bool
	{
		return false;
	}

	public function delete(int $id): bool
	{
		return false;
	}
}
