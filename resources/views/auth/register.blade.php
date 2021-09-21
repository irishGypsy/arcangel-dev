<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arc-Angel Batteries LLC</title>
    @include('site.partials.styles')
    @include('site.partials.scripts')
</head>
<body>
@include('site.partials.header')
@include('site.partials.nav')
<div class="bg-white">

    <br><br>
    <section class="section-pagetop" style="background-color: white;">
        <div class="container clearfix">
            <h2 class="title-page">Register</h2>
        </div>
    </section>
    <section class="section-content bg padding-y" style="background-color: white;">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <header class="card-header py-0 profile-title">
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
                        <form action="{{ route('register') }}" method="POST" role="form">
                            @csrf
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="first_name">First name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col form-group">
                                    <label for="last_name">Last name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="state_id">State</label>
                                    <select name="state_id" id="state_id" class="form-control @error('state_id') is-invalid @enderror">
                                        <option value="">Choose...</option>
                                        @foreach($states as $s)
                                                <option value="{{ $s->id }}">{{ $s->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="zip" id="zip" value="{{ old('zip') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <select name="countrycode_id" id="countrycode_id" class="form-control @error('countrycode_id') is-invalid @enderror">
                                        <option value="">Choose...</option>
                                        @foreach($countrycodes as $s)
                                            <option value="{{ $s->id }}">{{ $s->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Sign Up </button>
                            </div>
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
                        </form>
                    </article>
                    <div class="border-top card-body text-center py-0">Have an account? <a href="{{ route('login') }}">Log In</a></div>
                </div>
                <br>
            </div>
        </div>
    </section>
</div>
@include('site.partials.footer')
</body>
</html>


