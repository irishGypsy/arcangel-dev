<?php

namespace App\Http\Controllers\Site;

use Auth;
use Illuminate\Http\Request;
use App\Contracts\WishlistContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class WishlistController extends BaseController
{
//use Auth;
    /**
     * @var $WishlistContract
     */
    protected $WishlistRepository;

    /**
     * WishlistController constructor.
     * @param WishlistContract $WishlistRepository
     */
    public function __construct(WishlistContract $WishlistRepository)
    {
        $this->WishlistRepository = $WishlistRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user()->id;

        $wishlists = $this->WishlistRepository->listWishlists();

        $this->setPageTitle('Wishlists', 'List of all wishlists');
        return view('admin.wishlists.index', compact('wishlists'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $wishlists = $this->WishlistRepository->listWishlists('id', 'asc');

        $this->setPageTitle('Wishlists', 'Create Wishlist');
        return view('admin.wishlists.create', compact('wishlists'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $wishlist= $this->WishlistRepository->createWishlist($params);

        if (!$wishlist) {

            return $this->responseRedirectBack('Error occurred while creating wishlist.', 'error', true, true);
        }

        return $this->responseRedirect('admin.wishlists.index', 'Wishlist added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $wishlists = $this->WishlistRepository->findWishlistById($id);

        $this->setPageTitle('Wishlists', 'Edit Wishlist : '.$wishlists->name);
        return view('admin.wishlists.edit', compact('wishlists'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $wishlist = $this->WishlistRepository->updateWishlist($params);

        if (!$wishlist) {

            return $this->responseRedirectBack('Error occurred while updating Wishlist.', 'error', true, true);
        }
        return $this->responseRedirectBack('Wishlist updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $wishlist = $this->WishlistRepository->deleteWishlist($id);

        if (!$wishlist) {
            return $this->responseRedirectBack('Error occurred while deleting Wishlist.', 'error', true, true);
        }
        return $this->responseRedirect('site.profile', 'Wishlist deleted successfully' ,'success',false, false);
    }
}

