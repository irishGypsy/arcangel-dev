<?php

namespace App\Contracts;

/**
 * Interface SaleContract
 * @package App\Contracts
 */
interface SaleContract
{
    public function listSales(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findSaleById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSale(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSale(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSale($id);
}
