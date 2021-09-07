@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.inventories.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="integrations">Integrations <span class="m-l-5 text-danger"> *</span></label>
                            <select name="integrations" id="integrations" class="form-control @error('integrations') is-invalid @enderror" >
                                <option value="0">Choose one...</option>
                                <option value="Ebay">Ebay</option>
                                <option value="Amazon">Amazon</option>
                                <option value="Both">Both</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="productID">Product <span class="m-l-5 text-danger"> *</span></label>
                            <select name="productID" id="productID" class="form-control @error('productID') is-invalid @enderror" >
                                <option value="0">Choose one...</option>
                                @foreach($products as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="description">Description</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="available_qty"> Available Quantity <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('available_qty') is-invalid @enderror" type="text" name="available_qty" id="available_qty" value="{{ old('available_qty') }}"/>
                            @error('available_qty') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="amazon_qty"> Amazon Quantity <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('amazon_qty') is-invalid @enderror" type="text" name="amazon_qty" id="amazon_qty" value="{{ old('amazon_qty') }}"/>
                            @error('amazon_qty') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="ebay_qty"> Ebay Quantity <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('ebay_qty') is-invalid @enderror" type="text" name="ebay_qty" id="ebay_qty" value="{{ old('ebay_qty') }}"/>
                            @error('ebay_qty') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="amazon_listing_id"> Amazon Listing ID<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('amazon_listing_id') is-invalid @enderror" type="text" name="amazon_listing_id" id="amazon_listing_id" value="{{ old('amazon_listing_id') }}"/>
                            @error('amazon_listing_id') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="ebay_listing_id"> Ebay Listing ID <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('ebay_listing_id') is-invalid @enderror" type="text" name="ebay_listing_id" id="ebay_listing_id" value="{{ old('ebay_listing_id') }}"/>
                            @error('ebay_listing_id') {{ $message }} @enderror
                        </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save inventory</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.inventories.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
