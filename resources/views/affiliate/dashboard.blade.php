@extends('affiliate.app')
{{--@section('title') {{ $pageTitle }} @endsection--}}
@section('content')

    <div class="affiliate-title">
        <div>
            <h2><i class="fa fa-dashboard m-3 mt-0"></i>Affiliate Dashboard</h2>
        </div>
        <div>
            <p>Welcome {{ Auth::guard('affiliate')->user()->fname.' '.Auth::guard('affiliate')->user()->lname}}</p>
        </div>
    </div>
    <div class="d-flex flex-row justify-content-center">
        <div class="card-group">
            <div class="card">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#overview" data-toggle="tab">Overview</a></li>
                        <li class="nav-item"><a class="nav-link" href="#referrals" data-toggle="tab">Referrals</a></li>
                        <li class="nav-item"><a class="nav-link" href="#payments" data-toggle="tab">Payments</a></li>
                        <li class="nav-item"><a class="nav-link" href="#affiliatelinks" data-toggle="tab">Affiliate Links</a></li>
                        <li class="nav-item"><a class="nav-link" href="#myprofile" data-toggle="tab">My Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bankdetails" data-toggle="tab">Bank Details</a></li>
                        <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">Change Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('affiliate.logout') }}" >Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">

            <div class="tab-pane active" id="overview">
                <div class="d-flex flex-column">
                    <div class="card ml-2" style="width:800px;">
                            <h5 class="card-title affiliate-overview-title">Overview</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="widget-small primary mx-3 my-2">
        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>{{ $totalrefferals ?? 0 }}</b></p>
                                <h4 class="p-2">Total Referrals</h4>
                            </div>
                        </div>
                        <div class="widget-small primary mx-3 my-2">
        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>{{ $paidreferrals ?? 0 }}</b></p>
                                <h4 class="p-2">Paid Referrals</h4>
                            </div>
                        </div>
                        <div class="widget-small primary mx-3 my-2">
        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>{{ $unpaidreferrals ?? 0 }}</b></p>
                                <h4 class="p-2">Unpaid Referrals</h4>
                            </div>
                        </div>
                        <div class="widget-small primary mx-3 my-2">
        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>{{ $totaltransactions ?? 0 }}</b></p>
                                <h4 class="p-2">Total Transactions</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="widget-small primary mx-3 my-2">
        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>${{$referraltotal ?? 0.00}} USD</b></p>
                                <h4 class="p-2">Your earnings to date (total transactions)</h4>
                            </div>
                        </div>
                        <div class="widget-small primary mx-3 my-2">
        {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>${{$referralbalance ?? 0.00}} USD</b></p>
                                <h4 class="p-2">Your current balance</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane" id="referrals">
                <div class="d-flex flex-column justify-content-start" style="">
                    <div class="card ml-2" style="width:800px;">
                        <h5 class="card-title affiliate-overview-title">Referrals</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="widget-small primary mx-3 my-2">
                            {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>${{$referraltotal ?? 0.00}} USD</b></p>
                                <h4 class="p-2">Your earnings to date (total transactions)</h4>
                            </div>
                        </div>
                        <div class="widget-small primary mx-3 my-2">
                            {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>${{$referralbalance ?? 0.00}} USD</b></p>
                                <h4 class="p-2">Your current balance</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="tile">
                                    <div class="tile-body">
                                        <table class="table table-hover table-bordered" id="sampleTable">
                                            <thead>
                                            <tr class="text-center">
                                                <th class="text-center"> # </th>
                                                <th class="text-center"> Amount </th>
                                                <th class="text-center"> Payment Status </th>
                                                <th class="text-center"> Status </th>
                                                <th class="text-center"> Date </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($referrals as $r)
                                                <tr class="text-center">
                                                    <td>{{ $r->id }}</td>
{{--                                              show the first product image in the index table--}}
{{--                                                    <td><img src="{{ asset('storage/'.$product->firstImage() ) }}" id="bannerImage" class="img-fluid" alt="img" width="400px"></td>--}}
                                                    <td>{{ $r->total }}</td>
                                                    <td>{{ $r->paid }}</td>
                                                    <td>{{ $r->status }}</td>
                                                    <td>{{ $r->created_at }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

            <div class="tab-pane" id="payments">
                <div class="d-flex flex-column justify-content-start" style="">
                    <div class="card ml-2" style="width:800px;">
                        <h5 class="card-title affiliate-overview-title">Payments</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-center">
                        <div class="widget-small primary mx-3 my-2">
                            {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>${{$referraltotal ?? 0.00}} USD</b></p>
                                <h4 class="p-2">Your earnings to date (total transactions)</h4>
                            </div>
                        </div>
                        <div class="widget-small primary mx-3 my-2">
                            {{--                    <i class="icon fa fa-users fa-2x"></i>--}}
                            <div class="info">
                                <p class="p-3"><b>${{$referralbalance ?? 0.00}} USD</b></p>
                                <h4 class="p-2">Your current balance</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="tile">
                                    <div class="tile-body">
                                        <table class="table table-hover table-bordered" id="sampleTable">
                                            <thead>
                                            <tr class="text-center">
                                                <th class="text-center"> # </th>
                                                <th class="text-center"> Amount </th>
                                                <th class="text-center"> Create Date </th>
                                                <th class="text-center"> Payment Date </th>
                                                <th class="text-center"> Payment Status </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($payments as $p)
                                                <tr class="text-center">
                                                    <td>{{ $p->id }}</td>
                                                    <td>{{ $p->amount }}</td>
                                                    <td>{{ $p->created_at }}</td>
                                                    <td>{{ $p->paid_date }}</td>
                                                    <td>{{ $p->status }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="tab-pane" id="affiliatelinks">
                <div class="d-flex flex-column justify-content-start" style="">
                    <div class="card ml-2" style="width:800px;">
                        <h5 class="card-title affiliate-overview-title">Affiliate Links</h5>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tile">
                                <div class="tile-body">
                                    <table class="affiliate-table table table-hover table-bordered" id="sampleTable" style="width:800px;text-align: left; text-overflow: initial;line-height:1;">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="text-center"> # </th>
                                            <th class="text-center"> Image </th>
                                            <th class="text-center"> Title </th>
                                            <th class="text-center"> Product Affiliate Link </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $o)
                                            <tr class="text-center">
                                                <td>{{ $o->id }}</td>
                                                <td><img src="{{ asset('frontend/images/logo2.png') }}" width="80px"></td>
                                                <td>{{ $o->name }}</td>
                                                <td>https://www.arcangelbattery.com/ref?id={{ Auth::guard('affiliate')->user()->affiliate_code }}&url=product/{{ $o->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="myprofile">
                    <div class="tile">
                            <form action="{{ route('affiliate.updateprofile') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="card ml-2" style="width:800px;">
                                    <h5 class="card-title affiliate-overview-title">My Profile</h5>
                                </div>
                                <hr>
                                <div class="tile-body">

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="control-label" for="fname">First Name</label>
                                                    <input class="form-control @error('fname') is-invalid @enderror" type="text" placeholder="Enter first name" id="fname" name="fname" value="{{ old('fname', Auth::guard('affiliate')->user()->fname) }}"/>
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('fname') <span>{{ $message }}</span> @enderror
                                                        <input type="hidden" name="id" value="{{ Auth::guard('affiliate')->user()->id }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="lname">Last Name</label>
                                                    <input class="form-control @error('lname') is-invalid @enderror" type="text" placeholder="Enter last name" id="lname" name="lname" value="{{ old('lname', Auth::guard('affiliate')->user()->lname) }}"/>
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="email">email</label>
                                                    <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Enter email" id="email" name="email" value="{{ old('email', Auth::guard('affiliate')->user()->email) }}"/>
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('email') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label" for="countrycode_id">Country</label>
                                                    <select name="countrycode_id" id="countrycode_id" class="form-control @error('countrycode_id') is-invalid @enderror">
                                                        @foreach($countrycodes as $s)
                                                            @if($s->id == Auth::guard('affiliate')->user()->countrycode_id)
                                                                <option value="{{ $s->id }}" selected>{{ $s->country }}</option>
                                                            @else
                                                                <option value="{{ $s->id }}">{{ $s->country }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback active">
                                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('countrycode_id') <span>{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-footer">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Profile</button>
                                    </div>
                                </div>
                            </form>
                    </div>
            </div>

            <div class="tab-pane" id="bankdetails">
                <div class="tile">
                    <form action="{{ route('affiliate.updatebank') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card ml-2" style="width:800px;">
                            <h5 class="card-title affiliate-overview-title">Bank Details</h5>
                        </div>
                        <hr>
                        <div class="tile-body">

                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label" for="bank_details">Bank Details</label>
                                            <input class="form-control @error('bank_details') is-invalid @enderror" type="text" placeholder="Enter product bank_details" id="bank_details" name="bank_details" value="{{ old('bank_details', Auth::guard('affiliate')->user()->bank_details) }}"/>
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('bank_details') <span>{{ $message }}</span> @enderror
                                                <input type="hidden" name="id" value="{{ Auth::guard('affiliate')->user()->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Banking Details</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab-pane" id="changepassword">
                <div class="tile">
                    <form action="{{ route('affiliate.updateprofile') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card ml-2" style="width:800px;">
                            <h5 class="card-title affiliate-overview-title">Change Password</h5>
                        </div>
                        <hr>
                        <div class="tile-body">

                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label" for="">Current Password</label>
                                            <input class="form-control @error('') is-invalid @enderror" type="password" placeholder="Enter password" id="" name="" />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="password">New Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Enter new password" id="password" name="password" />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="">Confirm New Password</label>
                                            <input class="form-control @error('') is-invalid @enderror" type="password" placeholder="Confirm new password" id="" name="" />
                                            <div class="invalid-feedback active">
                                                <i class="fa fa-exclamation-circle fa-fw"></i> @error('') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Password</button>
                        </div>
                    </form>
                    <hr>
                </div>
                {{--                    </div>--}}





            </div>

        </div>
    </div>












@endsection
