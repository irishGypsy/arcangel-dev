<?php

namespace App\Repositories;

use App\Models\ProductPackage;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductPackageContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductPackageRepository
 *
 * @package \App\Repositories
 */
class ProductPackageRepository extends BaseRepository implements ProductPackageContract
{
    use UploadAble;

    /**
     * ProductPackageRepository constructor.
     * @param ProductPackage $model
     */
    public function __construct(ProductPackage $model)
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
    public function listProductPackages(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductPackageById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return ProductPackage|mixed
     */
    public function createProductPackage(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $productpackage = new ProductPackage($merge->all());

            $productpackage->save();

            return $productpackage;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProductPackage(array $params)
    {
        $productpackage = $this->findProductPackageById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $productpackage->update($merge->all());

        return $productpackage;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProductPackage($id)
    {
        $productpackage = $this->findProductPackageById($id);

        $productpackage->delete();

        return $productpackage;
    }

}

