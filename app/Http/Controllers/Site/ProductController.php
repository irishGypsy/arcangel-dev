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
        $sale = DB::table('sales')->where('productID','=',$product->id)->first();
        $saleprice = null;
        if(!$sale == null)
        {
            $saleprice = $product->price - ($product->price * $sale->discount);
////            $product->price = $saleprice;
        }
//
//        ddd($product);


//ddd($product);
        return view('site.pages.product', compact('product', 'saleprice'));
    }

    public function addToCart(Request $request)
    {
//        $product = new Product();
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
        $options = array_add($options,"shipping", $product->shipping);

        $shippingCondition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'shipping',
            'type' => 'shipping',
            'value' => $product->shipping
        ));
//ddd($options);
        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options, $shippingCondition);
//ddd(Cart::getCondition('shipping'));
//        $subTotal = Cart::getSubTotal();
////        ddd($subTotal);
//        $condition = Cart::getCondition('shipping');
//        ddd($condition);
//        $conditionCalculatedValue = $condition->getCalculatedValue($subTotal);
//        ddd($conditionCalculatedValue);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
