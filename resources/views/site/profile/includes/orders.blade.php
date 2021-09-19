<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title profile-title p-2">My Orders</h3>
            <hr>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th> Order Number </th>
                        <th class="text-center"> Total Amount </th>
                        <th class="text-center"> Items Qty </th>
                        <th class="text-center"> Payment Status </th>
                        <th class="text-center"> Status </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td class="text-center">{{ config('settings.currency_symbol') }}{{ number_format($order->grand_total,2,'.',',') }}</td>
                            <td class="text-center">{{ $order->item_count }}</td>
                            <td class="text-center">
                                @if ($order->payment_status == 1)
                                    <span class="badge badge-success">Completed</span>
                                @else
                                    <span class="badge badge-danger">Not Completed</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($order->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @elseif ($order->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($order->status == 'processing')
                                    <span class="badge badge-warning">Processing</span>
                                @else
                                    <span class="badge badge-danger">Not Completed</span>
                                @endif
                            </td>
{{--                            need to show order or receipt?     --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
