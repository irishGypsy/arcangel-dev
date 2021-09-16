<?php

namespace App\Contracts;

/**
 * Interface AffiliateDashboardContract
 * @package App\Contracts
 */
interface AffiliateDashboardContract
{
    public function listAffiliateDashboards(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findAffiliateDashboardById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAffiliateDashboard(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAffiliateDashboard(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAffiliateDashboard($id);
}
