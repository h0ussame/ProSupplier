<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="stylesheet/login.css" />
</head>
<body>
<svg class="svg-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#eb0000"
        fill-opacity="1"
        d="M0,192L60,202.7C120,213,240,235,360,218.7C480,203,600,149,720,154.7C840,160,960,224,1080,250.7C1200,277,1320,267,1380,261.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
      ></path>
      <svg class="svg-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#eb0000"
          fill-opacity="0.7"
          d="M0,320L30,272C60,224,120,128,180,90.7C240,53,300,75,360,80C420,85,480,75,540,101.3C600,128,660,192,720,197.3C780,203,840,149,900,144C960,139,1020,181,1080,170.7C1140,160,1200,96,1260,64C1320,32,1380,32,1410,32L1440,32L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"
        ></path>
      </svg>
    </svg>
    <!-- <svg class="svg-top" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff0215" fill-opacity="1" d="M0,128L16,149.3C32,171,64,213,96,218.7C128,224,160,192,192,165.3C224,139,256,117,288,101.3C320,85,352,75,384,101.3C416,128,448,192,480,213.3C512,235,544,213,576,186.7C608,160,640,128,672,149.3C704,171,736,245,768,277.3C800,309,832,299,864,293.3C896,288,928,288,960,266.7C992,245,1024,203,1056,181.3C1088,160,1120,160,1152,176C1184,192,1216,224,1248,245.3C1280,267,1312,277,1344,256C1376,235,1408,181,1424,154.7L1440,128L1440,0L1424,0C1408,0,1376,0,1344,0C1312,0,1280,0,1248,0C1216,0,1184,0,1152,0C1120,0,1088,0,1056,0C1024,0,992,0,960,0C928,0,896,0,864,0C832,0,800,0,768,0C736,0,704,0,672,0C640,0,608,0,576,0C544,0,512,0,480,0C448,0,416,0,384,0C352,0,320,0,288,0C256,0,224,0,192,0C160,0,128,0,96,0C64,0,32,0,16,0L0,0Z"></path></svg> -->

    {{-- <div><img class="logo" src="./images/download.png" alt="logo-Hikma"></div> --}}
<a href="/"><button class="btn btn-danger homeButton">Home</button></a>

<div class="card mb-3">
  <img src="./images/login-design4.jpg" class="card-img-top" alt="LoginPagedesign">
  <div class="card-body">
    <h4 class="card-title">Login</h4>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

      <form id="loginForm" method="post" action="/login" novalidate>
        @csrf
        <div class="form-group grp-email">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" required>
          <div class="invalid-feedback">
            Please enter a valid email.
          </div>
        </div>
        <div class="form-group ">
          <label for="password">Password</label>
          <div class="container-fluid">
            <div class="row">
          <div class="col-12">
          <input type="password" class="form-control" id="password" name="password" required>
          <div class="invalid-feedback">
            Please enter a valid password.(Upper cases , lower cases and numbers)
          </div>
        </div>
        <div class="col-1">
          <span id="togglePassword" class="password-toggle-icon">
            <i class="fas fa-eye">
              <img class="password-icon " src="./images/view.png" alt="">
            </i>
        </span>
      </div>
      </div>
      </div>
         
        </div>
        <div class="form-group grp-userType">
          <label for="userType">User Type</label>
          <select class="form-control" id="userType" name="userType" required>
            <option value="">Select User Type</option>
            <option value="purchaseManager">Purchase Manager</option>
            <option value="supplier">Supplier</option>
          </select>
          <div class="invalid-feedback">
            Please select your user type.
          </div>
        </div>

        <!-- <button type="submit" class="btn btn-primary btn-block">Login</button> -->
        <button type="submit" class="btn btn-outline-success" id="submitButton" disabled>Login</button>
      </form>

    </div>
  </div>
</div>
  </div>
</div>

<script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {   
  var form = document.getElementById('loginForm');
  var inputs = form.querySelectorAll('input[required]');
  var submitButton = document.getElementById('submitButton');
  var togglePassword = document.getElementById('togglePassword');

  form.addEventListener('submit', function (event) {

    handleValidation();
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
      handleValidation();
    } else {
      form.classList.add('was-validated');
    }
  });

  function handleValidation() {
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var userType = document.getElementById('userType');

    if (!email.checkValidity()) {
      email.classList.add('is-invalid');
    } else {
      email.classList.remove('is-invalid');
    }

    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/; 
    if (!passwordRegex.test(password.value)) {
      password.classList.add('is-invalid');
      password.value = '';
    } else {
      password.classList.remove('is-invalid');
    }

    if (!userType.checkValidity()) {
      userType.classList.add('is-invalid');
    } else {
      userType.classList.remove('is-invalid');
    }
  }

  function checkInputs() {
    var allFilled = true;
    inputs.forEach(input => {
      if (!input.value.trim()) {
        allFilled = false;
      }
    });
    submitButton.disabled = !allFilled;
  }

  inputs.forEach(input => {
    input.addEventListener('input', checkInputs);
  });

  togglePassword.addEventListener('click', function() {
    var passwordInput = document.getElementById('password');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });
});



</script>
  
</body>
</html>