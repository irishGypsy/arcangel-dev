@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
        <a href="{{ route('admin.inventories.index') }}" class="btn btn-primary pull-right">Back</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.inventories.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
{{--            title  --}}
                        <div class="form-group">
                            <label class="control-label" for="name"> Name: </label><br>
                            <h3><label class="control-label">{{ $inventories[0]->name }}</label></h3>
                            <input type="hidden" name="id" value="{{ $inventories[0]->id }}">
                        </div>
{{--            available qty  --}}
                        <div class="form-group">
                            <label class="control-label" for="available_qty"> Available Qty <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('available_qty') is-invalid @enderror" type="text" name="available_qty" id="available_qty" value="{{ old('available_qty', $inventories[0]->available_qty) }}"/>
                            @error('available_qty') {{ $message }} @enderror
                        </div>
{{--            integrations  --}}
                        <div class="form-group">
                            <label class="control-label" for="integrations"> Integrations </label>
                            <select name="integrations" id="integrations" class="form-control @error('integrations') is-invalid @enderror">
                                <option value="0">Choose one...</option>
                                <option value="Amazon">Amazon</option>
                                <option value="Ebay">Ebay</option>
                                <option value="Both">Both</option>
                            </select>
                        </div>
{{--            amazon qty & listing id  --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label" for="amazon_qty"> Amazon Qty <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('amazon_qty') is-invalid @enderror" type="text" name="amazon_qty" id="amazon_qty" value="{{ old('amazon_qty', $inventories[0]->amazon_qty) }}"/>
                                @error('amazon_qty') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label" for="amazon_listing_id"> Amazon Listing ID <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('amazon_listing_id') is-invalid @enderror" type="text" name="amazon_listing_id" id="amazon_listing_id" value="{{ old('amazon_listing_id', $inventories[0]->amazon_listing_id) }}"/>
                                @error('amazon_listing_id') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

{{--            ebay qty & listing id   --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label" for="ebay_qty"> Ebay Qty <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('ebay_qty') is-invalid @enderror" type="text" name="ebay_qty" id="ebay_qty" value="{{ old('ebay_qty', $inventories[0]->ebay_qty) }}"/>
                                @error('ebay_qty') {{ $message }} @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="ebay_listing_id">Ebay Listing ID <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control @error('ebay_listing_id') is-invalid @enderror" type="text" name="ebay_listing_id" id="ebay_listing_id" value="{{ old('ebay_listing_id', $inventories[0]->ebay_listing_id) }}"/>
                                @error('ebay_listing_id') {{ $message }} @enderror
                            </div>
                        </div>
                        </div>



                    <div class="tile-footer">
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Inventory</button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="{{ route('admin.inventories.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </div>
                    </div>
                        </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
            $('#integrations').val("{{$inventories[0]->integrations}}");

    </script>
@endpush
