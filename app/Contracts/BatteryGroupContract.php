<?php

namespace App\Contracts;

/**
 * Interface BatteryGroupContract
 * @package App\Contracts
 */
interface BatteryGroupContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listBatteryGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findBatteryGroupById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBatteryGroup(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBatteryGroup(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBatteryGroup($id);
}
