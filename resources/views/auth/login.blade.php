@extends('layouts.app')

@section('content')

          <div class="selform_area">
            <br><br>
            <div class="col-md-6 mx-auto">
                <div class="panel-area">
                <br>
                <h2 class="text-center">Log In</h2>
                <br>
                <h3 class="text-center text-danger">Log In to your dashboard</h3>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <br>
                 <div class="col-md-11 mx-auto">
                 <div class="form-group">
                   <label for="name/email">Email</label>
                   <input type="text" id="name/email" class="form-control  @error('email') is-invalid @enderror"   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <br>
                 <div class="form-group">
                  <label for="password">Password</label>
                  <input data-toggle="password" type="password" class="form-control  @error('password') is-invalid @enderror"   id="password" name="password" required autocomplete="current-password">

                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input"   name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <br>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="log-links">Forgotten Password ?</a>
                @endif

                <br><br>
                <div class="d-grid">
                <button type="submit" class="btn btn-submit">Log In</button>
</div>
                <br><br>
                <p>Have you registered with The Best Buy? If yes  then  <a href="/register" class="log-links">Sign Up</a>.</p>
                <br>
                </div>
              </form>
              </div>
              </div>

           </div>

           <style>
             .panel-area {
               border: 2px solid #c81432;
               border-radius: 7px;
             }
           </style>

@endsection
