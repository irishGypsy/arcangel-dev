<?php

namespace App\Repositories;

use App\Models\Address;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\AddressContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Auth;

/**
 * Class AddressRepository
 *
 * @package \App\Repositories
 */
class AddressRepository extends BaseRepository implements AddressContract
{
    use UploadAble;


    /**
     * AddressRepository constructor.
     * @param Address $model
     */
    public function __construct(Address $model)
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
    public function listAddresses(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findAddressById(int $id)
    {
        try {

            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Address|mixed
     */
    public function createAddress(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $address = new Address($merge->all());

            $address->save();

            return $address;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateAddress(array $params)
    {
        $address_id = DB::table('addresses')
            ->where('user_id','=', Auth::guard()->user()->id)
            ->first('id');

        $address = $this->findAddressById((int)$address_id->id);

        $collection = collect($params)->except('_token');
        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $address->update($merge->all());

        return $address;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteAddress($id)
    {
        $address = $this->findAddressById($id);

        $address->delete();

        return $address;
    }

}

