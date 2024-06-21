<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ProSupplier</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css" />
    <link rel="stylesheet" href="stylesheet\landingStyle.css" />

   
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
         {{-- <div><img class="logo" src="./images/download.png" alt="logo-Hikma"></div> --}}
        <h1 align="center" class="title">IDENTIFY YOURSELF</h1>
      </svg>
    </svg>
    <a href="/loginView"><button class="btn btn-danger loginButton">Log in </button></a>
    <a href="/loginAdmin"><button class="btn btn-primary loginButton Admin">Admin </button></a>

    <div class="container ">
      <div class="row align-items-center">
        <div class="col-3">
          <a href="./Sign-inPurchase" class="btn btn-outline-light ">
            <img
              src="images/order-fulfillment.png"
              class="img-thumbnail img1"
              alt="purchase-manager-icon"
            />
          </a>
          <h5>Purchase Manager</h3>
        </div>
        <div class="col-3">
          <a href="/Sign-inSupplier" class="btn btn-outline-light ">
            <img
              src="images/supplier.png"
              class="img-thumbnail img2"
              alt="supplier-icon"
            />
          </a>
          <h5>Supplier <br>
          <br></h5>
        </div>
                  
      </div>

    </div>
    

    <script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
  </body>
</html>
