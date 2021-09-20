
    <section class="section-pagetop" style="background-color: white;">
        <div class="card profile-card col-md-12">
            <div style="background-color: #e8a038">
            <h3 class="tile-title profile-title p-2">My Saved Addresses</h3>
            <h5 class="profile-subtitle">My Billing Address</h5>
            </div>
        </div>
        <div class="container">
{{--            <div class="row">--}}
{{--                <div class="col-smmd-12">--}}
{{--                    @if (Session::has('error'))--}}
{{--                        <p class="alert alert-danger">{{ Session::get('error') }}</p>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
            <form action="{{ route('site.addresses.update') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>First name <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('billing_first_name') is-invalid @enderror" type="text" name="billing_first_name" id="billing_first_name" value="{{ old('billing_first_name', $addresses->billing_first_name) }}"/>
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        @error('billing_first_name') {{ $message }} @enderror
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('billing_last_name') is-invalid @enderror" type="text" name="billing_last_name" id="billing_last_name" value="{{ old('billing_last_name', $addresses->billing_last_name) }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address <span class="m-l-5 text-danger"> *</span></label>
                                    <input class="form-control @error('billing_address') is-invalid @enderror" type="text" name="billing_address" id="billing_address" value="{{ old('billing_address', $addresses->billing_address) }}"/>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('billing_city') is-invalid @enderror" type="text" name="billing_city" id="billing_city" value="{{ old('billing_city', $addresses->billing_city) }}"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label" for="billing_state_id">State</label>
                                        <select name="billing_state_id" id="billing_state_id" class="form-control @error('billing_state_id') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($states as $s)
                                                @if($addresses->billing_state_id == $s->id)
                                                    <option value="{{$s->id}}" selected>{{$s->state}}</option>
                                                @else
                                                    <option value="{{$s->id}}">{{$s->state}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('billing_state_id') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Post Code <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('billing_zip') is-invalid @enderror" type="text" name="billing_zip" id="billing_zip" value="{{ old('billing_zip', $addresses->billing_zip) }}"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="billing_countrycode_id">Country</label>
                                        <select name="billing_countrycode_id" id="billing_countrycode_id" class="form-control @error('billing_countrycode_id') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($countrycodes as $s)
                                                @if($addresses->billing_countrycode_id == $s->id)
                                                    <option value="{{$s->id}}" selected>{{$s->country}}</option>
                                                @else
                                                    <option value="{{$s->id}}">{{$s->country}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('billing_countrycode_id') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('billing_phone_number') is-invalid @enderror" type="text" name="billing_phone_number" id="billing_phone_number" value="{{ old('billing_phone_number', $addresses->billing_phone_number) }}"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email Address <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('billing_email') is-invalid @enderror" type="text" name="billing_email" id="billing_email" value="{{ old('billing_email', $addresses->billing_email) }}"/>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card profile-card">
                            <div style="background-color: #e8a038">
                                <h5 class="profile-subtitle">My Shipping Address</h5>
                            </div>
                        </div>
                        <div class="card">
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>First name <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('shipping_first_name') is-invalid @enderror" type="text" name="shipping_first_name" id="shipping_first_name" value="{{ old('shipping_first_name', $addresses->shipping_first_name) }}"/>
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('shipping_last_name') is-invalid @enderror" type="text" name="shipping_last_name" id="shipping_last_name" value="{{ old('shipping_last_name', $addresses->shipping_last_name) }}"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address <span class="m-l-5 text-danger"> *</span></label>
                                            <input class="form-control @error('shipping_address') is-invalid @enderror" type="text" name="shipping_address" id="shipping_address" value="{{ old('shipping_address', $addresses->shipping_address) }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('shipping_city') is-invalid @enderror" type="text" name="shipping_city" id="shipping_city" value="{{ old('shipping_city', $addresses->shipping_city) }}"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label" for="shipping_state_id">State</label>
                                        <select name="shipping_state_id" id="shipping_state_id" class="form-control @error('shipping_state_id') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($states as $s)
                                                @if($addresses->shipping_state_id == $s->id)
                                                    <option value="{{$s->id}}" selected>{{$s->state}}</option>
                                                @else
                                                    <option value="{{$s->id}}">{{$s->state}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('shipping_state_id') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Post Code <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('shipping_zip') is-invalid @enderror" type="text" name="shipping_zip" id="shipping_zip" value="{{ old('shipping_zip', $addresses->shipping_zip) }}"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="shipping_countrycode_id">Country</label>
                                        <select name="shipping_countrycode_id" id="shipping_countrycode_id" class="form-control @error('shipping_countrycode_id') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($countrycodes as $s)
                                                @if($addresses->shipping_countrycode_id == $s->id)
                                                    <option value="{{$s->id}}" selected>{{$s->country}}</option>
                                                @else
                                                    <option value="{{$s->id}}">{{$s->country}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('shipping_countrycode_id') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('shipping_phone_number') is-invalid @enderror" type="text" name="shipping_phone_number" id="shipping_phone_number" value="{{ old('shipping_phone_number', $addresses->shipping_phone_number) }}"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email Address <span class="m-l-5 text-danger"> *</span></label>
                                        <input class="form-control @error('shipping_email') is-invalid @enderror" type="text" name="shipping_email" id="shipping_email" value="{{ old('shipping_email', $addresses->shipping_email) }}"/>
{{--                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <div class="row d-print-none mt-2">
                        <div class="col-12 text-right">
                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
    <br><br>
