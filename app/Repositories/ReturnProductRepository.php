<?php

namespace App\Repositories;

use App\Models\ReturnProduct;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ReturnProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;

/**
 * Class ReturnProductRepository
 *
 * @package \App\Repositories
 */
class ReturnProductRepository extends BaseRepository implements ReturnProductContract
{
    use UploadAble;


    /**
     * ReturnProductRepository constructor.
     * @param ReturnProduct $model
     */
    public function __construct(ReturnProduct $model)
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
    public function ListReturnProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        $returnproducts = DB::table('return_products')
            ->join('users','return_products.user_id','=','users.id')
            ->get();
//ddd($returnproducts);
        return $returnproducts;
//        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findReturnProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return ReturnProduct|mixed
     */
    public function createReturnProduct(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $returnProduct = new ReturnProduct($merge->all());

            $returnProduct->save();

            return $returnProduct;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateReturnProduct(array $params)
    {
        $returnproduct = $this->findReturnProductById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $returnproduct->update($merge->all());

        return $returnproduct;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteReturnProduct($id)
    {
        $returnproduct = $this->findReturnProductById($id);

        if ($returnproduct->logo != null) {
            $this->deleteOne($returnproduct->image);
        }

        $returnproduct->delete();

        return $returnproduct;
    }

    public function findBySlug($slug)
    {
        return ReturnProduct::with('returnproducts')
            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

