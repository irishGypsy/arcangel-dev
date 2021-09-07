<?php

namespace App\Contracts;

/**
 * Interface ReferralContract
 * @package App\Contracts
 */
interface ReferralContract
{
    public function listReferrals(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findReferralById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createReferral(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateReferral(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteReferral($id);
}
