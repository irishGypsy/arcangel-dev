@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.capacities.create') }}" class="btn btn-primary pull-right">Add Capacity</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th> Capacity Name </th>
                            <th> Capacity Code </th>
{{--                            <th class="text-center"> Status </th>--}}
{{--                            <th class="text-center"> Description </th>--}}
{{--                            <th class="text-center">URL</th>--}}
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($capacities as $capacity)

                                <tr>
                                    <td>{{ $capacity->id }}</td>
{{--                                    <td><img src="{{ asset('storage/'.$capacity->image) }}" id="capacityImage" class="img-fluid" alt="img"></td>--}}
                                    <td>{{ $capacity->capacity_name }}</td>
                                    <td>{{ $capacity->capacity_code }}</td>
{{--                                    <td>{{ $capacity->description }}</td>--}}
{{--                                    <td>{{ $capacity->url }}</td>--}}
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.capacities.edit', $capacity->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.capacities.delete', $capacity->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
