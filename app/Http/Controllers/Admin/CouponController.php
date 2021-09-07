<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CouponContract;
use App\Http\Controllers\BaseController;

class CouponController extends BaseController
{

    /**
     * @var CouponContract
     */
    protected $CouponRepository;

    /**
     * CouponController constructor.
     * @param CouponContract $CouponRepository
     */
    public function __construct(CouponContract $CouponRepository)
    {
        $this->CouponRepository = $CouponRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $coupons = $this->CouponRepository->listCoupons();

        $this->setPageTitle('Coupons', 'List of all coupons');
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $coupons = $this->CouponRepository->listCoupons('id', 'asc');

        $this->setPageTitle('Coupons', 'Create Coupon');
        return view('admin.coupons.create', compact('coupons'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//
        $this->validate($request, [
        ]);

        $params = $request->except('_token');

        $coupon= $this->CouponRepository->createCoupon($params);
        //ddd($coupon);
        if (!$coupon) {

            return $this->responseRedirectBack('Error occurred while creating coupon.', 'error', true, true);
        }

        return $this->responseRedirect('admin.coupons.index', 'Coupon added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $coupons = $this->CouponRepository->findCouponById($id);
//        $coupons = $this->CouponRepository->treeList();

        $this->setPageTitle('Coupons', 'Edit Coupon : '.$coupons->name);
        return view('admin.coupons.edit', compact('coupons'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $this->validate($request, [

        ]);
        //ddd($request);
        $params = $request->except('_token');

        $Coupon = $this->CouponRepository->updateCoupon($params);

        if (!$Coupon) {
//
            return $this->responseRedirectBack('Error occurred while updating Coupon.', 'error', true, true);
        }
        return $this->responseRedirectBack('Coupon updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Coupon = $this->CouponRepository->deleteCoupon($id);

        if (!$Coupon) {
            return $this->responseRedirectBack('Error occurred while deleting Coupon.', 'error', true, true);
        }
        return $this->responseRedirect('admin.coupons.index', 'Coupon deleted successfully' ,'success',false, false);
    }
}
