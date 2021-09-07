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
                <form action="{{ route('admin.affiliates.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="username">Username <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username', $affiliates->username) }}"/>
                            <input type="hidden" name="id" value="{{ $affiliates->id }}">
                            @error('username') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">email <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email', $affiliates->email) }}"/>
                            <input type="hidden" name="id" value="{{ $affiliates->id }}">
                            @error('email') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="fname">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('fname') is-invalid @enderror" type="text" name="fname" id="fname" value="{{ old('fname', $affiliates->fname) }}"/>
                            <input type="hidden" name="id" value="{{ $affiliates->id }}">
                            @error('fname') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="lname">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('lname') is-invalid @enderror" type="text" name="lname" id="lname" value="{{ old('lname', $affiliates->lname) }}"/>
                            <input type="hidden" name="id" value="{{ $affiliates->id }}">
                            @error('lname') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Password <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password" id="password" value=""/>
                            <input type="hidden" name="id" value="{{ $affiliates->id }}">
                            @error('password') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="countrycode_id">Country<span class="m-l-5 text-danger"> *</span></label>
                            <select name="countrycode_id" id="countrycode_id" class="form-control @error('countrycode_id') is-invalid @enderror">
                                <option value="0">Choose...</option>
                                @foreach($countrycodes as $code)
                                    @if($affiliates->countrycode_id == $code->id)
                                        <option value="{{ $code->id }}" selected>{{ $code->country }}</option>
                                    @else
                                        <option value="{{ $code->id }}">{{ $code->country }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('countrycode_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="status">Status <span class="m-l-5 text-danger"> *</span></label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                @if($affiliates->status == 'Pending')
                                    <option value="Pending" selected>Pending</option>
                                @else
                                    <option value="Pending">Pending</option>
                                @endif
                                @if($affiliates->status == 'Active')
                                    <option value="Active" selected>Active</option>
                                @else
                                    <option value="Active">Active</option>
                                @endif
                                @if($affiliates->status == 'Inactive')
                                    <option value="Inactive" selected>Inactive</option>
                                @else
                                <option value="Inactive">Inactive</option>
                                @endif

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="commission">Commission Type <span class="m-l-5 text-danger"> *</span></label>
                            <select name="commission" id="commission" class="form-control @error('commission') is-invalid @enderror" type="text">
                                @if($affiliates->commission == 'Product Base')
                                    <option value="Product Base" selected>Product Base</option>
                                @else
                                    <option value="Product Base">Product Base</option>
                                @endif
                                @if($affiliates->commission == 'Total Sales')
                                    <option value="Total Sales" selected>Total Sales</option>
                                @else
                                    <option value="Total Sales">Total Sales</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="comm_in_per">Set Commissions in % <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('comm_in_per') is-invalid @enderror" type="text" name="comm_in_per" id="comm_in_per" value="{{ old('comm_in_per', $affiliates->comm_in_per) }}"/>
                            <input type="hidden" name="id" value="{{ $affiliates->id }}">
                            @error('comm_in_per') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="bank_details">Bank Details <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('bank_details') is-invalid @enderror" type="text" name="bank_details" id="bank_details" value="{{ old('bank_details', $affiliates->bank_details) }}"/>
                            <input type="hidden" name="id" value="{{ $affiliates->id }}">
                            @error('bank_details') {{ $message }} @enderror
                        </div>

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Affiliate</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.affiliates.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
