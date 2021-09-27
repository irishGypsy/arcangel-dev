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
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product</button>
                            <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

