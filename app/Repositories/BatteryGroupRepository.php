<?php

namespace App\Repositories;

use App\Models\BatteryGroup;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\BatteryGroupContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CategoryRepository
 *
 * @package \App\Repositories
 */
class BatteryGroupRepository extends BaseRepository implements BatteryGroupContract
{
    use UploadAble;

    /**
     * CategoryRepository constructor.
     * @param BatteryGroup $model
     */
    public function __construct(BatteryGroup $model)
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
    public function listBatteryGroups(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findBatteryGroupById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return BatteryGroup|mixed
     */
    public function createBatteryGroup(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;
//
//            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
//                $image = $this->uploadOne($params['image'], 'batteryGroups');
//            }

            $merge = $collection->merge(compact('image'));

            $batteryGroup = new BatteryGroup($merge->all());

            $batteryGroup->save();

            return $batteryGroup;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBatteryGroup(array $params)
    {
        $batteryGroup = $this->findBatteryGroupById($params['id']);

        $collection = collect($params)->except('_token');

        $logo = null;
//        if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {
//
//            if ($batteryGroup->logo != null) {
//                $this->deleteOne($batteryGroup->logo);
//            }
//
//            $logo = $this->uploadOne($params['logo'], 'batteryGroups');
//        }

        $merge = $collection->merge(compact('logo'));

        $batteryGroup->update($merge->all());

        return $batteryGroup;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteBatteryGroup($id)
    {
        $batteryGroup = $this->findBatteryGroupById($id);

        if ($batteryGroup->logo != null) {
            $this->deleteOne($batteryGroup->logo);
        }

        $batteryGroup->delete();

        return $batteryGroup;
    }
}
