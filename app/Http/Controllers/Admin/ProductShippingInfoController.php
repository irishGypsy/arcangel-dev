<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ProductShippingInfoContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class ProductShippingInfoController extends BaseController
{

    /**
     * @var ProductShippingInfoContract
     */
    protected $ProductShippingInfoRepository;

    /**
     * ProductShippingInfoController constructor.
     * @param ProductShippingInfoContract $ProductShippingInfoRepository
     */
    public function __construct(ProductShippingInfoContract $ProductShippingInfoRepository)
    {
        $this->ProductShippingInfoRepository = $ProductShippingInfoRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $productshippinginfos = $this->ProductShippingInfoRepository->listProductShippingInfos();

        $this->setPageTitle('Product Shipping Info', 'List of all product shipping info');
        return view('admin.productshippinginfos.index', compact('productshippinginfos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {
        $productshippinginfos = $this->ProductShippingInfoRepository->listProductShippingInfos();

        $products = DB::table('products')
            ->join('product_images','products.id','=','product_images.product_id')
            ->select('products.id','products.name','products.mrp','product_images.image')
            ->where('products.popular','=','1')
            ->get();
//ddd($products);
        return view('site.test', compact('productshippinginfos','products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $productshippinginfos = $this->ProductShippingInfoRepository->listProductShippingInfos('id', 'asc');
        $products = DB::table('products')->select('id','name')->get();


        $this->setPageTitle('Product Shipping Info', 'Create Product Shipping Info');
        return view('admin.productshippinginfos.create', compact('productshippinginfos','products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $productshippinginfo= $this->ProductShippingInfoRepository->createProductShippingInfo($params);

        if (!$productshippinginfo) {

            return $this->responseRedirectBack('Error occurred while creating product shipping info.', 'error', true, true);
        }

        return $this->responseRedirect('admin.productshippinginfos.index', 'Product Shipping Info added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $productshippinginfos = $this->ProductShippingInfoRepository->findProductShippingInfoById($id);

        $this->setPageTitle('Product Shipping Info', 'Edit Product Shipping Info : '.$productshippinginfos->product->name);
        return view('admin.productshippinginfos.edit', compact('productshippinginfos'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $productShippingInfo = $this->ProductShippingInfoRepository->updateProductShippingInfo($params);

        if (!$productShippingInfo) {
//
            return $this->responseRedirectBack('Error occurred while updating Product Shipping Info.', 'error', true, true);
        }
        return $this->responseRedirectBack('Product Shipping Info updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $productShippingInfo = $this->ProductShippingInfoRepository->deleteProductShippingInfo($id);

        if (!$productShippingInfo) {
            return $this->responseRedirectBack('Error occurred while deleting Product Shipping Info.', 'error', true, true);
        }
        return $this->responseRedirect('admin.productshippinginfos.index', 'Product Shipping Info deleted successfully' ,'success',false, false);
    }
}
