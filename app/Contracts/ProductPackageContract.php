<?php

namespace App\Contracts;

/**
 * Interface ProductPackageContract
 * @package App\Contracts
 */
interface ProductPackageContract
{
    public function listProductPackages(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findProductPackageById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createProductPackage(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProductPackage(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteProductPackage($id);
}
