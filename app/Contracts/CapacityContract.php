<?php

namespace App\Contracts;

/**
 * Interface CapacityContract
 * @package App\Contracts
 */
interface CapacityContract
{
    public function listCapacities(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findCapacityById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCapacity(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCapacity(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCapacity($id);
}
