<?php

namespace App\Http\Controllers\Site;

use App\Models\Wishlist;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\UserContract;
use App\Http\Controllers\BaseController;

class ProfileController extends BaseController
{

    /**
     * @var UserContract
     */
    protected $UserRepository;

    /**
     * UserController constructor.
     * @param UserContract $UserRepository
     */
    public function __construct(UserContract $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function getDashboard()
    {
        $referraltotal =null;
        $referralbalance =null;
        $totalreferrals =null;
        $paidreferrals =null;
        $unpaidreferrals =null;
        $totaltransactions =null;


        $countrycodes = DB::table('country_codes')->get();
        $states = DB::table('state_codes')->get();

        $user_id = Auth::guard()->user()->attribute_id;
//ddd($user_id);
        $affiliate = DB::table('affiliates')
            ->join('users','affiliates.id','=','users.affiliate_id')
            ->where('affiliates.id','=',$user_id)
                    ->first();

//ddd($affiliate);
        $referrals = DB::table('referrals')->where('affiliate_id','=',$user_id)->get();
        foreach($referrals as $r)
        {
            $referraltotal = $referraltotal + $r->commission;
            $totalreferrals = $totalreferrals +1;
            $totaltransactions = $totaltransactions +1;
            if($r->paid == 'Unpaid')
            {
                $referralbalance = $referralbalance + $r->commission;
                $unpaidreferrals = $unpaidreferrals +1;
            }
            if($r->paid == 'Paid')
            {
                $paidreferrals = $paidreferrals +1;
            }
        }
        $orders = DB::table('orders')->where('user_id','=',Auth::guard()->user()->id)->get();
        $payments = DB::table('affiliate_payments')->where('affiliate_id','=',$user_id)->get();
        $products = DB::table('products')->get();
        $wishlist = DB::table('wishlists')
                    ->join('products','wishlists.product_id','=','products.id')
                    ->join('product_images','wishlists.product_id','=','product_images.product_id')
                    ->where('wishlists.user_id','=',Auth::guard()->user()->id)
                    ->get();
//ddd($orders);
//ddd($wishlist);$wishlist

        $pageTitle = 'My Profile';



        return view('site.profile.index', compact('referrals','countrycodes','affiliate','referraltotal','referralbalance','totalreferrals','paidreferrals','unpaidreferrals','totaltransactions','payments','products','pageTitle','wishlist','states','orders'));

    }

    public function getMyProfile()
    {
        $user_id = Auth::guard()->user()->id;
    }
    public function getAffiliateLinks()
    {

        $user_id = Auth::guard()->user()->affiliate_id;
//ddd($user_id);
        $affiliate = DB::table('affiliates')
            ->join('users','affiliates.id','=','users.affiliate_id')
            ->where('affiliates.id','=',$user_id)
            ->get();
//ddd($affiliate);

        $products = DB::table('products')->get();

        $pageTitle = 'My Profile';

        return view('site.profile.includes.affiliatelinks',compact('affiliate','products','pageTitle'));
    }

    public function updateUser(Request $request)
{
//    ddd($request);

//    $this->validate($request, [
//        'title'      =>  'required|max:191'
//    ]);
    //ddd($request);
    $params = $request->except('_token');
//ddd($params);
    $user = $this->UserRepository->updateUser($params);

    if (!$user) {
//
        return $this->responseRedirectBack('Error occurred while updating User.', 'error', true, true);
    }
    return $this->responseRedirectBack('User updated successfully' ,'success',false, false);
}

}
