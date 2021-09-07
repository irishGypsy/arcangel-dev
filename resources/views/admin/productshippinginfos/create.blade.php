@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
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
                        <form action="{{ route('admin.productshippinginfos.store') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
{{--                    1st row - product id, name--}}
                                <div class="form-group">
                                    <label class="control-label" for="product_id">Product <span class="m-l-5 text-danger"> *</span></label>
                                    <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror" >
                                        <option value="0">Choose one...</option>
                                        @foreach($products as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

{{--                    2nd row - length,width,height,weight--}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="length">Length</label>
                                            <input class="form-control @error('length') is-invalid @enderror" type="text" placeholder="Enter length" id="length" name="length" value="{{ old('length') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('length') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="width">Width</label>
                                            <input class="form-control @error('width') is-invalid @enderror" type="text" placeholder="Enter initial quantity" id="width" name="width" value="{{ old('width') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('width') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="height">Height</label>
                                            <input class="form-control @error('height') is-invalid @enderror" type="text" placeholder="Enter min product qty" id="height" name="height" value="{{ old('height') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('height') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="weight">Weight</label>
                                            <input class="form-control @error('weight') is-invalid @enderror" type="text" placeholder="Enter min product qty" id="weight" name="weight" value="{{ old('weight') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('weight') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                    3rd row - delivery time, return time--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="delivery_time">Delivery Time</label>
                                            <input class="form-control @error('delivery_time') is-invalid @enderror" type="text" placeholder="Enter min product qty" id="delivery_time" name="delivery_time" value="{{ old('delivery_time') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('delivery_time') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="replacement_time">Replacement Time</label>
                                            <input class="form-control @error('replacement_time') is-invalid @enderror" type="text" placeholder="Enter min product qty" id="replacement_time" name="replacement_time" value="{{ old('replacement_time') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('replacement_time') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                    4th row - fragile, power plug, plug? --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="is_fragile">Fragile?</label>
                                            <select name="is_fragile" id="is_fragile" class="form-control @error('is_fragile') is-invalid @enderror">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('is_fragile') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="power_plug">Power Plug</label>
                                            <input class="form-control @error('power_plug') is-invalid @enderror" type="text" placeholder="Enter min product qty" id="power_plug" name="power_plug" value="{{ old('power_plug') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('power_plug') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="has_plug">Plug?</label>
                                            <select name="has_plug" id="has_plug" class="form-control @error('has_plug') is-invalid @enderror">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('has_plug') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                    5th row - batteries?, battery power?, instructions? --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="has_batteries">Batteries?</label>
                                            <select name="has_batteries" id="has_batteries" class="form-control @error('has_batteries') is-invalid @enderror">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('has_batteries') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="has_batteries_power">Batt Power?</label>
                                            <select name="has_batteries_power" id="has_batteries_power" class="form-control @error('has_batteries_power') is-invalid @enderror">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('has_batteries_power') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="product_instructions">Instructions?</label>
                                            <select name="product_instructions" id="product_instructions" class="form-control @error('product_instructions') is-invalid @enderror">
                                                <option value="">Choose...</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_instructions') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                    6th row - shipping uk, shipping euro, shipping global --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="shipping_uk">Shipping UK</label>
                                            <input class="form-control @error('shipping_uk') is-invalid @enderror" type="text" placeholder="Enter shipping uk" id="shipping_uk" name="shipping_uk" value="{{ old('shipping_uk') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('shipping_uk') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="shipping_europe">Shipping Europe</label>
                                            <input class="form-control @error('shipping_europe') is-invalid @enderror" type="text" placeholder="Enter shipping europe" id="shipping_europe" name="shipping_europe" value="{{ old('shipping_europe') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('shipping_europe') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="shipping_global">Shipping Global</label>
                                            <input class="form-control @error('shipping_global') is-invalid @enderror" type="text" placeholder="Enter shipping global" id="shipping_global" name="shipping_global" value="{{ old('shipping_global') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('shipping_global') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Product Shipping Info</button>
                                            <a class="btn btn-danger" href="{{ route('admin.productshippinginfos.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
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
