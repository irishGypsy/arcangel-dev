

<div class="d-flex flex-column justify-content-start" style="">
    <div class="card ml-2" style="width:800px;">
        <h3 class="tile-title profile-title p-2">My Referrals</h3>
        <hr>
    </div>
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
                            <th class="text-center"> Payment Status </th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Date </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($referrals as $r)
                            <tr class="text-center">
                                <td>{{ $r->id }}</td>
                                {{--                                              show the first product image in the index table--}}
                                {{--                                                    <td><img src="{{ asset('storage/'.$product->firstImage() ) }}" id="bannerImage" class="img-fluid" alt="img" width="400px"></td>--}}
                                <td>{{ $r->total }}</td>
                                <td>{{ $r->paid }}</td>
                                <td>{{ $r->status }}</td>
                                <td>{{ $r->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
