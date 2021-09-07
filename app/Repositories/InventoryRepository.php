<?php

namespace App\Repositories;

use App\Models\Inventory;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\InventoryContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class InventoryRepository
 *
 * @package \App\Repositories
 */
class InventoryRepository extends BaseRepository implements InventoryContract
{
    use UploadAble;


    /**
     * InventoryRepository constructor.
     * @param Inventory $model
     */
    public function __construct(Inventory $model)
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
    public function listInventories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findInventoryById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Inventory|mixed
     */
    public function createInventory(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'inventories');
            }

            $merge = $collection->merge(compact('image'));

            $inventory = new Inventory($merge->all());

            $inventory->save();

            return $inventory;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateInventory(array $params)
    {
        $inventory = $this->findInventoryById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;
//ddd($params);
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($inventory->image != null) {
                $this->deleteOne($inventory->image);
            }

            $image = $this->uploadOne($params['image'], 'inventories');
        }

        $merge = $collection->merge(compact( 'image'));

        $inventory->update($merge->all());

        return $inventory;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteInventory($id)
    {
        $inventory = $this->findInventoryById($id);

        if ($inventory->logo != null) {
            $this->deleteOne($inventory->image);
        }

        $inventory->delete();

        return $inventory;
    }

    public function findBySlug($slug)
    {
        return Inventory::with('inventories')
//            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

