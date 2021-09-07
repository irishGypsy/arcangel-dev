<?php

namespace App\Contracts;

/**
 * Interface BatteryFinderContract
 * @package App\Contracts
 */
interface BatteryFinderContract
{
    public function listBatteryFinders(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findBatteryFinderById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBatteryFinder(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBatteryFinder(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBatteryFinder($id);
}
