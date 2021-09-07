<?php

namespace App\Contracts;

/**
 * Interface ReturnProductContract
 * @package App\Contracts
 */
interface ReturnProductContract
{
    public function listReturnProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findReturnProductById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createReturnProduct(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateReturnProduct(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteReturnProduct($id);
}
