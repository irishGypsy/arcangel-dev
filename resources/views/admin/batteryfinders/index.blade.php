@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.batteryfinders.create') }}" class="btn btn-primary pull-right">Add Batteryfinder</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th class="text-center"> # </th>
                            <th class="text-center"> Year </th>
                            <th class="text-center"> Make </th>
                            <th class="text-center"> Model </th>
                            <th class="text-center"> Engine </th>
                            <th class="text-center"> Battery Group </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($batteryfinders as $batteryfinder)

                            <tr>
                                <td>{{ $batteryfinder->id }}</td>
                                <td>{{ $batteryfinder->year }}</td>
                                <td>{{ $batteryfinder->make }}</td>
                                <td>{{ $batteryfinder->model }}</td>
                                <td>{{ $batteryfinder->engine_name }}</td>
                                <td>{{ $batteryfinder->group_name }}</td>
                                <td>{{ $batteryfinder->status }}</td>

                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.batteryfinders.edit', $batteryfinder->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.batteryfinders.delete', $batteryfinder->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="tile-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-5"></div>
                    <div class="col-sm-12 col-md-7">
                        {{ $batteryfinders->onEachSide(5)->links() }}

                    </div>

                </div>
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
