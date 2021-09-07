@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
{{--        <a href="{{ route('admin.referrals.create') }}" class="btn btn-primary pull-right">Add Banner</a>--}}
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th class="text-center"> Referral # </th>
                            <th class="text-center"> Order # </th>
                            <th class="text-center"> Affiliate</th>
                            <th class="text-center"> Amount </th>
                            <th class="text-center"> Commission </th>
                            <th class="text-center"> Date </th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Payment Status </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($referrals as $referral)

                                <tr>
                                    <td style="text-align: center">{{ $referral->id }}</td>
                                    <td style="text-align: center">{{ $referral->id }}</td>
                                    <td style="text-align: center">{{ $referral->affiliate_name }}</td>
                                    <td style="text-align: right">{{ '$'.number_format($referral->total,2,'.',',')}}</td>
                                    <td style="text-align: right">{{ '$'.number_format($referral->commission,2,'.',',') }}</td>
                                    <td style="text-align: center">{{ $referral->created_at->format('M d, Y') }}</td>
                                    <td style="text-align: center">{{ $referral->status }}</td>
                                    <td style="text-align: center">{{ $referral->paid }}</td>
{{--                                    <td class="text-center">--}}
{{--                                        <div class="btn-group" role="group" aria-label="Second group">--}}
{{--                                            <a href="{{ route('admin.referrals.edit', $referral->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>--}}
{{--                                            <a href="{{ route('admin.referrals.delete', $referral->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
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
