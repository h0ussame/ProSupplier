<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./stylesheet/dashboardAdmin.css" />
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">

    
  </head>
  <body>
   

    {{-- <a href="/" class="home-btn"><button class="btn ">Home </button></a> --}}
    
    

    <div class="rectangle"></div>
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>
    <div class="saying-admin"><p>A good management requires <br>a good Admin</p></div>
    <div class="container left-container">
        <div class="row">
            <div class="col-1 nav">
              {{-- <div class="nav"> --}}
                <form action="/logout" method="POST">
                  @csrf
                  <input type="text" name="userType" value="admin" hidden>
                <div class="home"> <button class="btn" type="submit" name="submit" value="home"><img src="./images/home.png" alt="home button"></button></div>
              </form>

                <form action="/logout" method="POST">
                  @csrf
                  <input type="text" name="userType" value="admin" hidden>
                <div class="logout"> <button class="btn" type="submit" name="submit" value="logout"><img src="./images/logout.png" alt="logout button"></button></div>
              </form>
              {{-- </div> --}}
            </div>
            <div class="col-8 welcome-div">
                <div class="welcome-text"> 
                    <h5> Good Day , Admin !</h5>
                      <small>have a nice day ! </small>
                </div>
                <img src="./images/Admin-amico.png" alt="" class="admin-logo">
            </div>
            <div class="col-2 profile-div">
                  <div class="profile">
                      <div class="bold"><p>{{Auth::guard('admin')->user()->first_name}}<p></div>
                      <button class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img class="edit-img" src="./images/edit-text.png" alt=""></button>
                  </div>
                  
                  <div class="new supplier-btn">
                   <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newManager">New Manager</button>

                   <div class="modal fade" id="newManager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" >New Manager</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="myForm" class="row g-3" method="post" action="/createManager">
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
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary btn-sm " id="submitButton" name="submit" value="Purchase" >Sign in</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  
                  <div class="new supplier-btn">
                  <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newSupplier">New Supplier</button>
                  <div class="modal fade" id="newSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content ">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" >New Supplier</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="myForm" class="row g-3" method="post" action="/createSupplier">
                            @csrf
                            <div class="col-md-6">
                              <label for="inputFirstName" class="form-label">First Name</label>
                              <input type="text" class="form-control form-control-sm" id="inputNom" name="first_names" required>
                            </div>
                            <div class="col-md-6">
                              <label for="inputLastName" class="form-label">Last Name</label>
                              <input type="text" class="form-control form-control-sm" id="inputLastName" name="last_names" required>
                            </div>
                            <div class="col-md-6">
                              <label for="inputEmails" class="form-label">Email</label>
                              <input type="email" class="form-control form-control-sm" id="inputEmail" name="emails" required>
                            </div>
                            <div class="col-md-6">
                              <label for="inputPasswords" class="form-label">Password</label>
                              <input type="password" class="form-control form-control-sm" id="inputPassword" name="passwords" required>
                            </div>
                            <div class="col-6">
                              <label for="inputNumbers" class="form-label">Number</label>
                              <input type="text" class="form-control form-control-sm" id="inputNumber" name="numbers" required>
                            </div>
                            <div class="col-md-6">
                            <label for="inputCategory" class="form-label">Category</label>
                              <select id="inputCategory" class="form-select form-select-sm" name="categorys" required>
                                <option selected>Electronics and Technology</option>
                                <option>Apparel and Fashion</option>
                                <option>Healthcare and Pharmaceuticals</option>
                                <option>Automotive</option>
                                <option>Office Supplies</option>
                                <option>Food and Beverage</option>
                              </select>
                            </div>
                            <div class="col-md-8">
                              <label for="inputCity" class="form-label">City</label>
                              <input type="text" class="form-control form-control-sm" id="inputCity" name="citys" required>
                            </div>
                            <div class="col-md-4">
                              <label for="inputZip" class="form-label">Zip Code</label>
                              <input type="text" class="form-control form-control-sm" id="inputZip" placeholder="20000" name="zip_codes" required>
                            </div>          
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary btn-sm " id="submitButton" name="submit" value="Supplier"  >Sign in</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  
            </div>
        </div>



