<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\BatteryFinderController;

class ProductController extends BaseController
{
//    use Cart;
    protected $productRepository;

    protected $attributeRepository;

    protected $batteryFinderController;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function list()
    {

        $products = Product::all();

//            = DB::table('products')
//            ->leftJoin('product_images', 'products.id','=','product_images.product_id')
//            ->leftJoin('battery_groups', 'products.batterygroup_id','=','battery_groups.id')
//            ->join('capacities','products.capacity_id','=','capacities.id')
//            ->get();

//        $products = $products->unique('name');
//        ddd($products);
        $battery_groups = DB::table('battery_groups')
            ->select('material_name','id')
            ->get()
            ->keyBy('material_name');

        $capacities = DB::table('capacities')
            ->select('capacity_name','id','capacity_code')
            ->get()
            ->keyBy('capacity_name') ;
//ddd();
        $this->setPageTitle('Products', 'List of all products');
        return view('site.pages.products', compact('products','battery_groups','capacities'));

    }


    public function show($id)
    {
        $product = $this->productRepository->findProductById($id);
//ddd($product);
        return view('site.pages.product', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
