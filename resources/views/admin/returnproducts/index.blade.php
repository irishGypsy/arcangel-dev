@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.returnproducts.create') }}" class="btn btn-primary pull-right">Add Return Product</a>
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
                            <th> Name </th>
                            <th> Email </th>
                            <th> Contact Number </th>
                            <th> Product Name </th>
                            <th> Reason for Return </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($returnproducts as $returnproduct)

                                <tr class="text-center">
                                    <td>{{ $returnproduct->id }}</td>
                                    <td>{{ $returnproduct->first_name.' '.$returnproduct->last_name }}</td>
                                    <td>{{ $returnproduct->email }}</td>
                                    <td>{{ $returnproduct->phone }}</td>
                                    <td>{{ $returnproduct->product_name }}</td>
                                    <td>{{ $returnproduct->reason }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.returnproducts.edit', $returnproduct->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.returnproducts.delete', $returnproduct->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
