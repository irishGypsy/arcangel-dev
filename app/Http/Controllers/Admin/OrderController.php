<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\BaseController;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
//        ddd($this->getMonthlyOrderCount());
        $orders = $this->orderRepository->listOrders();
        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = $this->orderRepository->findOrderByNumber($orderNumber);
        $shipping_state = DB::table('state_codes')
                            ->where('id', $order->shipping_state)
                            ->get('abbreviation');
        $shipping_country = DB::table('country_codes')
                            ->where('id',$order->shipping_country)
                            ->get('country');
        $shipping_state = $shipping_state[0]->abbreviation;
        $shipping_country = $shipping_country[0]->country;
//ddd($shipping_state);
        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order','shipping_state','shipping_country'));
    }

    public function updateStatus($id, $value)
    {
        DB::table('orders')
            ->where('id','=', $id)
            ->update(['status' => $value]);

        $orders = $this->orderRepository->listOrders();

        $this->setPageTitle('Orders', 'List of all orders');
        return view('admin.orders.index', compact('orders'));
    }

    public function orderCount()
    {
        return DB::table('orders')->count();
    }

    public function orderSum()
    {
        return DB::table('orders')->sum('grand_total');
    }

    public function getMonthlyOrderCount()
    {

        $full= DB::table('orders')
            ->selectRaw('YEAR(created_at),MONTH(created_at),MONTHNAME(created_at) as month,count(*) as count')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at),MONTH(created_at)')
            ->get()->pluck('month')->toJson();
        return $full;
    }
}
