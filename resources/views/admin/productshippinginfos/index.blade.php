@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.productshippinginfos.create') }}" class="btn btn-primary pull-right">Add Product Shipping Info</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr class="text-center">
                            <th> Name </th>
                            <th> UK Ship </th>
                            <th> Euro Ship </th>
                            <th> Global Ship </th>
                            <th> L </th>
                            <th> W </th>
                            <th> H </th>
                            <th> Weight </th>
                            <th> Delivery Time </th>
                            <th> Replacement </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productshippinginfos as $productshippinginfo)

                                <tr class="text-center">
                                    <td>{{ $productshippinginfo->product->name }}</td>
                                    <td>${{ number_format($productshippinginfo->shipping_uk,2,'.',',') }}</td>
                                    <td>${{ number_format($productshippinginfo->shipping_europe,2,'.',',') }}</td>
                                    <td>${{ number_format($productshippinginfo->shipping_global,2,'.',',') }}</td>
                                    <td>{{ $productshippinginfo->length }} in</td>
                                    <td>{{ $productshippinginfo->width }} in</td>
                                    <td>{{ $productshippinginfo->height }} in</td>
                                    <td>{{ $productshippinginfo->weight }} lb</td>
                                    <td>{{ $productshippinginfo->delivery_time }}</td>
                                    <td>{{ $productshippinginfo->replacement_time }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.productshippinginfos.edit', $productshippinginfo->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.productshippinginfos.delete', $productshippinginfo->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
