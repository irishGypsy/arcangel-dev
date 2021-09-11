@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary pull-right">Add Video</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr class="text-center">
                            <th> # </th>
                            <th> Thumbnail </th>
                            <th> Title </th>
                            <th class="text-center"> Description </th>
                            <th class="text-center"> Creator </th>
                            <th class="text-center"> Site </th>
                            <th class="text-center"> Pinned </th>
                            <th class="text-center"> Status </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)

                                <tr class="text-center">
                                    <td>{{ $video->id }}</td>
                                    <td><img src="{{ asset('storage/'.$video->thumbnail) }}" id="thumbnail" class="img-fluid" alt="img" width="200px"></td>
                                    <td>{{ $video->title }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>{{ $video->creator }}</td>
                                    <td>{{ $video->host_site }}</td>
                                    <td>{{ $video->pinned }}</td>
                                    <td>{{ $video->status }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.videos.delete', $video->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/datatables/datatables.min.css') }}"/>

    <script type="text/javascript" src="{{ asset('frontend/datatables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#sampleTable').DataTable();
        });
    </script>
@endpush
