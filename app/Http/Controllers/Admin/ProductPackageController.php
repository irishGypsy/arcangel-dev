<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Contracts\ProductPackageContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class ProductPackageController extends BaseController
{
//use Auth;
    /**
     * @var ProductPackageContract
     */
    protected $ProductPackageRepository;

    /**
     * ProductPackageController constructor.
     * @param ProductPackageContract $ProductPackageRepository
     */
    public function __construct(ProductPackageContract $ProductPackageRepository)
    {
        $this->ProductPackageRepository = $ProductPackageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $productpackages = $this->ProductPackageRepository->listProductPackages();

        $this->setPageTitle('ProductPackages', 'List of all productpackages');
        return view('admin.productpackages.index', compact('productpackages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $productpackages = $this->ProductPackageRepository->listProductPackages('id', 'asc');

        $this->setPageTitle('Product Packages', 'Create Product Package');
        return view('admin.productpackages.create', compact('productpackages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $productpackage= $this->ProductPackageRepository->createProductPackage($params);

        if (!$productpackage) {
            return $this->responseRedirectBack('Error occurred while creating product package.', 'error', true, true);
        }
        return $this->responseRedirect('admin.productpackages.index', 'Product Package added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $productpackages = $this->ProductPackageRepository->findProductPackageById($id);

        $this->setPageTitle('Product Packages', 'Edit Product Package : '.$productpackages->name);
        return view('admin.productpackages.edit', compact('productpackages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        ddd($request);
        $params = $request->except('_token');

        $productpackage = $this->ProductPackageRepository->updateProductPackage($params);

        if (!$productpackage) {
            return $this->responseRedirectBack('Error occurred while updating ProductPackage.', 'error', true, true);
        }
        return $this->responseRedirectBack('ProductPackage updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $productpackage = $this->ProductPackageRepository->deleteProductPackage($id);

        if (!$productpackage) {
            return $this->responseRedirectBack('Error occurred while deleting Product Package.', 'error', true, true);
        }
        return $this->responseRedirect('admin.productpackages.index', 'Product Package deleted successfully' ,'success',false, false);
    }
}

