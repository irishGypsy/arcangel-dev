

<div class="tile">
    <form action="{{ route('site.profile.updateprofile') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <h3 class="tile-title profile-title p-2">My Profile</h3>
        <hr>
        <div class="tile-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="first_name">First Name</label>
                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" placeholder="Enter first name" id="first_name" name="first_name" value="{{ old('first_name', Auth::guard()->user()->first_name) }}"/>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('first_name') <span>{{ $message }}</span> @enderror
                            <input type="hidden" name="id" value="{{ Auth::guard()->user()->id }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="last_name">Last Name</label>
                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" placeholder="Enter last name" id="last_name" name="last_name" value="{{ old('last_name', Auth::guard()->user()->last_name) }}"/>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('name') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="email">email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Enter email" id="email" name="email" value="{{ old('email', Auth::guard()->user()->email) }}"/>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('email') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="phone_number">Phone Number</label>
                        <input class="form-control @error('phone_number') is-invalid @enderror" type="text" placeholder="Enter phone_number" id="phone_number" name="phone_number" value="{{ old('phone_number', Auth::guard()->user()->phone_number) }}"/>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('phone_number') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="address">Address</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Enter address" id="address" name="address" value="{{ old('address', Auth::guard()->user()->address) }}"/>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('address') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="city">City</label>
                        <input class="form-control @error('city') is-invalid @enderror" type="text" placeholder="Enter city" id="city" name="city" value="{{ old('city', Auth::guard()->user()->city) }}"/>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('city') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="state_id">State</label>
                        <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror">
                            @foreach($states as $s)
                                @if($s->id == Auth::guard()->user()->state_id)
                                    <option value="{{ $s->id }}" selected>{{ $s->state }}</option>
                                @else
                                    <option value="{{ $s->id }}">{{ $s->state }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('state_id') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="zip">Zip</label>
                        <input class="form-control @error('zip') is-invalid @enderror" type="text" placeholder="Enter zip" id="zip" name="zip" value="{{ old('zip', Auth::guard()->user()->zip) }}"/>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('zip') <span>{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="countrycode_id">Country</label>
                        <select name="countrycode_id" id="countrycode_id" class="form-control @error('countrycode_id') is-invalid @enderror">
                            @foreach($countrycodes as $s)
                                @if($s->id == Auth::guard()->user()->countrycode_id)
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
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>
