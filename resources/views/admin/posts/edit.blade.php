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
                <form action="{{ route('admin.posts.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $posts->title) }}"/>
                            <input type="hidden" name="id" value="{{ $posts->id }}">
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
                            <label class="control-label" for="excerpt">Excerpt <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('excerpt') is-invalid @enderror" type="text" name="excerpt" id="excerpt" value="{{ old('excerpt', $posts->excerpt) }}"/>
                            @error('excerpt') {{ $message }} @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="body">Body <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('body') is-invalid @enderror" type="text" name="body" id="body" value="{{ old('body', $posts->body) }}"/>
                            @error('body') {{ $message }} @enderror
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="keywords">Keywords </label>
                            <input class="form-control @error('keywords') is-invalid @enderror" type="text" name="keywords" id="keywords" value="{{ old('keywords', $posts->keywords) }}"/>
                            @error('keywords') {{ $message }} @enderror
                        </div>

                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Post</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush
