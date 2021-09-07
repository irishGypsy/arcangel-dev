<?php

namespace App\Contracts;

/**
 * Interface ProductReviewContract
 * @package App\Contracts
 */
interface ProductReviewContract
{
    public function listProductReviews(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findProductReviewById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createProductReview(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProductReview(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteProductReview($id);
}
