<?php

namespace App\Http\Controllers\Site;

use Cart;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
//    use Cart;

    public function getCart()
    {

        $totalShipping = 0;

        foreach(Cart::session(Auth::guard()->user()->id)->getContent() as $c){
            $totalShipping = $totalShipping + ($c->conditions->parsedRawValue * $c->quantity);
        }
//ddd( Cart::session(Auth::guard()->user()->id)->getSubTotal());
        $subTotal = Cart::session(Auth::guard()->user()->id)->getSubTotal();


        $cartCount = Cart::session(Auth::guard()->user()->id)->getContent()->count();

        $coupons = DB::table('coupons')->where('status','=','Free')->get();
        $sales = DB::table('sales')->get();

        return view('site.pages.cart', compact('coupons','sales', 'totalShipping','cartCount','subTotal'));
    }

    public function removeItem($id)
    {
//        ddd($id);

        Cart::session(Auth::guard()->user()->id)->remove($id);



        if (Cart::session(Auth::guard()->user()->id)->isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function clearCart()
    {
        Cart::clear();

        return redirect('/');
    }

    public function applyCouponCode(Request $request)
    {

        $coupon = DB::table('coupons')->where('code','=','MerryXmas')->first('discount');

        $couponCondition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'coupon',
            'type' => 'coupon',
            'target' => 'subtotal',
            'value' => '-'.$coupon->discount.'%'
        ));

        Cart::condition($couponCondition);

        return redirect()->back()->with('message', 'Coupon added to cart successfully.');

    }

    public function addQty($id)
    {

        Cart::session(Auth::guard()->user()->id)->update($id,array('quantity' => 1));

        return redirect()->back()->with('message', 'Quantity added to cart successfully.');

    }

    public function subtractQty($id)
    {

        Cart::session(Auth::guard()->user()->id)->update($id,array('quantity' => -1));

        return redirect()->back()->with('message', 'Quantity subtracted from cart successfully.');

    }


}
