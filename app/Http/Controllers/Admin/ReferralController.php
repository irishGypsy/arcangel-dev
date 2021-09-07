<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\ReferralContract;
use App\Http\Controllers\BaseController;

class ReferralController extends BaseController
{

    /**
     * @var ReferralContract
     */
    protected $ReferralRepository;

    /**
     * ReferralController constructor.
     * @param ReferralContract $ReferralRepository
     */
    public function __construct(ReferralContract $ReferralRepository)
    {
        $this->ReferralRepository = $ReferralRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $referrals = $this->ReferralRepository->listReferrals();

        $this->setPageTitle('Referrals', 'List of all referrals');
        return view('admin.referrals.index', compact('referrals'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function create()
//    {
//        $banners = $this->ReferralRepository->listReferrals('id', 'asc');
//
//        $this->setPageTitle('Referrals', 'Create Referral');
//        return view('admin.banners.create', compact('banners'));
//    }

//    /**
//     * @param Request $request
//     * @return \Illuminate\Http\RedirectResponse
//     * @throws \Illuminate\Validation\ValidationException
//     */
//    public function store(Request $request)
//    {
////
//        $this->validate($request, [
//            'title'      =>  'required|max:191',
//            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
//        ]);
//
//        $params = $request->except('_token');
//
//        $banner= $this->ReferralRepository->createReferral($params);
//        //ddd($banner);
//        if (!$banner) {
//
//            return $this->responseRedirectBack('Error occurred while creating banner.', 'error', true, true);
//        }
//
//        return $this->responseRedirect('admin.banners.index', 'Referral added successfully' ,'success',false, false);
//    }
//
//    /**
//     * @param $id
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function edit($id)
//    {
//        $banners = $this->ReferralRepository->findReferralById($id);
////        $banners = $this->ReferralRepository->treeList();
//
//        $this->setPageTitle('Referrals', 'Edit Referral : '.$banners->name);
//        return view('admin.banners.edit', compact('banners'));
//    }
//
//    /**
//     * @param Request $request
//     * @return \Illuminate\Http\RedirectResponse
//     * @throws \Illuminate\Validation\ValidationException
//     */
//    public function update(Request $request)
//    {
//
//        $this->validate($request, [
//            'title'      =>  'required|max:191',
//            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
//        ]);
//        //ddd($request);
//        $params = $request->except('_token');
//
//        $Referral = $this->ReferralRepository->updateReferral($params);
//
//        if (!$Referral) {
////
//            return $this->responseRedirectBack('Error occurred while updating Referral.', 'error', true, true);
//        }
//        return $this->responseRedirectBack('Referral updated successfully' ,'success',false, false);
//    }
//
//    /**
//     * @param $id
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function delete($id)
//    {
//        $Referral = $this->ReferralRepository->deleteReferral($id);
//
//        if (!$Referral) {
//            return $this->responseRedirectBack('Error occurred while deleting Referral.', 'error', true, true);
//        }
//        return $this->responseRedirect('admin.banners.index', 'Referral deleted successfully' ,'success',false, false);
//    }
}
