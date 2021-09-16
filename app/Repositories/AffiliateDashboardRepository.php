<?php

namespace App\Repositories;

use App\Models\Affiliate;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\AffiliateDashboardContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class AffiliateDashboardRepository
 *
 * @package \App\Repositories
 */
class AffiliateDashboardRepository extends BaseRepository implements AffiliateDashboardContract
{
    use UploadAble;


    /**
     * AffiliateDashboardRepository constructor.
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
    public function listAffiliateDashboards(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findAffiliateDashboardById(int $id)
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
    public function createAffiliateDashboard(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $affiliateDashboard = new Affiliate($merge->all());

            $affiliateDashboard->save();

            return $affiliateDashboard;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAffiliateDashboard(array $params)
    {
        $affiliate = $this->findAffiliateDashboardById($params['id']);

        $collection = collect($params)->except('_token');

        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $affiliate->update($merge->all());

        return $affiliate;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAffiliateDashboard($id)
    {
        $affiliate = $this->findAffiliateDashboardById($id);

        if ($affiliate->logo != null) {
            $this->deleteOne($affiliate->image);
        }

        $affiliate->delete();

        return $affiliate;
    }

}

