@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-briefcase"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.batterygroups.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="material_code">Group Number Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('material_code') is-invalid @enderror" type="text" name="material_code" id="material_code" value="{{ old('material_code') }}"/>
                            @error('material_code') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="material_name"> Group Number Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('material_name') is-invalid @enderror" type="text" name="material_name" id="material_name" value="{{ old('material_name') }}"/>
                            @error('material_name') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Battery Group</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.batterygroups.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
