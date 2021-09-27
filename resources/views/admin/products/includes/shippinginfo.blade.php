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
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Product Shipping Info</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.products.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back to Products</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

