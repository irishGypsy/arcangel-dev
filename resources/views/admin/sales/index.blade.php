@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary pull-right">Back to Products</a>
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
                            <th> Image </th>
                            <th> Title </th>
                            <th> SKU </th>
                            <th> Description </th>
                            <th> MRP </th>
                            <th> Discount </th>
                            <th> Popular </th>
                            <th> Review </th>
                            <th> Sales </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $sale)

                            <tr class="text-center">
                                <td>{{ $sale->id }}</td>
                                {{--                                    <td><img src="{{ asset('storage/'.$sale->image) }}" id="saleImage" class="img-fluid" alt="img"></td>--}}
                                <td>{{$sale->id}}</td>
                                <td>{{ $sale->title }}</td>
{{--                                sku--}}
                                <td>{{ $sale->sku }}</td>
                                <td>{{ $sale->description }}</td>

                                <td>{{ $sale->price }}</td>
                                <td>{{ $sale->discount * 100 }}%</td>

                                <td><a href="{{ route('admin.products.flippopular', $sale->productID) }}">
                                        @if($sale->popular)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endif
                                    </a>
                                </td>
{{--                show productreviews for this sale index table   --}}
                                <td><a href="{{ route('admin.productreviews.index', $sale->productID) }}" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i></a></td>

                                <td><a href="{{ route('admin.sales.delete', $sale->id) }}" class="btn btn-sm btn-primary dtooltip"><i class="fa fa-power-off"></i></a></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.sales.edit', $sale->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.sales.delete', $sale->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
