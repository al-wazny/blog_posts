<?php

namespace BlogPosts\Repository;

use BlogPosts\Core\AbstractRepository;

Class BlogRepository extends AbstractRepository
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function create(array $data): int
       	{
		return -1;
	}

	public function getById(int $id): ?array
	{
		$stmt = $this->db->prepare("SELECT * FROM blog_posts WHERE id = :id");
		$stmt->execute(["id" => $id]);

		return $stmt->fetch();
	}

	public function getAll(): array
	{
		$sql = "SELECT 
			    blog_posts.id AS post_id,
			    blog_posts.title,
			    blog_posts.image_url,
			    blog_posts.content,
			    blog_posts.created_at,
			    users.id AS author_id,
			    users.username AS author_name
			FROM blog_posts
			JOIN users ON blog_posts.author_id = users.id";

		return $this->db->query($sql)->fetchAll();
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
