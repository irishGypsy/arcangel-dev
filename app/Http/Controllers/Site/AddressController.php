<?php

namespace App\Http\Controllers\Site;

use Auth;
use Illuminate\Http\Request;
use App\Contracts\AddressContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class AddressController extends BaseController
{
//use Auth;
    /**
     * @var AddressContract
     */
    protected $AddressRepository;

    /**
     * AddressController constructor.
     * @param AddressContract $AddressRepository
     */
    public function __construct(AddressContract $AddressRepository)
    {
        $this->AddressRepository = $AddressRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $id = Auth::guard()->user()->id;

        $addresses = DB::table('addresses')
            ->where('user_id','=',$id)
            ->first();

        $this->setPageTitle('Addresses', 'List of all addresses');
        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $addresses = $this->AddressRepository->listAddresses('id', 'asc');

        $this->setPageTitle('Addresses', 'Create Address');
        return view('admin.addresses.create', compact('addresses'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $address= $this->AddressRepository->createAddress($params);

        if (!$address) {

            return $this->responseRedirectBack('Error occurred while creating address.', 'error', true, true);
        }

        return $this->responseRedirect('admin.addresses.index', 'Address added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id = Auth::guard()->user()->id;

        $addresses = DB::table('addresses')
                        ->where('user_id','=',$id)
                        ->first();

        $this->setPageTitle('Addresss', 'Edit Address : '.$addresses->name);
        return view('admin.addresses.edit', compact('addresses'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $address = $this->AddressRepository->updateAddress($params);

        if (!$address) {
//
            return $this->responseRedirectBack('Error occurred while updating Address.', 'error', true, true);
        }
        return $this->responseRedirectBack('Address updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $address = $this->AddressRepository->deleteAddress($id);

        if (!$address) {
            return $this->responseRedirectBack('Error occurred while deleting Address.', 'error', true, true);
        }
        return $this->responseRedirect('admin.addresses.index', 'Address deleted successfully' ,'success',false, false);
    }
}
