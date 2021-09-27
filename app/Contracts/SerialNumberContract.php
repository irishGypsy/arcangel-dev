<?php

namespace App\Contracts;

/**
 * Interface SerialNumberContract
 * @package App\Contracts
 */
interface SerialNumberContract
{
    public function listSerialNumbers(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findSerialNumberById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createSerialNumber(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateSerialNumber(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteSerialNumber($id);
}
