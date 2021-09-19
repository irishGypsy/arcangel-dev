<?php

namespace App\Repositories;

use App\Models\Wishlist;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\WishlistContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class WishlistRepository
 *
 * @package \App\Repositories
 */
class WishlistRepository extends BaseRepository implements WishlistContract
{
    use UploadAble;


    /**
     * WishlistRepository constructor.
     * @param Wishlist $model
     */
    public function __construct(Wishlist $model)
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
    public function ListWishlists(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findWishlistById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Wishlist|mixed
     */
    public function createWishlist(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            $merge = $collection->merge(compact('image'));

            $wishlist = new Wishlist($merge->all());

            $wishlist->save();

            return $wishlist;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateWishlist(array $params)
    {
        $wishlist = $this->findWishlistById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $wishlist->update($merge->all());

        return $wishlist;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteWishlist($id)
    {
        $wishlist = $this->findWishlistById($id);

        if ($wishlist->logo != null) {
            $this->deleteOne($wishlist->image);
        }

        $wishlist->delete();

        return $wishlist;
    }

//    public function findBySlug($slug)
//    {
//        return Wishlist::with('wishlists')
//            ->where('slug', $slug)
////            ->where('menu', 1)
//            ->first();
//    }
}

