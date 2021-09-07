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
                <form action="{{ route('admin.capacities.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group">
                            <label class="control-label" for="capacity_name">Capacity Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('capacity_name') is-invalid @enderror" type="text" name="capacity_name" id="capacity_name" value="{{ old('capacity_name') }}"/>
                            @error('capacity_name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="capacity_code">Capacity Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('capacity_code') is-invalid @enderror" type="text" name="capacity_code" id="capacity_code" value="{{ old('capacity_code') }}"/>
                            @error('capacity_code') {{ $message }} @enderror
                        </div>

                        {{--                        <div class="form-group">--}}
{{--                            <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">--}}
{{--                            <option value="inactive">Inactive</option>--}}
{{--                            <option value="active">Active</option>--}}
{{--                        </select>--}}
{{--                        </div>--}}

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Capacity</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.capacities.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
