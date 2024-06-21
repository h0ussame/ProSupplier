<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="stylesheet/loginAdmin.css" />
</head>
<body>
<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <div class="form-div">
      <form method="post" action="/login">
        @csrf
      <h5 class="title">login</h5>
      @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div >
    @endif
      <div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
  <label for="floatingPassword">Password</label>
</div>
<input type="hidden" name="userType" value="admin">
<button type="submit" class="btn btn-login">Login</button>
</div>

      </form>

      </div>
    </div>
    <div class="col-md-4 ">
        <div class="div-img">
      <img src="./images/Site Stats-amico.png" class="img-fluid rounded-start admin-img" alt="illustration-admin">
      <p class="heading">Start your Admin journey !</p>
      <small class="small">login with one click </small>
      </div>
    </div>
  </div>
</div>
</body>
</html>