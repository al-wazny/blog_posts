<?php

namespace BlogPosts\Core;

use PDO;

abstract class AbstractRepository
{
    protected PDO $db;

    /**
     * Constructor
     * @param PDO|null $db Optional PDO instance, otherwise uses Database singleton
     */
    public function __construct()
    {
        // Use the provided PDO instance, or get the singleton from Database
        $this->db = Database::getInstance();
    }

    /**
     * Create a new record.
     * @param array $data Associative array of column => value
     * @return int ID of the newly created record
     */
    abstract public function create(array $data): int;

    /**
     * Get a record by its ID
     * @param int $id
     * @return array|null Associative array of record or null if not found
     */
    abstract public function getById(int $id): ?array;

    /**
     * Get all records
     * @return array Array of associative arrays
     */
    abstract public function getAll(): array;

    /**
     * Update a record by its ID
     * @param int $id
     * @param array $data Associative array of column => value
     * @return bool True if updated, false otherwise
     */
    abstract public function update(int $id, array $data): bool;

    /**
     * Delete a record by its ID
     * @param int $id
     * @return bool True if deleted, false otherwise
     */
    abstract public function delete(int $id): bool;
}
