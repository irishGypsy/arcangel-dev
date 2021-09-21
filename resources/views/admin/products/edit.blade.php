@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Images</a></li>
                    <li class="nav-item"><a class="nav-link" href="#shipinfo" data-toggle="tab">Shipping Info</a></li>
                    <li class="nav-item"><a class="nav-link" href="#inventory" data-toggle="tab">Inventory</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.products.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <h3 class="tile-title">Product Information</h3>
                            <hr>
                            <div class="tile-body">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="capacity_id">Capacity</label>
                                            <select name="capacity_id" id="capacity_id" class="form-control @error('capacity_id') is-invalid @enderror">
                                                @foreach($capacities as $c)
                                                    @if($c->id == $product->capacity_id)
                                                        <option value="{{ $c->id }}" selected>{{ $c->capacity_name }}</option>
                                                    @else
                                                        <option value="{{ $c->id }}">{{ $c->capacity_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('capacity_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="batterygroup_id">Battery Group</label>
                                            <select name="batterygroup_id" id="batterygroup_id" class="form-control @error('batterygroup_id') is-invalid @enderror">
                                                @foreach($batterygroups as $b)
                                                    @if($b->id == $product->batterygroup_id)
                                                        <option value="{{ $b->id }}" selected>{{ $b->battery_group_name }}</option>
                                                    @else
                                                        <option value="{{ $b->id }}">{{ $b->battery_group_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('batterygroup_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="countrycode_id">Source</label>
                                            <select name="countrycode_id" id="countrycode_id" class="form-control @error('countrycode_id') is-invalid @enderror">
                                                @foreach($countrycodes as $s)
                                                    @if($s->id == $product->countrycode_id)
                                                        <option value="{{ $s->id }}" selected>{{ $s->country }}</option>
                                                    @else
                                                        <option value="{{ $s->id }}">{{ $s->country }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('countrycode_id') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter product name" id="name" name="name" value="{{ old('name', $product->name) }}"/>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="warranty">Warranty</label>
                                            <input class="form-control @error('warranty') is-invalid @enderror" type="text" placeholder="Enter product warranty" id="warranty" name="warranty" value="{{ old('warranty', $product->warranty) }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('warranty') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="init_quantity">Initial Quantity</label>
                                            <input class="form-control @error('init_quantity') is-invalid @enderror" type="text" placeholder="Enter product init_quantity" id="init_quantity" name="init_quantity" value="{{ old('init_quantity', $product->init_quantity) }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('init_quantity') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label" for="min_quantity">Minimum Product Quantity</label>
                                            <input class="form-control @error('min_quantity') is-invalid @enderror" type="text" placeholder="Enter product min_quantity" id="min_quantity" name="min_quantity" value="{{ old('min_quantity', $product->min_quantity) }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('min_quantity') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="mrp">Single MRP (incl. VAT) </label>
                                            <input class="form-control @error('mrp') is-invalid @enderror" type="text" placeholder="Enter warranty" id="mrp" name="mrp" value="{{ $product->mrp }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('mrp') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="shipping">Shipping Charge</label>
                                            <input class="form-control @error('shipping') is-invalid @enderror" type="text" placeholder="Enter shipping charge" id="shipping" name="shipping" value="{{ old('shipping') }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('shipping') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" for="ship_type">Shipping Type</label>
                                            <select name="ship_type" id="ship_type" class="form-control @error('ship_type') is-invalid @enderror">
                                                <option value="0">Choose One...</option>
                                                <option value="Small Parcel" {{ $product->sales_applicable == "Small Parcel" ? "selected" : "" }}>Small Parcel</option>
                                                <option value="Large Parcel" {{ $product->sales_applicable =="Large Parcel" ? "selected" : "" }}>Large Parcel</option>
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
                                                <option value="Null">Choose one...</option>
                                                <option value="1" {{ $product->sales_applicable == 1 ? "selected" : "" }}>Yes</option>
                                                <option value="0" {{ $product->sales_applicable == 0 ? "selected" : "" }}>No</option>
                                            </select>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('sales_applicable') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="technical_specifications">Technical Specifications <span class="m-l-5 text-danger"> *</span></label>
                                    <textarea name="technical_specifications" rows="5" cols="40" class="form-control tinymce-editor">{{ $product->technical_specifications }}</textarea>
                                </div>

                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product</button>
                                        <a class="btn btn-danger" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div></div>
                        </form>
                    </div>
                </div>

                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Upload Image</h3>
                        <hr>
                        <div class="tile-body">
{{--                            <div class="row">--}}
                                <div class="row">
                                    <div class="col-md-12">
{{----}}
                                        <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">

{{--                                        <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">--}}
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            {{ csrf_field() }}
{{--                                        </form>--}}
                                        </form>
                                    </div>
                                </div>
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="button" id="uploadButton">
                                            <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                                        </button>
                                    </div>
                                </div>

                            @if ($product->images)
                                <hr>
                                <div class="row">
                                    @foreach($product->images as $image)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset('storage/'.$image->image) }}" id="brandLogo" class="img-fluid" alt="img">
                                                    <a class="card-link float-right text-danger" href="{{ route('admin.products.images.delete', $image->id) }}">
                                                        <i class="fa fa-fw fa-lg fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="shipinfo">
                        <div class="tile">
                            <form action="{{ route('admin.productshippinginfos.update') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                    <h3 class="tile-title">Product Information</h3>
                                    <hr>
                                    <div class="tile-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="length">Length</label>
                                                <input class="form-control @error('length') is-invalid @enderror" type="text" name="length" id="length" value="{{ old('length', $product->shippinginfo->length) }}"/>
                                                <input type="hidden" name="id" value="{{ $product->shippinginfo->id }}">
                                                @error('length') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="width">Width</label>
                                                <input class="form-control @error('width') is-invalid @enderror" type="text" name="width" id="width" value="{{ old('width', $product->shippinginfo->width) }}"/>
                                                @error('width') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="height">Height</label>
                                                <input class="form-control @error('height') is-invalid @enderror" type="text" name="height" id="height" value="{{ old('height', $product->shippinginfo->height) }}"/>
                                                @error('height') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label" for="weight">Weight</label>
                                                <input class="form-control @error('weight') is-invalid @enderror" type="text" name="weight" id="weight" value="{{ old('weight', $product->shippinginfo->weight) }}"/>
                                                @error('weight') {{ $message }} @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="delivery_time">Delivery Time</label>
                                                <input class="form-control @error('delivery_time') is-invalid @enderror" type="text" name="delivery_time" id="delivery_time" value="{{ old('delivery_time', $product->shippinginfo->delivery_time) }}"/>
                                                @error('delivery_time') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="replacement_time">Replacement Time</label>
                                                <input class="form-control @error('replacement_time') is-invalid @enderror" type="text" name="replacement_time" id="replacement_time" value="{{ old('replacement_time', $product->shippinginfo->replacement_time) }}"/>
                                                @error('replacement_time') {{ $message }} @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="is_fragile">Fragile?</label>
                                                <select name="is_fragile" id="is_fragile" class="form-control @error('is_fragile') is-invalid @enderror">
                                                    <option value="Null">Choose one...</option>
                                                    <option value="1" {{ $product->shippinginfo->is_fragile ? "selected" : "" }}>Yes</option>
                                                    <option value="0"{{ !$product->shippinginfo->is_fragile ? "selected" : "" }}>No</option>
                                                </select>
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('is_fragile') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="power_plug">Power Plug</label>
                                                <input class="form-control @error('power_plug') is-invalid @enderror" type="text" name="power_plug" id="power_plug" value="{{ old('power_plug', $product->shippinginfo->power_plug) }}"/>
                                                @error('power_plug') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="has_plug">Plug?</label>
                                                <select name="has_plug" id="has_plug" class="form-control @error('has_plug') is-invalid @enderror">
                                                    <option value="Null">Choose one...</option>
                                                    <option value="1" {{ $product->shippinginfo->has_plug ? "selected" : "" }}>Yes</option>
                                                    <option value="0" {{ !$product->shippinginfo->has_plug ? "selected" : ""}}>No</option>
                                                </select>
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('has_plug') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="has_batteries">Batteries?</label>
                                                <select name="has_batteries" id="has_batteries" class="form-control @error('has_batteries') is-invalid @enderror">
                                                    <option value="Null">Choose one...</option>
                                                    <option value="1" {{ $product->shippinginfo->has_batteries ? "selected" : "" }}>Yes</option>
                                                    <option value="0" {{ !$product->shippinginfo->has_batteries ? "selected" : "" }}>No</option>
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
                                                    <option value="Null">Choose one...</option>
                                                    <option value="1" {{ $product->shippinginfo->has_batteries_power ? "selected" : "" }}>Yes</option>
                                                    <option value="0" {{ !$product->shippinginfo->has_batteries_power ? "selected" : "" }}>No</option>
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
                                                    <option value="Null">Choose one...</option>
                                                    <option value="1" {{ $product->shippinginfo->product_instructions ? "selected" : "" }}>Yes</option>
                                                    <option value="0" {{ !$product->shippinginfo->product_instructions ? "selected" : "" }}>No</option>
                                                </select>
                                                <div class="invalid-feedback active">
                                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_instructions') <span>{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="shipping_uk">Shipping UK</label>
                                                <input class="form-control @error('shipping_uk') is-invalid @enderror" type="text" name="shipping_uk" id="shipping_uk" value="{{ old('shipping_uk', $product->shippinginfo->shipping_uk) }}"/>
                                                <input type="hidden" name="id" value="{{ $product->shippinginfo->id }}">
                                                @error('shipping_uk') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="shipping_europe">Shipping Europe</label>
                                                <input class="form-control @error('shipping_europe') is-invalid @enderror" type="text" name="shipping_europe" id="shipping_europe" value="{{ old('shipping_europe', $product->shippinginfo->shipping_europe) }}"/>
                                                @error('shipping_europe') {{ $message }} @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label" for="shipping_global">Shipping Global</label>
                                                <input class="form-control @error('shipping_global') is-invalid @enderror" type="text" name="shipping_global" id="shipping_global" value="{{ old('shipping_global', $product->shippinginfo->shipping_global) }}"/>
                                                @error('shipping_global') {{ $message }} @enderror
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="tile-footer">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product Shipping Info</button>
                                    &nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back to Products</a>
                                </div>
                            </form>
                        </div>
                </div>

                <div class="tab-pane" id="inventory">
                    <div class="tile">
                        <h3 class="tile-title">{{ $subTitle }}</h3>
                        <form action="{{ route('admin.inventories.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="tile-body">
                                {{--            title  --}}
                                <div class="form-group">
                                    <label class="control-label" for="name"> Name: </label><br>
                                    <h3><label class="control-label">{{ $product->name }}</label></h3>
                                    <input type="hidden" name="id" value="{{ $product->inventory->id }}">
                                </div>
                                {{--            available qty  --}}
                                <div class="form-group">
                                    <label class="control-label" for="available_qty"> Available Qty <span class="m-l-5 text-danger"> *</span></label>
                                    <input class="form-control @error('available_qty') is-invalid @enderror" type="text" name="available_qty" id="available_qty" value="{{ old('available_qty', $product->inventory->available_qty) }}"/>
                                    @error('available_qty') {{ $message }} @enderror
                                </div>
                                {{--            integrations  --}}
                                <div class="form-group">
                                    <label class="control-label" for="integrations"> Integrations </label>
                                    <select name="integrations" id="integrations" class="form-control @error('integrations') is-invalid @enderror">
                                        <option value="0">Choose one...</option>
                                        <option value="Amazon" {{ $product->inventory->integrations == "Amazon" ? "selected" : "" }}>Amazon</option>
                                        <option value="Ebay" {{ $product->inventory->integrations == "Ebay" ? "selected" : "" }}>Ebay</option>
                                        <option value="Both"  {{ $product->inventory->integrations == "Both" ? "selected" : "" }}>Both</option>
                                    </select>
                                </div>
                                {{--            amazon qty & listing id  --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="amazon_qty"> Amazon Qty <span class="m-l-5 text-danger"> *</span></label>
                                            <input class="form-control @error('amazon_qty') is-invalid @enderror" type="text" name="amazon_qty" id="amazon_qty" value="{{ old('amazon_qty', $product->inventory->amazon_qty) }}"/>
                                            @error('amazon_qty') {{ $message }} @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="amazon_listing_id"> Amazon Listing ID <span class="m-l-5 text-danger"> *</span></label>
                                            <input class="form-control @error('amazon_listing_id') is-invalid @enderror" type="text" name="amazon_listing_id" id="amazon_listing_id" value="{{ old('amazon_listing_id', $product->inventory->amazon_listing_id) }}"/>
                                            @error('amazon_listing_id') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>

                                {{--            ebay qty & listing id   --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="ebay_qty"> Ebay Qty <span class="m-l-5 text-danger"> *</span></label>
                                            <input class="form-control @error('ebay_qty') is-invalid @enderror" type="text" name="ebay_qty" id="ebay_qty" value="{{ old('ebay_qty', $product->inventory->ebay_qty) }}"/>
                                            @error('ebay_qty') {{ $message }} @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="ebay_listing_id">Ebay Listing ID <span class="m-l-5 text-danger"> *</span></label>
                                            <input class="form-control @error('ebay_listing_id') is-invalid @enderror" type="text" name="ebay_listing_id" id="ebay_listing_id" value="{{ old('ebay_listing_id', $product->inventory->ebay_listing_id) }}"/>
                                            @error('ebay_listing_id') {{ $message }} @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Inventory</button>
                                            &nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
{{--    </div>--}}
@endsection
@push('scripts')
{{--    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/bootstrap-notify.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
        <script type="text/javascript">
            $('#ship_type').val("{{$product->ship_type}}");
            $('#sales_applicable').val("{{$product->sales_applicable}}");

            tinymce.init({
                selector: 'textarea.tinymce-editor',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help image imagetools wordcount'
                ],
                toolbar1: 'undo redo | formatselect | fontselect | fontsizeselect bold italic backcolor',
                toolbar2:    ' | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | imagetools | help' ,
                menu: {
                    file: {title: 'File', items: 'newdocument restoredraft | preview | print '},
                    edit: {title: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace'},
                    view: {
                        title: 'View',
                        items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen'
                    },
                    insert: {
                        title: 'Insert',
                        items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime'
                    },
                    format: {
                        title: 'Format',
                        items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat'
                    },
                    tools: {title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount'},
                    table: {title: 'Table', items: 'inserttable | cell row column | tableprops deletetable'},
                    help: {title: 'Help', items: 'help'}
                },
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        </script>

    <script>
        Dropzone.autoDiscover = false;
        $( document ).ready(function() {
            // $('#categories').select2();
            let myDropzone = new Dropzone("#dropzone", {
                paramName: "image",
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 2,
                uploadMultiple: false,
                url: "{{ route('admin.products.images.upload') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                window.location.reload();
                showNotification('Completed', 'All product images uploaded', 'success', 'fa-check');
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
            });
            function showNotification(title, message, type, icon)
            {
                $.notify({
                    title: title + ' : ',
                    message: message,
                    icon: 'fa ' + icon
                },{
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                });
            }
        });
    </script>
@endpush
