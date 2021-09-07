<?php

namespace App\Repositories;


use App\Http\Controllers\Admin\BatteryFinderController;
use App\Http\Controllers\Admin\BatteryFinder;
use App\Models\BatteryFinders;
//use App\Models\BatteryFinders;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\BatteryFinderContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;

/**
 * Class BatteryFinderRepository
 *
 * @package \App\Repositories
 */
class BatteryFinderRepository extends BaseRepository implements BatteryFinderContract
{
    use UploadAble;


    /**
     * BatteryFinderRepository constructor.
     * @param BatteryFinders $model
     */
    public function __construct(BatteryFinders $model)
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
    public function listBatteryFinders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
//        return $this->all($columns, $order, $sort);
        $batteryfinders = DB::table('battery__finders')->orderBy('id')->paginate(20);
        return $batteryfinders;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findBatteryFinderById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return BatteryFinders|mixed
     */
    public function createBatteryFinder(array $params)
    {
        try {
            $collection = collect($params);
            $null = null;

            $merge = $collection->merge(compact('null'));

            $batteryfinder = new BatteryFinders($merge->all());

            $batteryfinder->save();

            return $batteryfinder;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBatteryFinder(array $params)
    {
//        ddd($params);
        $batteryfinder = $this->findBatteryFinderById($params['id']);
//
        $collection = collect($params)->except('_token', 'id');
//ddd($collection);

        $merge = $collection;

        $batteryfinder->update($merge->all());

        return $batteryfinder;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteBatteryFinder($id)
    {
        $banner = $this->findBatteryFinderById($id);

        if ($banner->logo != null) {
            $this->deleteOne($banner->image);
        }

        $banner->delete();

        return $banner;
    }

    public function findBySlug($slug)
    {
        return BatteryFinder::with('batteryfinders')
            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

