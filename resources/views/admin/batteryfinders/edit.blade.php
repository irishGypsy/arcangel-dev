@extends('admin.app')
@section('make') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-make">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-make">{{ $subTitle }}</h3>
                <form action="{{ route('admin.batteryfinders.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="year">Year <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('year') is-invalid @enderror" type="text" name="year" id="year" value="{{ old('year', $batteryfinders->year) }}"/>
                            <input type="hidden" name="id" value="{{ $batteryfinders->id }}">
                            @error('year') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="make">Make <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('make') is-invalid @enderror" type="text" name="make" id="make" value="{{ old('make', $batteryfinders->make) }}"/>
                            <input type="hidden" name="id" value="{{ $batteryfinders->id }}">
                            @error('make') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="model">Model <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('model') is-invalid @enderror" type="text" name="model" id="model" value="{{ old('model', $batteryfinders->model) }}"/>
                            <input type="hidden" name="id" value="{{ $batteryfinders->id }}">
                            @error('model') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="engine_name">Engine <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('engine_name') is-invalid @enderror" type="text" name="engine_name" id="engine_name" value="{{ old('engine_name', $batteryfinders->engine_name) }}"/>
                            <input type="hidden" name="id" value="{{ $batteryfinders->id }}">
                            @error('engine_name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="group_name">Battery Group <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('group_name') is-invalid @enderror" type="text" name="group_name" id="group_name" value="{{ old('group_name', $batteryfinders->group_name) }}"/>
                            <input type="hidden" name="id" value="{{ $batteryfinders->id }}">
                            @error('group_name') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="status">Status <span class="m-l-5 text-danger"> *</span></label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="inactive">Inactive</option>
                                <option value="active">Active</option>
                            </select>
                        </div>

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Banner</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.banners.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
