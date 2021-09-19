
    <section class="section-pagetop" style="background-color: white;">
        <div class="card profile-card col-md-12">
            <div style="background-color: #e8a038">
            <h3 class="tile-title profile-title p-2">My Saved Addresses</h3>
            <h5 class="profile-subtitle">My Billing Address</h5>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-smmd-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('checkout.review.order') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>First name <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="billing_first_name" name="billing_first_name">
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="billing_last_name" name="billing_last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Address <span class="m-l-5 text-danger"> *</span></label>
                                    <input type="text" class="form-control" id="billing_address" name="billing_address">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="billing_city" name="billing_city">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label" for="billing_state">State</label>
                                        <select name="billing_state" id="billing_state" class="form-control @error('billing_state') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($states as $s)
                                                <option value="{{$s->id}}">{{$s->state}}</option>
                                            @endforeach
                                        </select>
                                        @error('billing_state') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Post Code <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="billing_post_code" name="billing_post_code">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="billing_country">Country</label>
                                        <select name="billing_country" id="billing_country" class="form-control @error('billing_country') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($countrycodes as $s)
                                                <option value="{{$s->id}}">{{$s->country}}</option>
                                            @endforeach
                                        </select>
                                        @error('billing_country') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="billing_phone_number" name="billing_phone_number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email Address <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="billing_email" name="billing_email" value="{{ auth()->user()->email }}">
                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
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
                                        <input type="text" class="form-control" id="shipping_first_name" name="shipping_first_name">
                                    </div>
                                    <div class="col form-group">
                                        <label>Last name <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_last_name" name="shipping_last_name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address <span class="m-l-5 text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="shipping_address" name="shipping_address">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>City <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_city" name="shipping_city">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label" for="shipping_state">State</label>
                                        <select name="shipping_state" id="shipping_state" class="form-control @error('shipping_state') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($states as $s)
                                                <option value="{{$s->id}}">{{$s->state}}</option>
                                            @endforeach
                                        </select>
                                        @error('shipping_state') {{ $message }} @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Post Code <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_post_code" name="shipping_post_code">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label" for="shipping_country">Country</label>
                                        <select name="shipping_country" id="shipping_country" class="form-control @error('shipping_country') is-invalid @enderror">
                                            <option value="0">Choose...</option>
                                            @foreach($countrycodes as $s)
                                                <option value="{{$s->id}}">{{$s->country}}</option>
                                            @endforeach
                                        </select>
                                        @error('shipping_country') {{ $message }} @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phone Number <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_phone_number" name="shipping_phone_number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email Address <span class="m-l-5 text-danger"> *</span></label>
                                        <input type="text" class="form-control" id="shipping_email" name="shipping_email" value="{{ auth()->user()->email }}">
                                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
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
