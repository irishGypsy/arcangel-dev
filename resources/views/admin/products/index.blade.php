@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Add Product</a>
    </div>
    @include('admin.partials.flash')
{{--============ start general tab =============    --}}
<div class="tab-content">
    <div class="tab-pane active" id="general">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr class="text-center">
                                <th class="text-center"> # </th>
                                <th class="text-center"> Image </th>
                                <th class="text-center"> Name </th>
                                <th class="text-center"> SKU </th>
                                <th class="text-center"> Tech Specs </th>
                                <th class="text-center"> MRP </th>
                                <th class="text-center"> Shipping </th>
                                <th class="text-center"> Popular </th>
                                <th class="text-center"> Review </th>
                                <th class="text-center"> Sales </th>
                                <th class="text-center"> Inventory </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="text-center">
                                    <td>{{ $product->id }}</td>
    {{--                                show the first product image in the index table--}}
                                    <td><img src="{{ asset('storage/'.$product->firstImage() ) }}" id="bannerImage" class="img-fluid" alt="img" width="400px"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ \Illuminate\Support\Str::of($product->technical_specifications)->limit('50','
(...)') }}</td>
                                    <td>${{ number_format($product->mrp,2,'.',',') }}</td>
    {{--                                shipping cost, formatted--}}
                                    <td>${{ number_format($product->shipping,2,'.',',') }}</td>
    {{--                                clickable star indicator to set item popular or not--}}
                                    <td><a href="{{ route('admin.products.flippopular', $product->id) }}">
                                        @if($product->popular)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                        </a>
                                    </td>
    {{--                                show productreviews for this product index table--}}
                                    <td><a href="{{ route('admin.productreviews.index', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i></a></td>
    {{--                                add this product to a sale--}}
                                    <td>
                                        <a href="{{ route('admin.sales.create', $product->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-plus-square"></i>
                                        </a>
                                        @foreach($sales as $s)
                                            @if($s->productID == $product->id)
                                                <a href="{{ route('admin.sales.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                {{ '('.($s->discount*100).'%)' }}
                                            @endif
                                        @endforeach
                                    </td>
    {{--                                update inventory for this item--}}
                                    <td><a href="{{ route('admin.inventories.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i></a></td>
    {{--                                edit item and delete item buttons--}}
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    </div>

</div>

@endsection
@push('scripts')

@endpush
