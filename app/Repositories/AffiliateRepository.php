<?php

namespace App\Repositories;

use App\Models\Affiliate;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\AffiliateContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class AffiliateRepository
 *
 * @package \App\Repositories
 */
class AffiliateRepository extends BaseRepository implements AffiliateContract
{
    use UploadAble;


    /**
     * AffiliateRepository constructor.
     * @param Affiliate $model
     */
    public function __construct(Affiliate $model)
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
    public function ListAffiliates(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findAffiliateById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Affiliate|mixed
     */
    public function createAffiliate(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

//            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
//                $image = $this->uploadOne($params['image'], 'affiliates');
//            }

            $merge = $collection->merge(compact('image'));

            $Affiliate = new Affiliate($merge->all());

            $Affiliate->save();

            return $Affiliate;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAffiliate(array $params)
    {
        $affiliate = $this->findAffiliateById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;

//        ddd($params);

        $merge = $collection->merge(compact( 'image'));
//ddd($merge);
        $affiliate->update($merge->all());
//ddd($affiliate);
        return $affiliate;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAffiliate($id)
    {
        $affiliate = $this->findAffiliateById($id);

        if ($affiliate->logo != null) {
            $this->deleteOne($affiliate->image);
        }

        $affiliate->delete();

        return $affiliate;
    }

//    public function findBySlug($slug)
//    {
//        return Affiliate::with('affiliates')
//            ->where('slug', $slug)
////            ->where('menu', 1)
//            ->first();
//    }
}

