<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    

{{ $errors }}



    <form action="{{ route('profile.update', [Auth::user()->id, $profile->slug]) }}" method="POST">
        @csrf
        <input type="text" placeholder="full name" name="full_name">
        <input type="text" placeholder="gender" name="gender">
        <input type="text" placeholder="birth_date" name="birth_date">
        <input type="text" placeholder="age" name="age">
        <input type="text" placeholder="address" name="address">
        <input type="text" placeholder="medical_history" name="medical_history">

        <button>submit</button>
    </form>







</body>
</html> -->
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consultation Responsive  HTML5 Template</title>
    <meta name="description" content="Consultation Responsive  HTML5 Template " />
    <meta name="keywords" content="business,corporate, creative, woocommerach, design, gallery, minimal, modern, landing page, cv, designer, freelancer, html, one page, personal, portfolio, programmer, responsive, vcard, one page" />
    <meta name="author" content="Consultation" />
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
                    <h2 class="form-title">Add Personal Information</h2>
                    <form action="{{ route('profile.update', [Auth::user()->id, $profile->slug]) }}" method="POST">
                        @csrf
                      <div class="form-group">
                        <input type="text" class="form-control" id="fname" name="full_name" placeholder="Full Name" />
                      </div>
                      <div class="form-group">
                        <select class="form-control" id="gender" name="gender">
                          <option>Gender</option>
                          <option>Male</option>
                          <option>Fmale</option>
                          <option>Other</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="datepicker" name="birth_date" placeholder="Birth Date" />
                        <i class="icon fas fa-calendar-alt"></i>
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control" id="age" name="age" placeholder="Age" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                      </div>
                      <div class="form-group">
                        <textarea class="form-control message-box" id="MedicalHistory" name="medical_history" placeholder="Medical History"></textarea>
                      </div>
                      <button type="submit" class="registration-btn">Submit</button>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="registration-info text-center">
                    <img class="registration-img" src="{{ asset('assets/images/registration-image-3.png') }}" alt="registration-image" />
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>

