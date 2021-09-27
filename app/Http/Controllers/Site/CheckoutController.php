<?php

namespace App\Http\Controllers\Site;

use Cart;
use Auth;
use App\Models\Order;
use Hexters\CoinPayment\CoinPayment;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PayPal\Api\Item;

class CheckoutController extends Controller
{
    protected $payPal;

    protected $orderRepository;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        $profile = DB::table('addresses')
                    ->where('user_id','=',Auth::guard()->user()->id)
                    ->first();

        $states = DB::table('state_codes')->get();
        $country_codes = DB::table('country_codes')->get();

        return view('site.pages.checkout', compact('states', 'country_codes','profile'));
    }

    public function reviewOrder(Request $request)
    {
        $params = $request->except('_token');
        $cart = Cart::session(Auth::guard()->user()->id)->getContent();
        $totalShipping = null;
        foreach(Cart::session(Auth::guard()->user()->id)->getContent() as $c){
            $totalShipping = $totalShipping + ($c->conditions->parsedRawValue * $c->quantity);
        }
        $bstate = DB::table('state_codes')->where('id','=',$params['billing_state'])->first();
        $sstate = DB::table('state_codes')->where('id','=',$params['shipping_state'])->first();
        $bcountry = DB::table('country_codes')->where('id','=',$params['billing_country'])->first();
        $scountry = DB::table('country_codes')->where('id','=',$params['shipping_country'])->first();
//ddd($params);
        return view('site.pages.revieworder', compact('params', 'cart','totalShipping','bstate','sstate','bcountry','scountry'));


    }

    public function placeOrder(Request $request)
    {

        if($request->payWith == 'paypal')
        {
            $this->paypalOrder($request);
        }
        elseif($request->payWith == 'crypto')
        {
//            $this->cryptoOrder($request);
        }
        else{
            return null;
        }

    }

    public function paypalOrder(Request $request)
    {
//ddd($request);
        // Before storing the order implement the request validation
        $order = $this->orderRepository->storeOrderDetails($request->all());
        // add more control here to handle if the order is not stored properly

//        debug order variable
//        ddd($order);

        if ($order) {
            $this->payPal->processPayment($order);
        }

        return redirect()->back()->with('message','Order not placed');
    }

//    public function cryptoOrder(Request $request)
//    {
//
////        ddd($request);
//
//        // Before storing the order implement the request validation
//        $order = $this->orderRepository->storeOrderDetails($request->all());
//        // add more control here to handle if the order is not stored properly
//
////        debug order variable
////        ddd($order);
//        /*
//          *   @required true
//          */
//        $transaction['order_id'] = $order->order_number;
//        $transaction['amountTotal'] = (FLOAT) $order->grand_total;
//        $transaction['note'] = 'Transaction note';
//        $transaction['buyer_name'] = $order->billing_first_name.' '.$order->billing_last_name;
//        $transaction['buyer_email'] = $order->billing_email;
//        $transaction['redirect_url'] = url('/back_to_tarnsaction'); // When Transaction was comleted
//        $transaction['cancel_url'] = url('/back_to_tarnsaction'); // When user click cancel link
//
//        if ($order) {
//
//            $items = \Cart::session(Auth::guard()->user()->id)->getContent();
//
//            foreach ($order->items as $item) {
//
//                $transaction['items'][] = [
//                    'itemDescription' => $item->product->name,
//                    'itemPrice' => (float) $item->price, // USD
//                    'itemQty' => (int) $item->quantity,
//                    'itemSubtotalAmount' => (float)$item->price * (float)$item->quantity // USD
//                ];
//
//            }
//        }
//
//        $transaction['payload'] = [
//            'foo' => [
//                'bar' => $order->id
//            ]
//        ];
//
//        ddd($transaction);
//
//        return CoinPayment::generatelink($transaction);
//
//
//
//    }

    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $result = $this->payPal->completePayment($paymentId, $payerId);

        $transactions = $result->getTransactions();
        $transaction = $transactions[0];
        $invoiceId = $transaction->invoice_number;
        $relatedResources = $transactions[0]->getRelatedResources();
        $sale = $relatedResources[0]->getSale();
        $saleId = $sale->getId();
        $status = ['salesId' => $saleId, 'invoiceId' => $invoiceId];

        $itemlist =$transaction->item_list->items;

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = 'PayPal -'.$status['salesId'];
        $order->save();

        Cart::clear();
        return view('site.pages.success', compact('order', 'result','itemlist'));
    }
}
