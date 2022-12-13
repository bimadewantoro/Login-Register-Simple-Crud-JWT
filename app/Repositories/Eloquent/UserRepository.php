<?php

namespace App\Repositories\Eloquent;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends Eloquent implements UserRepositoryInterface{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Get all users
     * @return mixed
     */
    public function getAllUsers()
    {
        return $this->model->all();
    }

    /**
     * Get user by id
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        return $this->model->
            where('id', $id)->
            first();
    }

    /**
     * Create new user
     * @param array $data
     * @return mixed
     */
    public function createUser(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Login user
     * @param array $data
     * @return mixed
     */
    public function loginUser(array $data)
    {
        return $this->model->
            where('email', $data['email'])->
            where('password', $data['password'])->
            first();
    }

    /**
     * Logout user
     * @param array $data
     * @return mixed
     */
    public function logoutUser(array $data)
    {
        return $this->model->
            where('email', $data['email'])->
            where('password', $data['password'])->
            first();
    }

    /**
     * Update user by id
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateUser(array $data, $id)
    {
        return $this->model->
            where('id', $id)->
            update($data);
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUser($id)
    {
        return $this->model->
            where('id', $id)->
            delete();
    }
}
