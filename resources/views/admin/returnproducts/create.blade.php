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
                <form action="{{ route('admin.returnproducts.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option value="0">Choose...</option>
                                @foreach($users as $u)
                                    <option value="{{$u->id}}">{{$u->first_name.' '.$u->last_name }}</option>
                                @endforeach
                            </select>
                            @error('user_id') {{ $message }} @enderror
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('user_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="control-label" for="order_id">Order</label>
                                <select name="order_id" id="order_id" class="form-control @error('order_id') is-invalid @enderror">
                                    <option value="0">Choose...</option>
                                    @foreach($orders as $o)
                                        <option value="{{$o->id}}">{{$o->order_number }}</option>
                                    @endforeach
                                </select>
                                @error('order_id') {{ $message }} @enderror
                                <div class="invalid-feedback active">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> @error('order_id') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="control-label" for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                                <option value="0">Choose...</option>
                                @foreach($products as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id') {{ $message }} @enderror
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="reason">Reason <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('reason') is-invalid @enderror" type="text" name="reason" id="reason" value="{{ old('reason') }}"/>
                            @error('reason') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="0">Choose...</option>
                                <option value="Paid">Paid</option>
                                <option value="Pending">Pending</option>
                                <option value="Denied">Denied</option>
                            </select>
                            @error('status') {{ $message }} @enderror
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('status') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save return product</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.returnproducts.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
