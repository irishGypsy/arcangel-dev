<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title profile-title p-2">My Dashboard</h3>
        <hr>
        <div class="tile-body">
            <div class="d-flex flex-column">
{{--                <div class="card ml-2" style="width:800px;">--}}
{{--                    <h5 class="card-title affiliate-overview-title">Overview</h5>--}}
{{--                </div>--}}
                <div class="d-flex flex-row justify-content-center">
                    <div class="widget-small primary mx-3 my-2">
                        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                        <div class="info">
                            <p class="p-3"><b>{{ $totalrefferals ?? 0 }}</b></p>
                            <h4 class="p-2">Total Referrals</h4>
                        </div>
                    </div>
                    <div class="widget-small primary mx-3 my-2">
                        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                        <div class="info">
                            <p class="p-3"><b>{{ $paidreferrals ?? 0 }}</b></p>
                            <h4 class="p-2">Paid Referrals</h4>
                        </div>
                    </div>
                    <div class="widget-small primary mx-3 my-2">
                        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                        <div class="info">
                            <p class="p-3"><b>{{ $unpaidreferrals ?? 0 }}</b></p>
                            <h4 class="p-2">Unpaid Referrals</h4>
                        </div>
                    </div>
                    <div class="widget-small primary mx-3 my-2">
                        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                        <div class="info">
                            <p class="p-3"><b>{{ $totaltransactions ?? 0 }}</b></p>
                            <h4 class="p-2">Total Transactions</h4>
                        </div>
                    </div>
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
            </div>
        </div>
    </form>
</div>
