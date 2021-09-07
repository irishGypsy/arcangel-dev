<?php

namespace App\Http\Controllers\Admin;

use App\Models\Affiliate;
use Illuminate\Http\Request;
use App\Contracts\AffiliateContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AffiliateController extends BaseController
{

    /**
     * @var AffiliateContract
     */
    protected $AffiliateRepository;

    /**
     * AffiliateController constructor.
     * @param AffiliateContract $AffiliateRepository
     */
    public function __construct(AffiliateContract $AffiliateRepository)
    {
        $this->AffiliateRepository = $AffiliateRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $affiliates = $this->AffiliateRepository->listAffiliates();

        $this->setPageTitle('Affiliates', 'List of all affiliates');
        return view('admin.affiliates.index', compact('affiliates'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $affiliates = $this->AffiliateRepository->listAffiliates('id', 'asc');
        $countrycodes = DB::table('country_codes')->get();

        $this->setPageTitle('Affiliates', 'Create Affiliate');
        return view('admin.affiliates.create', compact('affiliates', 'countrycodes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->merge(['password' => Hash::make($request['password'])]);
        $params = $request->except('_token');

        $affiliate= $this->AffiliateRepository->createAffiliate($params);
//        ddd($affiliate);
        if (!$affiliate) {

            return $this->responseRedirectBack('Error occurred while creating affiliate.', 'error', true, true);
        }

        return $this->responseRedirect('admin.affiliates.index', 'Affiliate added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $affiliates = $this->AffiliateRepository->findAffiliateById($id);
        $countrycodes = DB::table('country_codes')->get();

        $this->setPageTitle('Affiliates', 'Edit Affiliate : '.$affiliates->name);
        return view('admin.affiliates.edit', compact('affiliates','countrycodes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $request->merge(['password' => Hash::make($request['password'])]);
//ddd($request);
        $params = $request->except('_token');

        $Affiliate = $this->AffiliateRepository->updateAffiliate($params);

        if (!$Affiliate) {
//
            return $this->responseRedirectBack('Error occurred while updating Affiliate.', 'error', true, true);
        }
        return $this->responseRedirectBack('Affiliate updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Affiliate = $this->AffiliateRepository->deleteAffiliate($id);

        if (!$Affiliate) {
            return $this->responseRedirectBack('Error occurred while deleting Affiliate.', 'error', true, true);
        }
        return $this->responseRedirect('admin.affiliates.index', 'Affiliate deleted successfully' ,'success',false, false);
    }
}
