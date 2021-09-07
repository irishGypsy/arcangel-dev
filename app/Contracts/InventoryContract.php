<?php

namespace App\Contracts;

/**
 * Interface InventoryContract
 * @package App\Contracts
 */
interface InventoryContract
{
    public function listInventories(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findInventoryById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createInventory(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateInventory(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteInventory($id);
}
