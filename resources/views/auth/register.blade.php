<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title> Register </title>

  @include('admin.body.head')

</head>

</head>
  <body class="bg-light-gray" id="body">
          <div class="container d-flex flex-column justify-content-between vh-100">
          <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-6 col-md-10">
              <div class="card">
                <div class="card-header bg-primary">
                  <div class="app-brand">
                    <a href="/index.html">
                      <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                        height="33" viewBox="0 0 30 33">
                        <g fill="none" fill-rule="evenodd">
                          <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                          <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                        </g>
                      </svg>
                      <span class="brand-name">Microsil Dashboard</span>
                    </a>
                  </div>
                </div>
                <div class="card-body p-5">
                  <h4 class="text-dark mb-5">Sign Up</h4>
                  <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                      <div class="form-group col-md-12 mb-4">
                        <input type="text" class="form-control input-lg" name="name" aria-describedby="nameHelp" placeholder="Name">
                      </div>
                      <div class="form-group col-md-12 mb-4">
                        <input type="email" class="form-control input-lg"  name="email" aria-describedby="emailHelp" placeholder="Email">
                      </div>
                      <div class="form-group col-md-12 ">
                        <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
                      </div>
                      <div class="form-group col-md-12 ">
                        <input type="password" class="form-control input-lg" id="cpassword" placeholder="Confirm Password" name="password_confirmation">
                      </div>
                      <div class="col-md-12">
                        {{-- <div class="d-inline-block mr-3">
                          <label class="control control-checkbox">
                            <input type="checkbox" />
                            <div class="control-indicator"></div>
                            I Agree the terms and conditions
                          </label>
                    
                        </div> --}}
                        <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign Up</button>
                        <p>Already have an account?
                          <a class="text-blue" href="{{ route('login') }}">Sign in</a>
                        </p>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
          <div class="copyright pl-0">
            ]@include('admin.body.copyright')
          </div>
        </div>
</body>
</html>