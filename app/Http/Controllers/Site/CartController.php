<?php

namespace App\Http\Controllers\Site;

use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
//    use Cart;

    public function getCart()
    {



//        $subTotal = Cart::getSubTotal();
////        ddd($subTotal);
//        $condition = Cart::getCondition('shipping');
//        ddd($condition);
//        $conditionCalculatedValue = $condition->getCalculatedValue($subTotal);
//        ddd($conditionCalculatedValue);
$totalShipping = null;
        foreach(Cart::getContent() as $c){
//            ddd($c->conditions->parsedRawValue * $c->quantity);
            $totalShipping = $totalShipping + ($c->conditions->parsedRawValue * $c->quantity);
        }


//ddd($totalShipping);
        $coupons = DB::table('coupons')->where('status','=','Free')->get();
        $sales = DB::table('sales')->get();

        return view('site.pages.cart', compact('coupons','sales', 'totalShipping'));
    }

    public function removeItem($id)
    {
        Cart::remove($id);

        if (Cart::isEmpty()) {
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

        Cart::update($id,array('quantity' => 1));

        return redirect()->back()->with('message', 'Quantity added to cart successfully.');

    }

    public function subtractQty($id)
    {

        Cart::update($id,array('quantity' => -1));

        return redirect()->back()->with('message', 'Quantity subtracted from cart successfully.');

    }


}
