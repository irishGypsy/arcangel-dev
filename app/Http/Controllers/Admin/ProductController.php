<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\SaleContract;
use App\Contracts\ProductContract;
use App\Contracts\InventoryContract;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;
use App\Repositories\ProductRepository;
use App\Repositories\InventoryRepository;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{
//    protected $brandRepository;

    protected $categoryRepository;

    protected $productRepository;

    protected $saleRepository;

    protected $inventoryRepository;

    public function __construct(
//        BrandContract $brandRepository,
//        CategoryContract $categoryRepository,
        ProductContract $productRepository,
        SaleContract $saleRepository,
        InventoryContract $inventoryRepository
    )
    {
//        $this->brandRepository = $brandRepository;
//        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->saleRepository = $saleRepository;
        $this->inventoryRepository = $inventoryRepository;
    }

    public function index()
    {
        $products = $this->productRepository->listProducts();
//        $brands = $this->brandRepository->listBrands();
        $sales = $this->saleRepository->listSales();

        $inventories = $this->inventoryRepository->listInventories();

        $this->setPageTitle('Products', 'Products List');
        return view('admin.products.index', compact('products', 'sales', 'inventories'));
    }

    public function create()
    {
        $products = $this->productRepository->listProducts('id', 'asc');
        $capacities = DB::table('capacities')->get();
        $batterygroups = DB::table('battery_groups')->get();
        $countrycodes = DB::table('country_codes')->get();

        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create', compact( 'products', 'capacities','batterygroups','countrycodes'));
    }

    public function store(StoreProductFormRequest $request)
    {

        $params = $request->except('_token');

        $product = $this->productRepository->createProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product added successfully' ,'success',false, false);
    }

    public function edit($id)
    {
        $product = $this->productRepository->findProductById($id);

        $capacities = DB::table('capacities')->select('id','capacity_name')->get();

        $batterygroups = DB::table('battery_groups')->select('id','battery_group_name')->get();

        $countrycodes = DB::table('country_codes')->select('id','country')->get();

        $this->setPageTitle('Products', 'Edit Product');
        return view('admin.products.edit', compact( 'product','capacities', 'batterygroups','countrycodes'));
    }

    public function update(StoreProductFormRequest $request)
    {
        $params = $request->except('_token');

        $product = $this->productRepository->updateProduct($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }

    public function flipPopular($id)
    {
        $p = DB::table('products')->find($id);
        if($p->popular)
        {
            DB::table('products')->where('id',$id)->update(['popular' => 0]);
        }
        else
        {
            DB::table('products')->where('id',$id)->update(['popular' => 1]);
        }
        return $this->responseRedirect('admin.products.index', 'Product updated successfully' ,'success',false, false);
    }
}
