

<div class="d-flex flex-column justify-content-start" style="">


    <div class="row">
        <div class="col-md-14">
            <div class="tile">
                <h3 class="tile-title profile-title p-2">Affiliate Links</h3>
                <hr>
                <div class="tile-body">
                    <table class="affiliate-table table table-hover table-bordered" id="sampleTable" style="width:800px;text-align: left; text-overflow: initial;line-height:1;">
                        <thead>
                        <tr class="text-center">
                            <th class="text-center"> # </th>
                            <th class="text-center"> Image </th>
                            <th class="text-center"> Title </th>
                            <th class="text-center"> Product Affiliate Link </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $o)
                            <tr class="text-center">
                                <td>{{ $o->id }}</td>
                                <td><img src="{{ asset('frontend/images/logo2.png') }}" width="80px"></td>
                                <td>{{ $o->name }}</td>
                                <td>https://www.arcangelbattery.com/ref?id={{ $affiliate[0]->affiliate_code }}&url=product/{{ $o->id }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{--    {{$affiliate}}--}}
</div>
