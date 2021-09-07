<?php

namespace App\Contracts;

/**
 * Interface PostContract
 * @package App\Contracts
 */
interface PostContract
{
    public function listPosts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findPostById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createPost(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePost(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deletePost($id);
}
