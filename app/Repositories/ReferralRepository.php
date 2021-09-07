<?php

namespace App\Repositories;

use App\Models\Referral;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ReferralContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class ReferralRepository
 *
 * @package \App\Repositories
 */
class ReferralRepository extends BaseRepository implements ReferralContract
{
    use UploadAble;


    /**
     * ReferralRepository constructor.
     * @param Referral $model
     */
    public function __construct(Referral $model)
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
    public function ListReferrals(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findReferralById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Referral|mixed
     */
    public function createReferral(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'banners');
            }

            $merge = $collection->merge(compact('image'));

            $Referral = new Referral($merge->all());

            $Referral->save();

            return $Referral;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateReferral(array $params)
    {
        $banner = $this->findReferralById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;
//ddd($params);
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($banner->image != null) {
                $this->deleteOne($banner->image);
            }

            $image = $this->uploadOne($params['image'], 'banners');
        }

        $merge = $collection->merge(compact( 'image'));

        $banner->update($merge->all());

        return $banner;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteReferral($id)
    {
        $banner = $this->findReferralById($id);

        if ($banner->logo != null) {
            $this->deleteOne($banner->image);
        }

        $banner->delete();

        return $banner;
    }

    public function findBySlug($slug)
    {
        return Referral::with('banners')
            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

