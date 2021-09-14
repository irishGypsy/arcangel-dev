<?php

namespace App\Repositories;

use Cart;
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
        $order = Order::create([
            'order_number'      =>  'ORD-'.strtoupper(uniqid()),
            'user_id'           => auth()->user()->id,
            'status'            =>  'pending',
            'grand_total'       =>  Cart::getSubTotal(),
            'item_count'        =>  Cart::getTotalQuantity(),
            'payment_status'    =>  0,
            'payment_method'    =>  null,
            'billing_first_name'        =>  $params['billing_first_name'],
            'billing_last_name'         =>  $params['billing_last_name'],
            'billing_address'           =>  $params['billing_address'],
            'billing_city'              =>  $params['billing_city'],
            'billing_state'              =>  $params['billing_state'],
            'billing_country'           =>  $params['billing_country'],
            'billing_post_code'         =>  $params['billing_post_code'],
            'billing_phone_number'      =>  $params['billing_phone_number'],
            'shipping_first_name'        =>  $params['shipping_first_name'],
            'shipping_last_name'         =>  $params['shipping_last_name'],
            'shipping_address'           =>  $params['shipping_address'],
            'shipping_city'              =>  $params['shipping_city'],
            'shipping_state'              =>  $params['shipping_state'],
            'shipping_country'           =>  $params['shipping_country'],
            'shipping_post_code'         =>  $params['shipping_post_code'],
            'shipping_phone_number'      =>  $params['shipping_phone_number'],
            'notes'             =>  $params['notes']
        ]);

        if ($order) {

            $items = Cart::getContent();

            foreach ($items as $item)
            {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('name', $item->name)->first();

                $orderItem = new OrderItem([
                    'product_id'    =>  $product->id,
                    'quantity'      =>  $item->quantity,
                    'price'         =>  $item->getPriceSum()
                ]);

                $order->items()->save($orderItem);
            }
        }

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
