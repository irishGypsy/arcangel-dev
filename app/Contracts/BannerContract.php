<?php

namespace App\Contracts;

/**
 * Interface BannerContract
 * @package App\Contracts
 */
interface BannerContract
{
    public function listBanners(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findBannerById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBanner(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBanner(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBanner($id);
}
