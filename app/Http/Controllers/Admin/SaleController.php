<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\SaleContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class SaleController extends BaseController
{

    /**
     * @var SaleContract
     */
    protected $SaleRepository;

    /**
     * SaleController constructor.
     * @param SaleContract $SaleRepository
     */
    public function __construct(SaleContract $SaleRepository)
    {
        $this->SaleRepository = $SaleRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $sales = $this->SaleRepository->listSales();

        $sales = DB::table('sales')
            ->join('products','sales.productID','=','products.id')
            ->select('sales.*','products.sku','products.mrp','products.popular')
            ->get();

        $this->setPageTitle('Sales', 'List of all sales');
        return view('admin.sales.index', compact('sales'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $productidv = $id;
        $sales = $this->SaleRepository->listSales('id', 'asc');

        $this->setPageTitle('Sales', 'Create Sale');
        return view('admin.sales.create', compact('sales', 'productidv'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title'      =>  'required|max:191',
        ]);

        $params = $request->except('_token');

        $sales= $this->SaleRepository->createSale($params);

        if (!$sales) {

            return $this->responseRedirectBack('Error occurred while creating sale.', 'error', true, true);
        }

        return $this->responseRedirect('admin.sales.index', 'Sale added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $sales = $this->SaleRepository->findSaleById($id);
//        $sales = $this->SaleRepository->treeList();

        $this->setPageTitle('Sales', 'Edit Sale : '.$sales->name);
        return view('admin.sales.edit', compact('sales'));
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
        ]);
        //ddd($request);
        $params = $request->except('_token');

        $sale = $this->SaleRepository->updateSale($params);

        if (!$sale) {
//
            return $this->responseRedirectBack('Error occurred while updating Sale.', 'error', true, true);
        }
        return $this->responseRedirectBack('Sale updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $inventory = $this->SaleRepository->deleteSale($id);

        if (!$inventory) {
            return $this->responseRedirectBack('Error occurred while deleting Sale.', 'error', true, true);
        }
        return $this->responseRedirect('admin.sales.index', 'Sale deleted successfully' ,'success',false, false);
    }
}
