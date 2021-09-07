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
                <form action="{{ route('admin.coupons.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="code">Coupon Code <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('code') is-invalid @enderror" type="text" name="code" id="code" value="{{ old('code') }}"/>
                            @error('code') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="discount">Discount <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('discount') is-invalid @enderror" type="text" name="discount" id="discount" value="{{ old('discount') }}"/>
                            @error('discount') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="start_date">Start Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('start_date') is-invalid @enderror" type="date" min="2020-01-01" name="start_date" id="start_date" value="{{ old('start_date') }}"/>
                            @error('start_date') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="end_date">End Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('end_date') is-invalid @enderror" type="date" min="2020-01-01" name="end_date" id="end_date" value="{{ old('end_date') }}"/>
                            @error('end_date') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="userId">User </label>
                            <input class="form-control @error('userId') is-invalid @enderror" type="text" name="userId" id="userId" value="{{ old('userId') }}"/>
                            @error('userId') {{ $message }} @enderror
                        </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save coupon</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.coupons.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
