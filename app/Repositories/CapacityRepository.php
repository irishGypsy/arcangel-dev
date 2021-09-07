<?php

namespace App\Repositories;

use App\Models\Capacity;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CapacityContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CapacityRepository
 *
 * @package \App\Repositories
 */
class CapacityRepository extends BaseRepository implements CapacityContract
{
    use UploadAble;


    /**
     * CapacityRepository constructor.
     * @param Capacity $model
     */
    public function __construct(Capacity $model)
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
    public function ListCapacities(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findCapacityById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Capacity|mixed
     */
    public function createCapacity(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

//            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
//                $image = $this->uploadOne($params['image'], 'capacities');
//            }

            $merge = $collection->merge(compact('image'));

            $capacity = new Capacity($merge->all());

            $capacity->save();

            return $capacity;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCapacity(array $params)
    {
        $capacity = $this->findCapacityById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;
//ddd($params);
//        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
//
//            if ($capacity->image != null) {
//                $this->deleteOne($capacity->image);
//            }
//
//            $image = $this->uploadOne($params['image'], 'capacities');
//        }

        $merge = $collection->merge(compact( 'image'));

        $capacity->update($merge->all());

        return $capacity;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCapacity($id)
    {
        $capacity = $this->findCapacityById($id);

        if ($capacity->logo != null) {
            $this->deleteOne($capacity->image);
        }

        $capacity->delete();

        return $capacity;
    }

//    public function findBySlug($slug)
//    {
//        return Capacity::with('capacities')
//            ->where('slug', $slug)
////            ->where('menu', 1)
//            ->first();
//    }
}

