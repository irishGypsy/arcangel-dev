<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\BatteryFinderContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatteryFinderController extends BaseController
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

        $params = $request->except('_token');

        $Banner = $this->BatteryFinderRepository->updateBatteryFinder($params);

        if (!$Banner) {
//
            return $this->responseRedirectBack('Error occurred while updating Banner.', 'error', true, true);
        }
        return $this->responseRedirectBack('Banner updated successfully' ,'success',false, false);
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

    public function listMakes()
    {
        $makes = DB::table('battery__finders')->distinct()->get(['make'])->toJson(JSON_PRETTY_PRINT);

        return response($makes, 200);

    }

    public function listModels($make)
    {
        $models = DB::table('battery__finders')->distinct()->where('make',$make)->get(['model'])->toJson(JSON_PRETTY_PRINT);

        return response($models, 200);
    }

    public function listYears($make, $model)
    {
        $years = DB::table('battery__finders')->distinct()->where('make',$make)
            ->where('model', $model)->orderBy('year','desc')->get(['year'])->toJson(JSON_PRETTY_PRINT);

        return response($years, 200);
    }

    public function listEngines($make, $model, $year)
    {
        $engines = DB::table('battery__finders')->distinct()
            ->where('make',$make)
            ->where('model', $model)
            ->where('year', $year)
//            ->orderBy('year','desc')
            ->get(['engine_name'])->toJson(JSON_PRETTY_PRINT);

        return response($engines, 200);
    }

    public function getBatteryGroup($make, $model, $year, $engine)
    {
        $batterygroup = DB::table('battery__finders')->distinct()
            ->where('make',$make)
            ->where('model', $model)
            ->where('year', $year)
            ->where('engine_name', $engine)
            ->orderBy('group_name','asc')
            ->get(['id','group_name'])->toJson(JSON_PRETTY_PRINT);

        return response($batterygroup, 200);
    }

    public function getBatteryGroup2(Request $request)
    {

        $batteryfinder2 = DB::table('battery__finders')->distinct()
            ->where('make',$request->make)
            ->where('model', $request->model)
            ->where('year', $request->year)
            ->where('engine_name', $request->engine)
            ->orderBy('group_name','asc')
            ->get(['group_name']);

        $batteryfinder = $batteryfinder2->unique('group_name');

        $products = new Collection();

        foreach($batteryfinder as $b)
        {
            $b_id = DB::table('battery_groups')
                ->where('battery_group_name','LIKE','%'.$b->group_name.'%')
                ->get();
            $product = Product::query()->where('batterygroup_id','=',$b_id[0]->id)
                ->first();

            $products->push($product);
        }

        $battery_groups = DB::table('battery_groups')
            ->select('battery_group_name','id')
            ->get()
            ->keyBy('battery_group_name');

        $capacities = DB::table('capacities')
            ->select('capacity_code','capacity_name','id')
            ->get()
            ->keyBy('capacity_name') ;

        return view('site.pages.products', compact('batteryfinder','products','battery_groups','capacities'));
    }

    public function listBatteryGroup($make, $model, $year, $engine)
    {
        $batterygroup = DB::table('battery__finders')->distinct()
            ->where('make',$make)
            ->where('model', $model)
            ->where('year', $year)
            ->where('engine_name', $engine)
            ->orderBy('group_name','asc')
            ->get(['id','group_name']);

        return $batterygroup;
    }
}
