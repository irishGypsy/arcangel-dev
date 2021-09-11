<?php

namespace App\Contracts;

/**
 * Interface VideoContract
 * @package App\Contracts
 */
interface VideoContract
{
    public function listVideos(string $order = 'id', string $sort = 'desc', array $columns = ['*']);


    public function findVideoById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createVideo(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateVideo(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteVideo($id);
}
