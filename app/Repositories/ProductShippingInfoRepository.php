<?php

namespace App\Repositories;

use App\Models\ProductShippingInfo;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductShippingInfoContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ProductShippingInfoRepository
 *
 * @package \App\Repositories
 */
class ProductShippingInfoRepository extends BaseRepository implements ProductShippingInfoContract
{

    /**
     * ProductShippingInfoRepository constructor.
     * @param ProductShippingInfo $model
     */
    public function __construct(ProductShippingInfo $model)
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
    public function listProductShippingInfos(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findProductShippingInfoById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return ProductShippingInfo|mixed
     */
    public function createProductShippingInfo(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $productShippingInfo = new ProductShippingInfo($merge->all());

            $productShippingInfo->save();

            return $productShippingInfo;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProductShippingInfo(array $params)
    {
        $productshippinginfo = $this->findProductShippingInfoById($params['id']);

        $collection = collect($params)->except('_token');

        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $productshippinginfo->update($merge->all());

        return $productshippinginfo;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProductShippingInfo($id)
    {
        $productshippinginfo = $this->findProductShippingInfoById($id);

        $productshippinginfo->delete();

        return $productshippinginfo;
    }

}

