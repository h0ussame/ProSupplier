<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication For Suppliers</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="stylesheet/AuthenPurchase.css" />
</head>
<body>

  

 
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#eb0000"
        fill-opacity="1"
        d="M0,192L60,202.7C120,213,240,235,360,218.7C480,203,600,149,720,154.7C840,160,960,224,1080,250.7C1200,277,1320,267,1380,261.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
      ></path>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#eb0000"
          fill-opacity="0.7"
          d="M0,320L30,272C60,224,120,128,180,90.7C240,53,300,75,360,80C420,85,480,75,540,101.3C600,128,660,192,720,197.3C780,203,840,149,900,144C960,139,1020,181,1080,170.7C1140,160,1200,96,1260,64C1320,32,1380,32,1410,32L1440,32L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"
        ></path>
      </svg>
    </svg>
   

<a href="/"><button class="btn btn-danger homeButton">Home</button></a>

<div class="card mb-3 ">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="./images/79f698ddb9626326dd6f489d2550adfe.jpg" class="img-fluid rounded-start" alt="">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title">Hello Manager !</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
          {{$errors->first()}}
        </div>
        @endif   
        <form id="myForm" class="row g-3" method="post" action="/createPendingManager">
          @csrf
          <div class="col-md-6">
            <label for="inputFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control form-control-sm" id="inputNom" name="first_name" required>
          </div>
          <div class="col-md-6">
            <label for="inputLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control form-control-sm" id="inputLastName" name="last_name" required>
          </div>
          <div class="col-md-6">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control form-control-sm" id="inputEmail" name="email" required>
          </div>
          <div class="col-md-6">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control form-control-sm" id="inputPassword" name="password" required>
          </div>
          <div class="col-12">
            <label for="inputNumber" class="form-label">Number</label>
            <input type="text" class="form-control form-control-sm" id="inputNumber" name="number" required>
          </div>
          
          
          <div class="col-6">
            <div class="forgot">
                <small><a href="/loginView"> already have an account ? </a></small>
            </div>
          </div>          
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-sm " id="submitButton" name="submit" value="Purchase" disabled >Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('myForm');
    const inputs = form.querySelectorAll('input[required]');

    function checkInputs() {
      let allFilled = true;
      inputs.forEach(input => {
        if (!input.value.trim()) {
          allFilled = false;
        }
      });
      document.getElementById('submitButton').disabled = !allFilled;
    }

    inputs.forEach(input => {
      input.addEventListener('input', checkInputs);
    });

   
  });

  </script>
  
  

</body>
</html>
