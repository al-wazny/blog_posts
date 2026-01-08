<?php

namespace BlogPosts\Repository;

use BlogPosts\Core\AbstractRepository;
use PDOException;

Class BlogRepository extends AbstractRepository
{
	public function __construct() 
	{
		parent::__construct();
	}

	public function create(array $data): int
       	{
		$title = $data['title'];
		$imgUrl = $data['image_url'];
		$content = $data['content'];
		$userId = $data['user_id'];

		$sql = "INSERT INTO blog_posts (title, image_url, author_id, content, created_at)
			VALUES (
				:title,
				:image_url,
				:user_id,
				:content,
				NOW() 
			);";

		$stmt = $this->db->prepare($sql);
		$successful = $stmt->execute([
			"title" => $title,
			"image_url" => $imgUrl,
			"user_id" => $userId,
			"content" => $content
		]);

		if ($successful) {
		    return (int) $this->db->lastInsertId();
		} else {
			throw PDOException;
		}

	}

	public function getById(int $id): ?array
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
			JOIN users ON blog_posts.author_id = users.id
			WHERE blog_posts.id = :id";

		$stmt = $this->db->prepare($sql);
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

	// (INFO) because of the DB Table configuration when a user is delted from 
	// the DB all his blog entries related to his id are alsobeing deleted
	public function delete(int $id): bool
	{
		return false;
	}
}
