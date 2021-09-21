<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arc-Angel Batteries LLC</title>
    @include('site.partials.styles')
    @include('site.partials.scripts')
    <script>
        $(window).scroll(function () {
            if ($(window).scrollTop() > 200) {
                $(".headpanel").addClass('sticky');
            } else {
                $(".headpanel").removeClass('sticky');
            }
        });
    </script>
</head>
<body>
@include('site.partials.header')
@include('site.partials.nav')
<div class="bg-white">
    <br><br>
    <section class="section-pagetop bg-white" style="background-color: white;">
        <div class="container clearfix">
            <h2 class="title-page">Login</h2>
        </div>
    </section>
    <section class="section-content bg padding-y" style="background-color: white;">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <header class="card-header py-0 profile-title">
                        <h4 class="card-title mt-2">Sign In</h4>
                    </header>
                    <article class="card-body pb-0 pt-1">
                        <form action="{{ route('login') }}" method="POST" role="form">
                            @csrf
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
                            <div class="form-group row mr-auto">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group"d>
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div>
                        </form>
                    </article>
                    <div class="border-top card-body text-center py-0">Don't have an account? <a href="{{ route('register') }}">Sign Up</a></div>
                </div>
                <br>
            </div>
        </div>
    </section>
</div>
@include('site.partials.footer')
</body>
</html>


