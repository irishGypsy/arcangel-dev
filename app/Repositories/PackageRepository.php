<?php

namespace App\Repositories;

use App\Models\Package;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\PackageContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class PackageRepository
 *
 * @package \App\Repositories
 */
class PackageRepository extends BaseRepository implements PackageContract
{
    use UploadAble;


    /**
     * PackageRepository constructor.
     * @param Package $model
     */
    public function __construct(Package $model)
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
    public function listPackages(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findPackageById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Package|mixed
     */
    public function createPackage(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $package = new Package($merge->all());

            $package->save();

            return $package;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updatePackage(array $params)
    {
        $package = $this->findPackageById($params['id']);

        $collection = collect($params)->except('_token');

        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $package->update($merge->all());

        return $package;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deletePackage($id)
    {
        $package = $this->findPackageById($id);

        if ($package->logo != null) {
            $this->deleteOne($package->image);
        }

        $package->delete();

        return $package;
    }

    public function findBySlug($slug)
    {
        return Package::with('packages')
            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

