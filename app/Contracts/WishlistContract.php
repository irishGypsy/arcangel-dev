<?php

namespace App\Contracts;

/**
 * Interface WishlistContract
 * @package App\Contracts
 */
interface WishlistContract
{
    public function listWishlists(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findWishlistById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createWishlist(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateWishlist(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteWishlist($id);
}
