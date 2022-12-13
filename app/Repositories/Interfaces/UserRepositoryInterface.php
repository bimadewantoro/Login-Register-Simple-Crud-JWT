<?php

namespace App\Repositories\Interfaces;

use LaravelEasyRepository\Repository;

interface UserRepositoryInterface extends Repository{

    /**
     * Get all users
     * @return mixed
     */
    public function getAllUsers();

    /**
     * Get user by id
     * @param $id
     * @return mixed
     */
    public function getUserById($id);

    /**
     * Create new user
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data);

    /**
     * Update user by id
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateUser(array $data, $id);

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUser($id);

    /**
     * Login user
     * @param array $data
     * @return mixed
     */
    public function loginUser(array $data);
}
