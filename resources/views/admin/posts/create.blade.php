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
                <form action="{{ route('admin.posts.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Menu Placement</label>
                            <select name="menu_placement" id="menu_placement" class="form-control @error('menu_placement') is-invalid @enderror">
                                <option value="header">Header</option>
                                <option value="footer">Footer</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Excerpt</label>
                            <input class="form-control @error('excerpt') is-invalid @enderror" type="text" id="excerpt" name="excerpt"/>
                            @error('excerpt') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="body">Body</label>
                            <textarea class="form-control" rows="4" name="body" id="body">{{ old('body') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="keywords">Keywords</label>
                            <textarea class="form-control" rows="6" name="keywords" id="keywords">{{ old('keywords') }}</textarea>
                        </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Post</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
