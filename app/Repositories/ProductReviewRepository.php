<?php

namespace App\Repositories;

use App\Models\ProductReview;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductReviewContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductReviewRepository
 *
 * @package \App\Repositories
 */
class ProductReviewRepository extends BaseRepository implements ProductReviewContract
{
    use UploadAble;


    /**
     * ProductReviewRepository constructor.
     * @param ProductReview $model
     */
    public function __construct(ProductReview $model)
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
    public function listProductReviews(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        $productreviews = DB::table('product_reviews')
                            ->join('users','user_id','users.id')
                            ->select('product_reviews.*','users.first_name','users.last_name')
                            ->get();
        return $productreviews;
//            $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findProductReviewById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return ProductReview|mixed
     */
    public function createProductReview(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $productReview = new ProductReview($merge->all());

            $productReview->save();

            return $productReview;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateProductReview(array $params)
    {
        $productreview = $this->findProductReviewById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $productreview->update($merge->all());

        return $productreview;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteProductReview($id)
    {
        $productreview = $this->findProductReviewById($id);

        if ($productreview->logo != null) {
            $this->deleteOne($productreview->image);
        }

        $productreview->delete();

        return $productreview;
    }

}

