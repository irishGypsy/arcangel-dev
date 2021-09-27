<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Contracts\PackageContract;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;

class PackageController extends BaseController
{
//use Auth;
    /**
     * @var PackageContract
     */
    protected $PackageRepository;

    /**
     * PackageController constructor.
     * @param PackageContract $PackageRepository
     */
    public function __construct(PackageContract $PackageRepository)
    {
        $this->PackageRepository = $PackageRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $packages = $this->PackageRepository->listPackages();

        $this->setPageTitle('Packages', 'List of all packages');
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $packages = $this->PackageRepository->listPackages('id', 'asc');

        $this->setPageTitle('Packages', 'Create Package');
        return view('admin.packages.create', compact('packages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $params = $request->except('_token');

        $package= $this->PackageRepository->createPackage($params);

        if (!$package) {

            return $this->responseRedirectBack('Error occurred while creating package.', 'error', true, true);
        }

        return $this->responseRedirect('admin.packages.index', 'Package added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $packages = $this->PackageRepository->findPackageById($id);

        $this->setPageTitle('Packages', 'Edit Package : '.$packages->name);
        return view('admin.packages.edit', compact('packages'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $params = $request->except('_token');

        $package = $this->PackageRepository->updatePackage($params);

        if (!$package) {

            return $this->responseRedirectBack('Error occurred while updating Package.', 'error', true, true);
        }
        return $this->responseRedirectBack('Package updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $package = $this->PackageRepository->deletePackage($id);

        if (!$package) {
            return $this->responseRedirectBack('Error occurred while deleting Package.', 'error', true, true);
        }
        return $this->responseRedirect('admin.packages.index', 'Package deleted successfully' ,'success',false, false);
    }
}
