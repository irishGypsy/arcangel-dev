<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\CapacityContract;
use App\Http\Controllers\BaseController;

class CapacityController extends BaseController
{

    /**
     * @var CapacityContract
     */
    protected $CapacityRepository;

    /**
     * CapacityController constructor.
     * @param CapacityContract $CapacityRepository
     */
    public function __construct(CapacityContract $CapacityRepository)
    {
        $this->CapacityRepository = $CapacityRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $capacities = $this->CapacityRepository->listCapacities();

        $this->setPageTitle('Capacities', 'List of all capacities');
        return view('admin.capacities.index', compact('capacities'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $capacities = $this->CapacityRepository->listCapacities('id', 'asc');

        $this->setPageTitle('Capacities', 'Create Capacity');
        return view('admin.capacities.create', compact('capacities'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
//
//        $this->validate($request, [
//            'title'      =>  'required|max:191',
//            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
//        ]);

        $params = $request->except('_token');

        $capacity= $this->CapacityRepository->createCapacity($params);
        //ddd($capacity);
        if (!$capacity) {

            return $this->responseRedirectBack('Error occurred while creating capacity.', 'error', true, true);
        }

        return $this->responseRedirect('admin.capacities.index', 'Capacity added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $capacities = $this->CapacityRepository->findCapacityById($id);
//        $capacities = $this->CapacityRepository->treeList();

        $this->setPageTitle('Capacities', 'Edit Capacity : '.$capacities->name);
        return view('admin.capacities.edit', compact('capacities'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

//        $this->validate($request, [
//            'title'      =>  'required|max:191',
//            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
//        ]);
        //ddd($request);
        $params = $request->except('_token');

        $capacity = $this->CapacityRepository->updateCapacity($params);

        if (!$capacity) {
//
            return $this->responseRedirectBack('Error occurred while updating Capacity.', 'error', true, true);
        }
        return $this->responseRedirectBack('Capacity updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $capacity = $this->CapacityRepository->deleteCapacity($id);

        if (!$capacity) {
            return $this->responseRedirectBack('Error occurred while deleting Capacity.', 'error', true, true);
        }
        return $this->responseRedirect('admin.capacities.index', 'Capacity deleted successfully' ,'success',false, false);
    }
}
