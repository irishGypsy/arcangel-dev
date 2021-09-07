<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BatteryGroupContract;
use App\Http\Controllers\BaseController;

class BatteryGroupController extends BaseController
{
    /**
     * @var BatteryGroupContract
     */
    protected $batteryGroupRepository;

    /**
     * CategoryController constructor.
     * @param BatteryGroupContract $batterygroupRepository
     */
    public function __construct(BatteryGroupContract $batteryGroupRepository)
    {
        $this->BatteryGroupRepository = $batteryGroupRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $batterygroups = $this->BatteryGroupRepository->listBatteryGroups();

        $this->setPageTitle('Battery Group', 'List of all battery groups');
        return view('admin.batterygroups.index', compact('batterygroups'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Battery Group', 'Create Battery Group');
        return view('admin.batterygroups.create');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'material_name'      =>  'required|max:191',
        ]);

        $params = $request->except('_token');

        $batterygroup = $this->BatteryGroupRepository->createBatteryGroup($params);

        if (!$batterygroup) {
            return $this->responseRedirectBack('Error occurred while creating battery group.', 'error', true, true);
        }
        return $this->responseRedirect('admin.batterygroups.index', 'Battery Group added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $batterygroup = $this->BatteryGroupRepository->findBatteryGroupById($id);

        $this->setPageTitle('Battery Group', 'Edit Battery Group : '.$batterygroup->material_name);
        return view('admin.batterygroups.edit', compact('batterygroup'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'material_name'      =>  'required|max:191',
        ]);

        $params = $request->except('_token');

        $batterygroup = $this->BatteryGroupRepository->updateBatteryGroup($params);

        if (!$batterygroup) {
            return $this->responseRedirectBack('Error occurred while updating battery group.', 'error', true, true);
        }
        return $this->responseRedirectBack('Battery group updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $batterygroup = $this->BatteryGroupRepository->deleteBatteryGroup($id);

        if (!$batterygroup) {
            return $this->responseRedirectBack('Error occurred while deleting battery group.', 'error', true, true);
        }
        return $this->responseRedirect('admin.batterygroups.index', 'Battery group deleted successfully' ,'success',false, false);
    }

}
