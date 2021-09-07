<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\InventoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Admin\ProductController;
use App\Repositories\ProductRepository;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class InventoryController extends BaseController
{

    /**
     * @var InventoryContract
     */
    protected $inventoryRepository;
    protected $productRepository;

    /**
     * InventoryController constructor.
     * @param InventoryContract $InventoryRepository
     */
    public function __construct(InventoryContract $inventoryRepository)
    {
        $this->InventoryRepository = $inventoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $inventories = DB::table('inventories')
            ->leftJoin('products','inventories.productID', '=', 'products.id')
            ->select('inventories.*','products.name','products.sku')
            ->get();



        $this->setPageTitle('Inventories', 'List of all inventories');
        return view('admin.inventories.index', compact('inventories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $inventories = $this->InventoryRepository->listInventories('id', 'asc');
        $products = DB::table('products')->select('id','name')->get();
//            ddd($products);
        $this->setPageTitle('Inventories', 'Create Inventory');
        return view('admin.inventories.create', compact('inventories', 'products'));
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
        ]);

        $params = $request->except('_token');

        $inventories= $this->InventoryRepository->createInventory($params);
        //ddd($inventorie);
        if (!$inventories) {

            return $this->responseRedirectBack('Error occurred while creating inventory.', 'error', true, true);
        }

        return $this->responseRedirect('admin.inventories.index', 'Inventory added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $inventories = DB::table('inventories')
            ->leftJoin('products','inventories.productID', '=', 'products.id')
//            ->select('inventories.*','products.name','products.sku')
            ->where('products.id','=', $id )
            ->get();
//ddd($inventories);
        $this->setPageTitle('Inventories', 'Edit Inventory : '.$inventories[0]->name);
        return view('admin.inventories.edit', compact('inventories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

      $params = $request->except('_token');

        $inventory = $this->InventoryRepository->updateInventory($params);

        if (!$inventory) {

            return $this->responseRedirectBack('Error occurred while updating Inventory.', 'error', true, true);
        }
        return $this->responseRedirectBack('Inventory updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $inventory = $this->InventoryRepository->deleteInventory($id);

        if (!$inventory) {
            return $this->responseRedirectBack('Error occurred while deleting Inventory.', 'error', true, true);
        }
        return $this->responseRedirect('admin.inventories.index', 'Inventory deleted successfully' ,'success',false, false);
    }
}
