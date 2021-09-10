@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
{{--@section('styles')--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>--}}
{{--@endsection--}}
=@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">

        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                    <form action="{{ route('admin.products.store') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                        <div class="tile-body">
    {{--                    1st row - capacity, battery group, source--}}
                            <div class="row">
    {{--                        capacity    --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="capacity_id">Capacity</label>
                                        <select name="capacity_id" id="capacity_id" class="form-control @error('capacity_id') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($capacities as $c)
                                                <option value="{{$c->id}}">{{$c->capacity_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('capacity_id') {{ $message }} @enderror
                                        <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('capacity_id') <span>{{ $message }}</span> @enderror
                                    </div>
                                    </div>
                                </div>
    {{--                            battery group--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="batterygroup_id">Battery Group</label>
                                        <select name="batterygroup_id" id="batterygroup_id" class="form-control @error('batterygroup_id') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($batterygroups as $b)
                                                <option value="{{$b->id}}">{{$b->material_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('batterygroup_id') {{ $message }} @enderror
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('batterygroup_id') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
    {{--                            source--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="countrycode_id">Source</label>
                                        <select name="countrycode_id" id="countrycode_id" class="form-control @error('countrycode_id') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($countrycodes as $d)
                                                <option value="{{$d->id}}">{{$d->country}}</option>
                                            @endforeach
                                        </select>
                                        @error('countrycode_id') {{ $message }} @enderror
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('countrycode_id') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
    {{--                        close 1st row--}}
                            </div>
    {{--                    2nd row - name--}}
                                <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter product name" id="name" name="name" value="{{ old('name') }}"/>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                        </div>
                                </div>
    {{--                    3rd row - Warranty, init qty, min qty--}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="warranty">Warranty</label>
                                        <input class="form-control @error('warranty') is-invalid @enderror" type="text" placeholder="Enter warranty" id="warranty" name="warranty" value="{{ old('warranty') }}"/>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('warranty') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="init_quantity">Initial Quantity</label>
                                        <input class="form-control @error('init_quantity') is-invalid @enderror" type="text" placeholder="Enter initial quantity" id="init_quantity" name="init_quantity" value="{{ old('init_quantity') }}"/>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('init_quantity') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="min_quantity">Minimum Product Quantity</label>
                                        <input class="form-control @error('min_quantity') is-invalid @enderror" type="text" placeholder="Enter min product qty" id="min_quantity" name="min_quantity" value="{{ old('min_quantity') }}"/>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('min_quantity') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
    {{--                    close 3rd row--}}
                            </div>
    {{--                    4th row -mrp and shipping stuff--}}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="mrp">Single MRP (incl. VAT)</label>
                                        <input class="form-control @error('mrp') is-invalid @enderror" type="text" placeholder="Enter warranty" id="mrp" name="mrp" value="{{ old('mrp') }}"/>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('mrp') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="shipping">Shipping Charge</label>
                                        <input class="form-control @error('shipping') is-invalid @enderror" type="text" placeholder="Enter initial quantity" id="shipping" name="shipping" value="{{ old('shipping') }}"/>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('shipping') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="ship_type">Ship Type</label>
                                        <select name="ship_type" id="ship_type" class="form-control @error('ship_type') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            <option value="Small Parcel">Small Parcel</option>
                                            <option value="Large Parcel">Large Parcel</option>
                                        </select>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('ship_type') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="sales_applicable">Sales Applicable</label>
                                        <select name="sales_applicable" id="sales_applicable" class="form-control @error('sales_applicable') is-invalid @enderror">
                                            <option value="">Choose...</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        <div class="invalid-feedback active">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('sales_applicable') <span>{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
    {{--                    close 3rd row--}}
                            </div>
    {{--                    4th row - tech specs--}}
                            <div class="form-group">
                                <label class="control-label" for="technical_specifications">Technical Specifications <span class="m-l-5 text-danger"> *</span></label>
                                <textarea name="technical_specifications" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
                            </div>
                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Post</button>
                                            <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

