<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Contracts\SerialNumberContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class SerialNumberController extends BaseController
{
//use Auth;
    /**
     * @var SerialNumberContract
     */
    protected $SerialNumberRepository;

    /**
     * SerialNumberController constructor.
     * @param SerialNumberContract $SerialNumberRepository
     */
    public function __construct(SerialNumberContract $SerialNumberRepository)
    {
        $this->SerialNumberRepository = $SerialNumberRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $serialnumbers = DB::table('serial_numbers')
                            ->leftJoin('users','serial_numbers.user_id','=','users.id')
                            ->leftJoin('products','serial_numbers.product_id','=','products.id')
                            ->leftJoin('orders','serial_numbers.order_id','=','orders.id')
                            ->get(['serial_numbers.id',
                                    'serial_numbers.serial_number',
                                    'users.first_name',
                                    'users.last_name',
                                    'products.name',
                                    'orders.order_number',
                                    'orders.created_at']);

        $this->setPageTitle('SerialNumbers', 'List of all serialnumbers');
        return view('admin.serialnumbers.index', compact('serialnumbers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $serialnumbers = $this->SerialNumberRepository->listSerialNumbers('id', 'asc');

        $this->setPageTitle('SerialNumbers', 'Create SerialNumber');
        return view('admin.serialnumbers.create', compact('serialnumbers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $serialnumber= $this->SerialNumberRepository->createSerialNumber($params);

        if (!$serialnumber) {

            return $this->responseRedirectBack('Error occurred while creating serialnumber.', 'error', true, true);
        }

        return $this->responseRedirect('admin.serialnumbers.index', 'SerialNumber added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $serialnumbers = $this->SerialNumberRepository->findSerialNumberById($id);

        $this->setPageTitle('SerialNumbers', 'Edit SerialNumber : '.$serialnumbers->name);
        return view('admin.serialnumbers.edit', compact('serialnumbers'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $serialNumber = $this->SerialNumberRepository->updateSerialNumber($params);

        if (!$serialNumber) {

            return $this->responseRedirectBack('Error occurred while updating SerialNumber.', 'error', true, true);
        }
        return $this->responseRedirectBack('SerialNumber updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $serialNumber = $this->SerialNumberRepository->deleteSerialNumber($id);

        if (!$serialNumber) {
            return $this->responseRedirectBack('Error occurred while deleting SerialNumber.', 'error', true, true);
        }
        return $this->responseRedirect('admin.serialnumbers.index', 'SerialNumber deleted successfully' ,'success',false, false);
    }
}
