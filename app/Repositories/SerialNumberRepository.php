<?php

namespace App\Repositories;

use App\Models\SerialNumber;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\SerialNumberContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class SerialNumberRepository
 *
 * @package \App\Repositories
 */
class SerialNumberRepository extends BaseRepository implements SerialNumberContract
{
    use UploadAble;


    /**
     * SerialNumberRepository constructor.
     * @param SerialNumber $model
     */
    public function __construct(SerialNumber $model)
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
    public function listSerialNumbers(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findSerialNumberById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return SerialNumber|mixed
     */
    public function createSerialNumber(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $serialNumber = new SerialNumber($merge->all());

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
    public function updateSerialNumber(array $params)
    {
        $serialnumber = $this->findSerialNumberById($params['id']);

        $collection = collect($params)->except('_token');

        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $serialnumber->update($merge->all());

        return $serialnumber;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteSerialNumber($id)
    {
        $serialnumber = $this->findSerialNumberById($id);

        if ($serialnumber->logo != null) {
            $this->deleteOne($serialnumber->image);
        }

        $serialnumber->delete();

        return $serialnumber;
    }

}

