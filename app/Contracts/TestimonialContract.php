<?php

namespace App\Contracts;

/**
 * Interface TestimonialContract
 * @package App\Contracts
 */
interface TestimonialContract
{
    public function listTestimonials(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findTestimonialById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createTestimonial(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTestimonial(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteTestimonial($id);
}
