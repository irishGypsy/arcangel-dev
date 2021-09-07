@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
{{--        <a href="{{ route('admin.inventories.create') }}" class="btn btn-primary pull-right">Back</a>--}}
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr class="text-center">
                            <th> # </th>
                            <th> Title </th>
                            <th> SKU </th>
                            <th> Active Integrations </th>
                            <th> Available QTY</th>
                            <th> Amazon QTY </th>
                            <th> Ebay QTY </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inventories as $inventory)

                            <tr class="text-center">
                                <td>{{ $inventory->id }}</td>
                                <td>{{ $inventory->name }}</td>
                                <td>{{ $inventory->sku }}</td>
                                <td>
                                        @if( Str::of($inventory->integrations)->trim() == 'Amazon' || Str::of($inventory->integrations)->trim() == 'Both')
                                        <a href="https://sellercentral.amazon.com/skucentral?mSku={{ $inventory->amazon_listing_id }}ref=myi_skuc" target="_blank">
                                        <img src="{{ asset('/frontend/images/amazon.png')}}" class="img-thumbnail" width="50px"></a>
                                    @endif
                                      @if( Str::of($inventory->integrations)->trim() == 'Ebay' || Str::of($inventory->integrations)->trim() == 'Both')
                                        <a href="https://www.ebay.com/itm/{{ $inventory->ebay_listing_id }}" target="_blank">
                                        <img src="{{ asset('/frontend/images/ebay.png') }}" class="img-thumbnail" width="50px"></a>
                                    @endif
                                </td>
                                <td>{{ $inventory->available_qty }}</td>
                                <td>{{ $inventory->amazon_qty }}</td>
                                <td>{{ $inventory->ebay_qty }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.inventories.edit', $inventory->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.inventories.delete', $inventory->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
