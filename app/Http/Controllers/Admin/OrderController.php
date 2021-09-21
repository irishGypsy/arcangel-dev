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

        $this->setPageTitle('Order Details', $orderNumber);
        return view('admin.orders.show', compact('order'));
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
