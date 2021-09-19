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
                <form action="{{ route('admin.returnproducts.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="user_id">User</label>
                            <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                @foreach($users as $u)
                                    @if($u->id == $returnproduct->user_id)
                                        <option value="{{ $u->id }}" selected>{{ $u->first_name.' '.$u->last_name }}</option>
                                    @else
                                        <option value="{{ $u->id }}">{{ $u->first_name.' '.$u->last_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="hidden" name="product_id" value="{{ $returnproduct->id }}">
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('user_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="order_id">Order</label>
                            <select name="order_id" id="order_id" class="form-control @error('order_id') is-invalid @enderror">
                                @foreach($orders as $o)
                                    @if($o->id == $returnproduct->order_id)
                                        <option value="{{ $o->id }}" selected>{{ $o->order_number }}</option>
                                    @else
                                        <option value="{{ $o->id }}">{{ $o->order_number }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('order_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="product_id">Product</label>
                            <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                                @foreach($products as $p)
                                    @if($p->id == $returnproduct->product_id)
                                        <option value="{{ $p->id }}" selected>{{ $p->name }}</option>
                                    @else
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('product_id') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="reason">Reason <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('reason') is-invalid @enderror" type="text" name="reason" id="reason" value="{{ old('reason', $returnproduct->reason) }}"/>
                            <input type="hidden" name="id" value="{{ $returnproduct->id }}">
                            @error('reason') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="status">Status</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                @switch($returnproduct->status)
                                    @case('Pending')
                                    <option value="0">Choose...</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Pending" selected>Pending</option>
                                    <option value="Denied">Denied</option>
                                    @break

                                    @case('Paid')
                                    <option value="0">Choose...</option>
                                    <option value="Paid" selected>Paid</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Denied">Denied</option>
                                    @break

                                    @default
                                    <option value="0">Choose...</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Denied" selected>Denied</option>
                                @endswitch
                            </select>
                            <div class="invalid-feedback active">
                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('status') <span>{{ $message }}</span> @enderror
                            </div>
                        </div>


                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Return Product</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.returnproducts.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
