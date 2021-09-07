<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ReturnProductContract;
use App\Http\Controllers\BaseController;

class ReturnProductController extends BaseController
{

    /**
     * @var ReturnProductContract
     */
    protected $ReturnProductRepository;
    protected $UserRepository;

    /**
     * ReturnProductController constructor.
     * @param ReturnProductContract $ReturnProductRepository
     */
    public function __construct(ReturnProductContract $ReturnProductRepository)
    {
        $this->ReturnProductRepository = $ReturnProductRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $returnproducts = $this->ReturnProductRepository->listReturnProducts();


        $this->setPageTitle('Return Products', 'List of all return products');
        return view('admin.returnproducts.index', compact('returnproducts'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $returnproducts = $this->ReturnProductRepository->listReturnProducts('id', 'asc');

        $this->setPageTitle('Return Products', 'Create Return Product');
        return view('admin.returnproducts.create', compact('returnproducts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $params = $request->except('_token');

        $returnproduct= $this->ReturnProductRepository->createReturnProduct($params);
        //ddd($returnproduct);
        if (!$returnproduct) {

            return $this->responseRedirectBack('Error occurred while creating return product.', 'error', true, true);
        }

        return $this->responseRedirect('admin.returnproducts.index', 'Return Product added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $returnproducts = $this->ReturnProductRepository->findReturnProductById($id);
//        $returnproducts = $this->ReturnProductRepository->treeList();

        $this->setPageTitle('Return Products', 'Edit Return Product : '.$returnproducts->name);
        return view('admin.returnproducts.edit', compact('returnproducts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $ReturnProduct = $this->ReturnProductRepository->updateReturnProduct($params);

        if (!$ReturnProduct) {
//
            return $this->responseRedirectBack('Error occurred while updating Return Product.', 'error', true, true);
        }
        return $this->responseRedirectBack('Return Product updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $ReturnProduct = $this->ReturnProductRepository->deleteReturnProduct($id);

        if (!$ReturnProduct) {
            return $this->responseRedirectBack('Error occurred while deleting Return Product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.returnproducts.index', 'Return Product deleted successfully' ,'success',false, false);
    }
}
