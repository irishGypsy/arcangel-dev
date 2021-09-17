<?php

namespace App\Http\Controllers\Affiliates;

use App\Contracts\AffiliateDashboardContract;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\StoreProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\AffiliateDashboardRepository;

class AffiliateDashboardController extends BaseController
{

    protected $affiliateDashboardRepository;

    /**
     * BannerController constructor.
     * @param AffiliateDashboardContract $affiliateDashboardRepository
     */
    public function __construct(AffiliateDashboardContract $affiliateDashboardRepository)
    {
        $this->affiliateDashboardRepository = $affiliateDashboardRepository;
    }

    //
    public function getDashboard()
    {
        $referraltotal =null;
        $referralbalance =null;
        $totalreferrals =null;
        $paidreferrals =null;
        $unpaidreferrals =null;
        $totaltransactions =null;


        $countrycodes = DB::table('country_codes')->get();

        $user_id = Auth::guard('affiliate')->user()->id;

        $affiliate = DB::table('affiliates')->where('id','=',$user_id)->get();

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

        $payments = DB::table('affiliate_payments')->where('affiliate_id','=',$user_id)->get();
        $products = DB::table('products')->get();





        return view('affiliate.dashboard', compact('referrals','countrycodes','affiliate','referraltotal','referralbalance','totalreferrals','paidreferrals','unpaidreferrals','totaltransactions','payments','products'));

    }

    public function updateProfile(Request $request)
    {

        $params = $request->except('_token');
//ddd($params);
        $product = $this->affiliateDashboardRepository->updateAffiliateDashboard($params);

        if (!$product) {
            return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
        }
        return $this->responseRedirect('affiliate.dashboard', 'Product updated successfully' ,'success',false, false);



    }

}
