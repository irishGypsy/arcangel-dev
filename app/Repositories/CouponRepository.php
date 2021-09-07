<?php

namespace App\Repositories;

use App\Models\Coupon;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CouponContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CouponRepository
 *
 * @package \App\Repositories
 */
class CouponRepository extends BaseRepository implements CouponContract
{
    use UploadAble;


    /**
     * CouponRepository constructor.
     * @param Coupon $model
     */
    public function __construct(Coupon $model)
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
    public function ListCoupons(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findCouponById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Coupon|mixed
     */
    public function createCoupon(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'coupons');
            }

            $merge = $collection->merge(compact('image'));

            $coupon = new Coupon($merge->all());

            $coupon->save();

            return $coupon;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateCoupon(array $params)
    {
        $coupon = $this->findCouponById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;
//ddd($params);
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($coupon->image != null) {
                $this->deleteOne($coupon->image);
            }

            $image = $this->uploadOne($params['image'], 'coupons');
        }

        $merge = $collection->merge(compact( 'image'));

        $coupon->update($merge->all());

        return $coupon;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteCoupon($id)
    {
        $coupon = $this->findCouponById($id);

        if ($coupon->logo != null) {
            $this->deleteOne($coupon->image);
        }

        $coupon->delete();

        return $coupon;
    }

    public function findBySlug($slug)
    {
        return Coupon::with('coupons')
//            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