<!-- Admin Account Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Your account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="myForm" class="row g-3" method="post" action="/modifyAdmin">
          @csrf
          <div class="col-md-12">
              <label for="first_name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="inputFirstName" name="first_name" value="{{Auth::guard('admin')->user()->first_name}}" required>
          </div>
          <div class="col-md-12">
              <label for="last_name" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="inputLastName" name="last_name" value="{{Auth::guard('admin')->user()->last_name}}"required>
          </div>
          <div class="col-md-12">
              <label for="number" class="form-label">Number</label>
              <input type="text" class="form-control" id="inputNumber" name="number" value="{{Auth::guard('admin')->user()->number}}" disabled>
          </div>
          <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" value="{{Auth::guard('admin')->user()->email}}"required disabled>
          </div>
          <div class="col-12">
              <button class="btn btn-primary" type="submit">Modify</button>
          </div>
         
      </form>
      
      </div>
    </div>
  </div>
</div>
        <div class="row">
        <div class="col-1"></div>
            <div class="col-5 users pending-suppliers">
                <h5>Pending Suppliers</h5>
                <div class="pending-users">
    <table class="table table-bordered table-dark table-hover ">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Category</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>

        @forelse($pendingSupplierRecords as $record)
        <tr>
            <td>{{ $record->first_name }}</td>
            <td>{{ $record->last_name }}</td>
            <td>{{ $record->category }}</td>
            {{-- <td><button class="btn btn-details">show</button></td> --}}
            <td><button type="button" class="btn btn-details btn-details-supplier" data-bs-toggle="modal" data-bs-target="#PendingSupplier" data-firstnameS="{{ $record->first_name }}" data-lastnameS="{{ $record->last_name }}" data-numberS="{{ $record->number }}" data-category="{{$record->category}}"
              data-emailS="{{ $record->email}}"  data-passwordS="{{$record->password}}"
               data-zipCodeS="{{$record->zip_code}}" data-cityS="{{$record->city}}" 
              >
              show
            </button></td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No pending supplier for now.</td>
        </tr>
    @endforelse
  
      </tbody>
    </table>
    </div>
            </div>
            
            {{-- modal for suppliers --}}
            <div class="modal fade" id="PendingSupplier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
             
              
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Supplier Request</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    
              <form id="myForm" class="row g-3" method="post" action="/createSupplier">
                @csrf
                      <input type="text" class="form-control form-control-sm" id="inputFirstNameph" name="first_names" required hidden>
              <input type="text" class="form-control form-control-sm"  id="inputFirstNameps"  disabled>

              <input type="text" class="form-control form-control-sm" id="inputLastNameph" name="last_names" required hidden>
              <input type="text" class="form-control form-control-sm"  id="inputLastNameps"  disabled >

              <input type="email" class="form-control form-control-sm" id="inputEmailph" name="emails" required hidden>
              <input type="email" class="form-control form-control-sm" id="inputEmailps" disabled >

              <input type="text" class="form-control form-control-sm" id="inputNumberph" name="numbers" required hidden>
              <input type="text" class="form-control form-control-sm" id="inputNumberps" disabled >
              
              <select id="inputCategoryps" class="form-select form-select-sm"  disabled >
                <option selected>Electronics and Technology</option>
                <option>Apparel and Fashion</option>
                <option>Healthcare and Pharmaceuticals</option>
                <option>Automotive</option>
                <option>Office Supplies</option>
                <option>Food and Beverage</option>
              </select>
              <select id="inputCategoryph"  class="form-select form-select-sm" name="categorys" hidden required>
                <option selected>Electronics and Technology</option>
                <option>Apparel and Fashion</option>
                <option>Healthcare and Pharmaceuticals</option>
                <option>Automotive</option>
                <option>Office Supplies</option>
                <option>Food and Beverage</option>
              </select>

              <input type="text" class="form-control form-control-sm" id="inputCityps"  disabled >
              <input type="text" class="form-control form-control-sm" id="inputCityph" name="citys"  hidden required>
              <input type="text" class="form-control form-control-sm" id="inputZipps" disabled   >
              <input type="text" class="form-control form-control-sm" id="inputZipph"  name="zip_codes" required hidden>


              <input type="text" class="form-control form-control-sm" id="inputPasswordph" name="passwords" required hidden>
              <button type="submit" class="btn btn-primary">Accept</button>
                     
                    </form>
                    <script>
                      document.querySelectorAll('.btn-details-supplier').forEach(button => {
                      button.addEventListener('click', function() {
                          const firstName = this.getAttribute('data-firstnameS');
                          const lastName = this.getAttribute('data-lastnameS');
                          const number = this.getAttribute('data-numberS');
                          const email = this.getAttribute('data-emailS');
                          const password = this.getAttribute('data-passwordS');
                          const zip_code=this.getAttribute('data-zipCodeS');
                          const city=this.getAttribute('data-cityS');
                          const category = this.getAttribute('data-category');
                          
                          document.getElementById('inputFirstNameps').value = firstName;
                          document.getElementById('inputLastNameps').value = lastName;
                          document.getElementById('inputNumberps').value = number;
                          document.getElementById('inputEmailps').value= email;
                          document.getElementById('inputCategoryps').value=category;
                          document.getElementById('inputCityps').value=city;
                          document.getElementById('inputZipps').value=zip_code;
      
                          document.getElementById('inputFirstNameph').value = firstName;
                          document.getElementById('inputLastNameph').value = lastName;
                          document.getElementById('inputNumberph').value = number;
                          document.getElementById('inputEmailph').value= email;
                          document.getElementById('inputCityph').value=city;
                          document.getElementById('inputZipph').value=zip_code;
                          document.getElementById('inputCategoryph').value=category;
                          document.getElementById('inputPasswordph').value=password;
      
              
                      });
                    });
                    </script>
                  </div>
                </div>
              </div>
            </div>

            

            <div class="col-5 users pending-managers">
                <h5>Pending Managers</h5>
                <div class="pending-users">
    <table class="table table-bordered table-dark table-hover ">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Number</th>
          <th>details</th>
          
        </tr>
      </thead>
      <tbody>

        @forelse($pendingManagerRecords as $record)
        <tr>
            <td>{{ $record->first_name }}</td>
            <td>{{ $record->last_name }}</td>
            <td>{{ $record->number }}</td>
            {{-- <td>{{ $record->email }}</td> --}}
            <td><button type="button" class="btn btn-details btn-details-manager" data-bs-toggle="modal" data-bs-target="#PendingManager" data-firstname="{{ $record->first_name }}" data-lastname="{{ $record->last_name }}" data-number="{{ $record->number }}"
              data-email="{{ $record->email}}"  data-password="{{$record->password}}"
              >
              show
            </button></td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No Pending managers for now.</td>
        </tr>
    @endforelse
        
      </tbody>
    </table>
    </div>
            </div>
        </div>
         {{-- modal for managers --}}
    <div class="modal fade" id="PendingManager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

      

      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Manager Request</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="myForm" class="row g-3" method="post" action="/createManager">
              @csrf
              <input type="text" class="form-control form-control-sm" id="inputFirstNamehM" name="first_name" required hidden>
              <input type="text" class="form-control form-control-sm"  id="inputFirstNameM" required disabled>
              <input type="text" class="form-control form-control-sm" id="inputLastNamehM" name="last_name" required hidden>
              <input type="text" class="form-control form-control-sm"  id="inputLastNameM"  disabled required>
              <input type="email" class="form-control form-control-sm" id="inputEmailhM" name="email" required hidden>
              <input type="email" class="form-control form-control-sm" id="inputEmailM" disabled required>
              <input type="text" class="form-control form-control-sm" id="inputNumberhM" name="number" required hidden>
              <input type="text" class="form-control form-control-sm" id="inputNumberM" disabled required>
              <input type="password" class="form-control form-control-sm" id="inputPasswordM" name="password" required hidden>
              <button type="submit" class="btn btn-primary">Accept</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.querySelectorAll('.btn-details-manager').forEach(button => {
      button.addEventListener('click', function() {
          const firstName = this.getAttribute('data-firstname');
          const lastName = this.getAttribute('data-lastname');
          const number = this.getAttribute('data-number');
          const email = this.getAttribute('data-email');
          const password = this.getAttribute('data-password');

          
          document.getElementById('inputFirstNameM').value = firstName;
          document.getElementById('inputLastNameM').value = lastName;
          document.getElementById('inputNumberM').value = number;
          document.getElementById('inputEmailM').value= email;

          document.getElementById('inputFirstNamehM').value = firstName;
          document.getElementById('inputLastNamehM').value = lastName;
          document.getElementById('inputNumberhM').value = number;
          document.getElementById('inputEmailhM').value= email;
          document.getElementById('inputPasswordM').value= password;

      });
    });
    </script>


        {{-- table Managers --}}
        <div class="row">
          <div class="col-1"></div>
          <div class="col-10 users managers">
            
              <h5>Managers</h5>
              <div class="pending-users">
    <table class="table table-bordered table-dark table-hover ">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Number</th>
        <th>Email</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
    
      @forelse($managerRecords as $record)
      <tr>
          <td>{{ $record->first_name }}</td>
          <td>{{ $record->last_name }}</td>
          <td>{{ $record->number }}</td>
          <td>{{ $record->email}}</td>

          <td>
            <form action="/deleteManager" method="post">
              @csrf
                <input type="email" name="email" value="{{$record->email}}" hidden>
                <input type="password" name="password" value="{{$record->password}}" hidden>

              <button type="submit" class="btn btn-danger btn-manage-manager"  data-firstname="{{ $record->first_name }}" data-lastname="{{ $record->last_name }}" data-number="{{ $record->number }}"
            data-email="{{ $record->email}}"  data-password="{{$record->password}}"

            
            >
            Delete
          </button>
        </form></td>
      </tr>
    @empty
      <tr>
          <td colspan="5">No manager for now.</td>
      </tr>
    @endforelse
      
    </tbody>
    </table>
    </div>
          </div>
          <div class="col-1"></div>
        </div>


        {{-- Table suppliers --}}
        <div class="row">
          <div class="col-1"></div>
          <div class="col-10 users suppliers">
            
              <h5>Suppliers</h5>
              <div class="pending-users">
                <table class="table table-bordered table-dark table-hover ">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Number</th>
                      <th>Email</th>
                      <th>Category</th>
                      <th>City</th>
                      <th>Zip Code</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
            
                    @forelse($supplierRecords as $record)
                    <tr>
                        <td>{{ $record->first_name }}</td>
                        <td>{{ $record->last_name }}</td>  
                        <td>{{ $record->number }}</td>                        
                        <td>{{$record ->email}}</td>
                        <td>{{ $record->category }}</td>
                        <td>{{$record ->city}}</td>
                        <td>{{$record ->zip_code}}</td>                                             
                        <td>
                          <form action="/deleteSupplier" method="POST">
                          @csrf
                            <input type="email" name="email" value="{{$record->email}} " hidden>
                            <input type="password" name="password" value="{{$record->password}} " hidden>
                          <button type="submit" class="btn btn-danger btn-manage-supplier"  data-firstnameS="{{ $record->first_name }}" data-lastnameS="{{ $record->last_name }}" data-numberS="{{ $record->number }}" data-category="{{$record->category}}"
                          data-emailS="{{ $record->email}}"  data-passwordS="{{$record->password}}"
                           data-zipCodeS="{{$record->zip_code}}" data-cityS="{{$record->city}}" 
                          >
                          Delete
                        </button>
                      </form></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No supplier for now.</td>
                    </tr>
                @endforelse
              
                  </tbody>
                </table>
    </div>
          </div>
          <div class="col-1"></div>
        </div>


    </div>
    


    
    
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.min.jss"></script>

    <script>
      const navBar = document.querySelector("nav"),
        menuBtns = document.querySelectorAll(".menu-icon"),
        overlay = document.querySelector(".overlay");

      menuBtns.forEach((menuBtn) => {
        menuBtn.addEventListener("click", () => {
          navBar.classList.toggle("open");
        });
      });

      overlay.addEventListener("click", () => {
        navBar.classList.remove("open");
      });
    </script>
  </body>
</html>
