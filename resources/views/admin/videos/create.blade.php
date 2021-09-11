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
                <form action="{{ route('admin.videos.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title"> Title <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}"/>
                            @error('title') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="subtitle"> Subtitle </label>
                            <input class="form-control @error('subtitle') is-invalid @enderror" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}"/>
                            @error('subtitle') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description"> Description </label>
                            <textarea class="form-control tinymce-editor" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Thumbnail <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="thumbnail"/>
                            @error('thumbnail') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="creator"> Creator <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('creator') is-invalid @enderror" type="text" name="creator" id="creator" value="{{ old('creator') }}"/>
                            @error('creator') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="post_date"> Post Date </label>
                            <input class="form-control @error('post_date') is-invalid @enderror" type="text" name="post_date" id="post_date" value="{{ old('post_date') }}"/>
                            @error('post_date') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="host_site"> Host Site <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('host_site') is-invalid @enderror" type="text" name="host_site" id="host_site" value="{{ old('host_site') }}"/>
                            @error('host_site') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="length"> Length <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('length') is-invalid @enderror" type="text" name="length" id="length" value="{{ old('length') }}"/>
                            @error('length') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="url"> Url <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('url') is-invalid @enderror" type="text" name="url" id="url" value="{{ old('url') }}"/>
                            @error('url') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label"> Video File </label>
                            <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file"/>
                            @error('file') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pinned"> Pinned </label>
                            <select name="pinned" id="pinned" class="form-control @error('pinned') is-invalid @enderror">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="status"> Status </label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="Inactive">Inactive</option>
                                <option value="Active">Active</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="embed_code"> Embed Code </label>
                            <textarea class="form-control" rows="4" name="embed_code" id="embed_code">{{ old('embed_code') }}</textarea>
                        </div>

                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save video</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.videos.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
