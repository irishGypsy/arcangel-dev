<?php

namespace App\Contracts;

/**
 * Interface ProductShippingInfoContract
 * @package App\Contracts
 */
interface ProductShippingInfoContract
{
    public function listProductShippingInfos(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findProductShippingInfoById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createProductShippingInfo(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProductShippingInfo(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteProductShippingInfo($id);
}
