@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.affiliates.create') }}" class="btn btn-primary pull-right">Add Affiliate</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th class="text-center"> Affiliate ID # </th>
                            <th class="text-center"> Username </th>
                            <th class="text-center"> Name </th>
                            <th class="text-center"> email </th>
                            <th class="text-center"> Referrals </th>
                            <th class="text-center">Paid Amt</th>
                            <th class="text-center">Unpaid Amt</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Since</th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($affiliates as $affiliate)

                                <tr>
                                    <td>{{ $affiliate->id }}</td>
                                    <td>{{ $affiliate->username }}</td>
                                    <td>{{ $affiliate->fullname }}</td>
                                    <td>{{ $affiliate->email }}</td>
                                    <td>{{ $affiliate->id }}</td>
                                    <td>{{ $affiliate->id }}</td>
                                    <td>{{ $affiliate->id }}</td>
                                    <td>{{ $affiliate->status }}</td>
                                    <td>{{ $affiliate->since }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.affiliates.edit', $affiliate->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.affiliates.delete', $affiliate->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
