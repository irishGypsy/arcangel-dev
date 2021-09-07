@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
{{--        <a href="{{ route('admin.productreviews.create') }}" class="btn btn-primary pull-right">Add Product Review</a>--}}
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
                            <th class="text-center"> User Name </th>
                            <th class="text-center"> Title </th>
                            <th class="text-center"> Description </th>
                            <th class="text-center"> email </th>
                            <th class="text-center"> Rating </th>
                            <th class="text-center"> Status </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productreviews as $productreview)

                            <tr>
                                <td>{{ $productreview->id }}</td>
                                <td>{{ $productreview->first_name.' '.$productreview->last_name }}</td>
                                <td>{{ $productreview->title }}</td>
                                <td>{{ $productreview->description }}</td>
                                <td>{{ $productreview->email }}</td>
                                <td>{{ $productreview->rating }}</td>
                                <td>{{ $productreview->status }}</td>
                                {{--                                    <td>{{ $productreview->url }}</td>--}}
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.productreviews.edit', $productreview->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('admin.productreviews.delete', $productreview->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
