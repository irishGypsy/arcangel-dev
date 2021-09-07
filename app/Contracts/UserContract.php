<?php

namespace App\Contracts;

/**
 * Interface UserContract
 * @package App\Contracts
 */
interface UserContract
{
    public function listUsers(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findUserById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createUser(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateUser(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteUser($id);
}
