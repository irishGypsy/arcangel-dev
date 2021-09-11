<?php

namespace App\Repositories;

use App\Models\Video;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\VideoContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class VideoRepository
 *
 * @package \App\Repositories
 */
class VideoRepository extends BaseRepository implements VideoContract
{
    use UploadAble;


    /**
     * VideoRepository constructor.
     * @param Video $model
     */
    public function __construct(Video $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listVideos(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findVideoById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Video|mixed
     */
    public function createVideo(array $params)
    {
        try {
            $collection = collect($params);

            $file = null;
            $thumbnail = null;

            if ($collection->has('file') && ($params['file'] instanceof  UploadedFile)) {
                $file = $this->uploadOne($params['file'], 'videos');
            }
            if ($collection->has('thumbnail') && ($params['thumbnail'] instanceof  UploadedFile)) {
                $thumbnail = $this->uploadOne($params['thumbnail'], 'videos');
            }

            $merge = $collection->merge(compact('file','thumbnail'));

            $video = new Video($merge->all());
//ddd($video);
            $video->save();

            return $video;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateVideo(array $params)
    {
        $video = $this->findVideoById($params['id']);

        $collection = collect($params)->except('_token');
        $file = null;
        $thumbnail = null;

        if ($collection->has('file') && ($params['file'] instanceof  UploadedFile)) {

            if ($video->file != null) {
                $this->deleteOne($video->file);
            }

            $file = $this->uploadOne($params['file'], 'videos');
        }
        if ($collection->has('thumbnail') && ($params['thumbnail'] instanceof  UploadedFile)) {

            if ($video->thumbnail != null) {
                $this->deleteOne($video->thumbnail);
            }

            $thumbnail = $this->uploadOne($params['thumbnail'], 'videos');
        }

        $merge = $collection->merge(compact( 'file','thumbnail'));

        $video->update($merge->all());

        return $video;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteVideo($id)
    {
        $video = $this->findVideoById($id);

        if ($video->logo != null) {
            $this->deleteOne($video->image);
        }

        $video->delete();

        return $video;
    }

    public function findBySlug($slug)
    {
//        return Video::with('videos')
//            ->where('slug', $slug)
////            ->where('menu', 1)
//            ->first();
    }
}

