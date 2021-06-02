@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form  id="login" method="POST" action="{{route('job.seeker.login')}}">
                        @csrf
                        @if(@Session::get('error'))
                        <div class="alert alert-success" role="alert">
                           @php echo Session::get('error'); @endphp
                          </div>
                        @endif

                        @if(@Session::get('success'))
                        <div class="alert alert-success" role="alert">
                           @php echo Session::get('success'); @endphp
                          </div>
                        @endif
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}

                                <a class="btn btn-link" href="{{ url('jobseeker/register') }}">
                                    {{ __('Sign Up') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>

$("#login").validate({
    // Specify validation rules
    // rules: {
    //   // The key name on the left side is the name attribute
    //   // of an input field. Validation rules are defined
    //   // on the right side
    //   firstname: "required",
    //   lastname: "required",
    //   email: {
    //     required: true,
    //     // Specify that email should be validated
    //     // by the built-in "email" rule
    //     email: true
    //   },
    //   password: {
    //     required: true,
    //     minlength: 5
    //   }
    // },
    // compa
    // // Specify validation error messages
    // messages: {
    //   firstname: "Please enter your firstname",
    //   lastname: "Please enter your lastname",
    //   password: {
    //     required: "Please provide a password",
    //     minlength: "Your password must be at least 5 characters long"
    //   },
    //   email: "Please enter a valid email address"
    // },
    // // Make sure the form is submitted to the destination defined
    // // in the "action" attribute of the form when valid
    // submitHandler: function(form) {
    //   form.submit();
    // }
  });
</script>
@endsection
