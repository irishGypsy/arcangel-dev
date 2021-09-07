<?php

namespace App\Contracts;

/**
 * Interface AffiliateContract
 * @package App\Contracts
 */
interface AffiliateContract
{
    public function listAffiliates(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findAffiliateById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createAffiliate(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAffiliate(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteAffiliate($id);
}
