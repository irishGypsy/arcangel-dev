<?php

namespace App\Contracts;

/**
 * Interface AddressContract
 * @package App\Contracts
 */
interface AddressContract
{
    public function listAddresses(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findAddressById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAddress(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAddress(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAddress($id);
}
