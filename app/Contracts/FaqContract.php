<?php

namespace App\Contracts;

/**
 * Interface FaqContract
 * @package App\Contracts
 */
interface FaqContract
{
    public function listFaqs(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findFaqById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createFaq(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFaq(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteFaq($id);
}
