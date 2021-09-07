<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BatteryFinderContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatteryFinder extends Controller
{

    /**
     * @var BatteryFinderContract
     */
    protected $BatteryFinderRepository;

    /**
     * BatteryFinderController constructor.
     * @param BatteryFinderContract $BatteryFinderRepository
     */
    public function __construct(BatteryFinderContract $BatteryFinderRepository)
    {
        $this->BatteryFinderRepository = $BatteryFinderRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $batteryfinders = $this->BatteryFinderRepository->listBatteryFinders();

        $this->setPageTitle('BatteryFinders', 'List of all BatteryFinders');
        return view('admin.batteryfinders.index', compact('batteryfinders'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $batteryfinders = $this->BatteryFinderRepository->listBatteryFinders('id', 'asc');

        $this->setPageTitle('BatteryFinders', 'Create BatteryFinder');
        return view('admin.batteryfinders.create', compact('batteryfinders'));
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
            'title'      =>  'required|max:191',
            'image'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');

        $batteryfinder= $this->BatteryFinderRepository->createBatteryFinder($params);
        //ddd($batteryfinder);
        if (!$batteryfinder) {

            return $this->responseRedirectBack('Error occurred while creating BatteryFinder.', 'error', true, true);
        }

        return $this->responseRedirect('admin.batteryfinders.index', 'BatteryFinder added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $batteryfinders = $this->BatteryFinderRepository->findBatteryFinderById($id);
//        $batteryfinders = $this->BatteryFinderRepository->treeList();

        $this->setPageTitle('BatteryFinders', 'Edit BatteryFinder : '.$batteryfinders->name);
        return view('admin.batteryfinders.edit', compact('batteryfinders'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

//ddd($request);
        $params = $request->except('_token');

        $Banner = $this->BatteryFinderRepository->updateBatteryFinder($params);

        if (!$Banner) {
//
            return $this->responseRedirectBack('Error occurred while updating BatteryFinder.', 'error', true, true);
        }
        return $this->responseRedirectBack('BatteryFinder updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Banner = $this->BatteryFinderRepository->deleteBatteryFinder($id);

        if (!$Banner) {
            return $this->responseRedirectBack('Error occurred while deleting BatteryFinder.', 'error', true, true);
        }
        return $this->responseRedirect('admin.batteryfinders.index', 'BatteryFinder deleted successfully' ,'success',false, false);
    }

}
