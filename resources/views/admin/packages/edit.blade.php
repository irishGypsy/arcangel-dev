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
                <form action="{{ route('admin.packages.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name"> Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $packages->name) }}"/>
                            <input type="hidden" name="id" value="{{ $packages->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="description"> Description <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ old('description', $packages->description) }}"/>
                            @error('description') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="price_adjustment"> Price Adjustment </label>
                            <input class="form-control @error('price_adjustment') is-invalid @enderror" type="text" name="price_adjustment" id="price_adjustment" value="{{ old('price_adjustment', $packages->price_adjustment) }}"/>
                            @error('price_adjustment') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="status"> Price Adjustment <span class="m-l-5 text-danger"> *</span></label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                @if($packages->status == "Active")
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                @else
                                    <option value="Active">Active</option>
                                    <option value="Inactive" selected>Inactive</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Package</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.packages.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{--@push('scripts')--}}

{{--@endpush--}}
