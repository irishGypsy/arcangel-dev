<?php

namespace App\Repositories;

use App\Models\Post;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\PostContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class PostRepository
 *
 * @package \App\Repositories
 */
class PostRepository extends BaseRepository implements PostContract
{
    use UploadAble;


    /**
     * PostRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
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
    public function listPosts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findPostById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Post|mixed
     */
    public function createPost(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

//            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
//                $image = $this->uploadOne($params['image'], 'Posts');
//            }

            $merge = $collection; //->merge(compact('image'));

            $Post = new Post($merge->all());

            $Post->save();

            return $Post;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePost(array $params)
    {
        $Post = $this->findPostById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;
//ddd($params);
//        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
//
//            if ($Post->image != null) {
//                $this->deleteOne($Post->image);
//            }
//
//            $image = $this->uploadOne($params['image'], 'Posts');
//        }

        $merge = $collection; //->merge(compact( 'image'));

        $Post->update($merge->all());

        return $Post;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deletePost($id)
    {
        $Post = $this->findPostById($id);

        if ($Post->logo != null) {
            $this->deleteOne($Post->image);
        }

        $Post->delete();

        return $Post;
    }

    public function findBySlug($slug)
    {
        return Post::with('Posts')
            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

