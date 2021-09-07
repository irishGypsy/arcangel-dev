<?php

namespace App\Contracts;

/**
 * Interface CouponContract
 * @package App\Contracts
 */
interface CouponContract
{
    public function listCoupons(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findCouponById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createCoupon(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCoupon(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteCoupon($id);
}
