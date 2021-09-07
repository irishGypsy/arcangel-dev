<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BannerContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class BannerController extends BaseController
{

    /**
     * @var BannerContract
     */
    protected $BannerRepository;

    /**
     * BannerController constructor.
     * @param BannerContract $BannerRepository
     */
    public function __construct(BannerContract $BannerRepository)
    {
        $this->BannerRepository = $BannerRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banners = $this->BannerRepository->listBanners();

        $this->setPageTitle('Banners', 'List of all banners');
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        $banners = $this->BannerRepository->listBanners();

        $products = DB::table('products')
            ->join('product_images','products.id','=','product_images.product_id')
            ->select('products.id','products.name','products.mrp','product_images.image')
            ->where('products.popular','=','1')
            ->get();
//ddd($products);
        return view('site.test', compact('banners','products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $banners = $this->BannerRepository->listBanners('id', 'asc');

        $this->setPageTitle('Banners', 'Create Banner');
        return view('admin.banners.create', compact('banners'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//
        $this->validate($request, [
            'title'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:4000'
        ]);

        $params = $request->except('_token');

        $banner= $this->BannerRepository->createBanner($params);
        //ddd($banner);
        if (!$banner) {

            return $this->responseRedirectBack('Error occurred while creating banner.', 'error', true, true);
        }

        return $this->responseRedirect('admin.banners.index', 'Banner added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $banners = $this->BannerRepository->findBannerById($id);
//        $banners = $this->BannerRepository->treeList();

        $this->setPageTitle('Banners', 'Edit Banner : '.$banners->name);
        return view('admin.banners.edit', compact('banners'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'title'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);
        //ddd($request);
        $params = $request->except('_token');

        $Banner = $this->BannerRepository->updateBanner($params);

        if (!$Banner) {
//
            return $this->responseRedirectBack('Error occurred while updating Banner.', 'error', true, true);
        }
        return $this->responseRedirectBack('Banner updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Banner = $this->BannerRepository->deleteBanner($id);

        if (!$Banner) {
            return $this->responseRedirectBack('Error occurred while deleting Banner.', 'error', true, true);
        }
        return $this->responseRedirect('admin.banners.index', 'Banner deleted successfully' ,'success',false, false);
    }
}
