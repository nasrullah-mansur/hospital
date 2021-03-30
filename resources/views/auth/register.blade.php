
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ THEME_NAME }} - Register</title>
    <meta name="description" content="Consultation System" />
    <meta name="keywords" content="Consultation System" />
    <meta name="author" content="Consultation System" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!-- fonts file -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <script src="{{ asset('assets/js/modernizr-3.11.2.min.js') }}"></script>
  </head>
  <body>
    <div class="registration-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <div class="registration-wrap">
              <div class="row no-gutters align-items-center">
                <div class="col-md-6">
                  <div class="registration-form">
                    <h2 class="form-title">Sign Up to <br /> {{ config('app.name') }}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="form-group">
                        <input type="text" class="form-control" id="yname" name="full_name" placeholder="Name" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" />
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" id="text" name="password" placeholder="Password" />
                      </div>
                      <p class="form-privacy-text">By signing up, I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a></p>
                      <button type="submit" class="registration-btn">Create New Account</button>
                      <h5 class="form-bottom-text">Already have an account? <a href="{{ route('login') }}">Sign In</a></h5>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="registration-info text-center">
                    <img class="registration-img" src="{{ asset('assets/images/registration-image-1.png') }}" alt="registration-image" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>


