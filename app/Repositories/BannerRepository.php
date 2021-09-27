<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\BannerContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class BannerRepository
 *
 * @package \App\Repositories
 */
class BannerRepository extends BaseRepository implements BannerContract
{
    use UploadAble;


    /**
     * BannerRepository constructor.
     * @param Banner $model
     */
    public function __construct(Banner $model)
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
    public function listBanners(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findBannerById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Banner|mixed
     */
    public function createBanner(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $serialNumber = new Banner($merge->all());

            $serialNumber->save();

            return $serialNumber;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBanner(array $params)
    {
        $banner = $this->findBannerById($params['id']);

        $collection = collect($params)->except('_token');

        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $banner->update($merge->all());

        return $banner;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteBanner($id)
    {
        $banner = $this->findBannerById($id);

        if ($banner->logo != null) {
            $this->deleteOne($banner->image);
        }

        $banner->delete();

        return $banner;
    }

}

