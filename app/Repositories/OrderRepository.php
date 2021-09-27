<?php

namespace App\Repositories;

use Cart;
use Auth;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;

class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
//        ddd($params);
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'processing',
            'subtotal'          =>  $params['subtotal'],
//                \Cart::session(Auth::guard()->user()->id)->getSubTotalWithoutConditions(),
            'shipping'          =>  $params['shipping'],
            'grand_total'       =>  $params['total'],
//            \Cart::session(Auth::guard()->user()->id)->getTotal(),
            'item_count'        =>  \Cart::session(Auth::guard()->user()->id)-> getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  $params['payWith'],
            'billing_first_name'        =>  $params['billing_first_name'],
            'billing_last_name'         =>  $params['billing_last_name'],
            'billing_address'           =>  $params['billing_address'],
            'billing_city'              =>  $params['billing_city'],
            'billing_state'              =>  $params['billing_state'],
            'billing_country'           =>  $params['billing_country'],
            'billing_post_code'         =>  $params['billing_post_code'],
            'billing_email'         =>  $params['billing_email'],
            'billing_phone_number'      =>  $params['billing_phone_number'],
            'shipping_first_name'        =>  $params['shipping_first_name'],
            'shipping_last_name'         =>  $params['shipping_last_name'],
            'shipping_address'           =>  $params['shipping_address'],
            'shipping_city'              =>  $params['shipping_city'],
            'shipping_state'              =>  $params['shipping_state'],
            'shipping_country'           =>  $params['shipping_country'],
            'shipping_post_code'         =>  $params['shipping_post_code'],
            'shipping_email'         =>  $params['shipping_email'],
            'shipping_phone_number'      =>  $params['shipping_phone_number'],
            'notes'                     =>  $params['notes']
        ]);

        if ($order) {

            $items = \Cart::session(Auth::guard()->user()->id)->getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'order_id'      => $order->id,
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->price
                ]);

                $order->items()->save($orderItem);
            }
        }
//ddd($order);
        return $order;
    }

    public function listOrders(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findOrderByNumber($orderNumber)
    {
        return Order::where('order_number', $orderNumber)->first();
    }

}
