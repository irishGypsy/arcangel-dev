<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Models\Product;
use Cart;
use Auth;
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

        $battery_groups = DB::table('battery_groups')
            ->select('battery_group_name','id')
            ->get()
            ->keyBy('battery_group_name');

        $capacities = DB::table('capacities')
            ->select('capacity_name','id','capacity_code')
            ->get()
            ->keyBy('capacity_name') ;

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
        }
        $packages = DB::table('product_packages')
                        ->leftJoin('packages','product_packages.package_id','=','packages.id')
                        ->where('product_packages.product_id','=',$id)
                        ->where('product_packages.checked','=',1)
                        ->get();
//        ddd($packages);
        return view('site.pages.product', compact('product', 'saleprice','packages'));
    }

    public function addToCart(Request $request)
    {

        $user_id = Auth::guard()->user()->id;
        Cart::session($user_id);

        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');
        $options = array_add($options,"shipping", $product->shipping);
        $options = array_add($options,"product_id", $product->id);

//        ddd($options);

        $shippingCondition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'shipping',
            'type' => 'shipping',
            'value' => $product->shipping
        ));

        Cart::session($user_id)->add(
                uniqid(),
                $product->name,
                $request->input('price'),
                $request->input('qty'),
                $options,
                $shippingCondition
        );

//        ddd(Cart::session(Auth::guard()->user()->id)->getContent());

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
