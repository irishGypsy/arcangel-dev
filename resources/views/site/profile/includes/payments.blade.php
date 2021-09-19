

<div class="d-flex flex-column justify-content-start" style="">
    <h3 class="tile-title profile-title p-2">My Payments</h3>
    <hr>
    <div class="d-flex flex-row justify-content-center">
        <div class="widget-small primary mx-3 my-2">
            {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
            <div class="info">
                <p class="p-3"><b>${{$referraltotal ?? 0.00}} USD</b></p>
                <h4 class="p-2">Your earnings to date (total transactions)</h4>
            </div>
        </div>
        <div class="widget-small primary mx-3 my-2">
            {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
            <div class="info">
                <p class="p-3"><b>${{$referralbalance ?? 0.00}} USD</b></p>
                <h4 class="p-2">Your current balance</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr class="text-center">
                            <th class="text-center"> # </th>
                            <th class="text-center"> Amount </th>
                            <th class="text-center"> Create Date </th>
                            <th class="text-center"> Payment Date </th>
                            <th class="text-center"> Payment Status </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $p)
                            <tr class="text-center">
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->amount }}</td>
                                <td>{{ $p->created_at }}</td>
                                <td>{{ $p->paid_date }}</td>
                                <td>{{ $p->status }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
