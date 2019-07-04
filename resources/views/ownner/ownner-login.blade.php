<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
    <div class="cover" style="background-color: {{env('COLOR_ADMIN')}}"></div>
    </section>
    <section class="login-content">
      <div class="login-box" style="min-height: 420px;">
        @if (Auth::guard('ownner')->check())
        <div class="login-form" ">
        <div class="form-group text-center">
          Anda Telah Masuk Sebagai ownner, Silahkan Klik dibawah ini untuk menuju beranda ownner
            <br><br>
            <a href="{{url('ownner')}}" class="btn btn-primary">Beranda ownner</a>
            <br><br>
        atau
        <br><br>
            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Login Distributor ?</a></p>
        </div>
      </div>
        @else
        <form class="login-form" method="post" action="{{route('ownner.login')}}">
          @csrf
          <h3 class="login-head">Login Ownner</h3>
          <div class="form-group">
            <label class="control-label">Username</label>
            <input class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" type="text" placeholder="Username" name="username" autofocus value="{{old('username')}}">
            @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Login') }}</button>
          </div>
        </form>
        @endif
        
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>

    @if(Session::has('alert'))
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script>
        swal({
        {!!Session::get('alert')!!}
        });
    </script>
    @endif
  </body>
</html>
