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
                <form action="{{ route('admin.affiliates.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="username">Username <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') }}"/>
                            @error('username') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="fname">First Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('fname') }}"/>
                            @error('fname') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="lname">Last Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ old('lname') }}"/>
                            @error('lname') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" id="password" value="{{ old('password') }}"/>
                            @error('password') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="countrycode_id">Country <span class="m-l-5 text-danger"> *</span></label>
                            <select name="countrycode_id" id="countrycode_id" class="form-control @error('countrycode_id') is-invalid @enderror">
                                <option value="0">Choose...</option>
                                @foreach($countrycodes as $codes)
                                    <option value="{{$codes->id}}">{{$codes->country}}</option>
                                @endforeach
                            </select>
                            @error('countrycode_id') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="status">Status <span class="m-l-5 text-danger"> *</span></label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="0">Choose...</option>
                                <option value="Pending">Pending</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="commission">Commission Type <span class="m-l-5 text-danger"> *</span></label>
                            <select name="commission" id="commission" class="form-control @error('commission') is-invalid @enderror">
                                <option value="0">Choose...</option>
                                <option value="Product Base">Product Base</option>
                                <option value="Total Sales">Total Sales</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="comm_in_per">Commission in % <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('comm_in_per') is-invalid @enderror" type="text" name="comm_in_per" id="comm_in_per" value="{{ old('comm_in_per') }}"/>
                            @error('comm_in_per') {{ $message }} @enderror
                        </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save affiliate</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.affiliates.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
