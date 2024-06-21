<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="./stylesheet/dashboardManager.css" />
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    

      {{-- <div class="modal fade" id="searchOutput" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <nav class="navbar ">
                    <div class="container-fluid">
               <form class="d-flex" role="search" id="searchForm" method="POST" action="/searchSuppliers">
                        @csrf
                        <input class="form-control me-2 " name="query" type="search" placeholder="Supplier's Name" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
            </div>
            <div class="modal-body">
                @if(isset($suppliers) && count($suppliers) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->category }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No suppliers found.</p>
    @endif
              
            </div>
            
          </div>
        </div>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(isset($suppliers))
            var searchModal = new bootstrap.Modal(document.getElementById('searchOutput'));
            searchModal.show();
            @endif
        });
    </script> --}}

    <div class="rectangle"></div>
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>
    <div class="saying-manager"><p>A successful business relies on a <br>savvy purchase manager.</p></div>

     <div class="container ">
        <div class="row">
            <div class="col-1 nav">
                  <form action="/logout" method="POST">
                    @csrf
                    <input type="text" name="userType" value="purchaseManager" hidden>
                  <div class="home"> <button class="btn" type="submit" name="submit" value="home"><img src="./images/home.png" alt="home button"></button></div>
                  </form>
                  <form action="/logout" method="POST">
                    @csrf
                    <input type="text" name="userType" value="purchaseManager" hidden>
                  <div class="logout"> <button class="btn" type="submit" name="submit" value="logout"><img src="./images/logout.png" alt="logout button"></button></div>
                </form>
        </div>
        <div class="col-8 welcome-div">
            <div class="welcome-text"> 
                <h5> Good Day , Manager!</h5>
                  <small>have a nice day ! </small>
            </div>
            <img src="./images/Leader-bro.png" alt="" class="manager-logo">
        </div>
        <div class="col-2 profile-div">
            <div class="profile">
                 <div class="bold"> <p>{{Auth::guard('purchaseManager')->user()->first_name}}</p></div> 
                <button class="btn" data-bs-toggle="modal" data-bs-target="#UpdateProfile"><img class="edit-img" src="./images/edit-text.png" alt=""></button>
                
            </div>
            <div class="new order-btn">
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newOrder">New Order</button>

                <div class="modal fade" id="newOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">New Order</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="/createOrder" method="post">
                            @csrf
                            <div class="mb-3">
                            <label for="product">Product</label>
                             <input type="text" class="form-control form-control-sm input" name="product" Required>
                            </div>
                            <div class="mb-3">
                             <label for="quantity">Quantity</label>
                             <input type="number" class="form-control form-control-sm input" name="quantity" min="1" Required>
                            </div>

                            <div class="mb-3">
                                <label for="supplierId" class="form-label">Supplier</label>
                                <select id="inputSupplier" class="form-select form-select-sm input" name="supplierId" required >
                                    <option value=""  selected>Select a supplier</option>
                                    @php
                                    $suppliers = App\Models\Supplier::all();
                                    @endphp
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->first_name }} ({{ $supplier->category }})</option>
                                @endforeach
                                </select>
                            </div>
                            <input type="text" name="managerId" value="{{Auth::guard('purchaseManager')->user()->id}}"  hidden>
                            <button id="submitButton" type="submit" class="btn btn-primary" disabled>Submit</button>
                          </form>

                          <script>
                            
                            const inputs = document.querySelectorAll('.input');
                            const submitButton = document.getElementById('submitButton');
                        
                            
                            function checkInputs() {
                                let filled = true;
                                inputs.forEach(input => {
                                    if (!input.value.trim()) {
                                        filled = false;
                                    }
                                });
                                return filled;
                            }
                        
                            inputs.forEach(input => {
                                input.addEventListener('change', () => {
                                    if (checkInputs()) {
                                        submitButton.removeAttribute('disabled');
                                    } else {
                                        submitButton.setAttribute('disabled', 'disabled');
                                    }
                                });
                            });
                        </script>
                        </div>
                        
                      </div>
                    </div>
                  </div>
            </div>
            

        </div>
    </div>

    {{-- update modal  --}}
    <div class="modal fade" id="UpdateProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Your Profile</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/updateManager" method="POST">
                @csrf
            <div class="mb-3">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control form control-sm" name="first_name" value="{{Auth::guard('purchaseManager')->user()->first_name}}">
            </div>
            <div class="mb-3">
                <label for="Last_name">Last Name</label>
                <input type="text" class="form-control form control-sm" name="last_name" value="{{Auth::guard('purchaseManager')->user()->last_name}}">
            </div>
            <div class="mb-3">
                <label for="number">Number</label>
                <input type="text" class="form-control form control-sm" name="number" value="{{Auth::guard('purchaseManager')->user()->number}}" disabled>
             </div>
             <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control form control-sm" name="email" value="{{Auth::guard('purchaseManager')->user()->email}}" disabled>
             </div>

                <button type="submit" class="btn btn-primary">Update</button>
            
               </form>
            </div>
            
          </div>
        </div>
      </div>
    <div class="row ">
        <div class="col-11 pending-orders-div">
        <h4>Pending Orders</h4>
        <div class="pending-orders">
        @php
        $pendingOrders = App\Models\order::where('status','pending')->where('manager_id',Auth::guard('purchaseManager')->user()->id)->get();
        @endphp
        <table class="table table-hover">
            <thead>
                <th>id</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Supplier</th>
                <th>Number</th>
                <th>Email</th>
                <th>Manage</th>
            </thead>
            <tbody>
            @foreach($pendingOrders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->supplier->first_name }} {{ $order->supplier->last_name }}</td>
                        <td>{{ $order->supplier->number }}</td>
                        <td>{{ $order->supplier->email }}</td>
                        <td>
                            <form action="/deleteOrder" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{$order->id}} " hidden>
                                <button class="btn btn-danger ">Cancel</button>
                            </form>
                            
                            
                        </td>
                    </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</div>
    </div>
    <div class="row">
        <div class="col-11 offered-orders-div">

            <h4>Offered Orders</h4>
        <div class="offered-orders">
        @php
        $offeredOrders = App\Models\order::where('status','offered')->where('manager_id',Auth::guard('purchaseManager')->user()->id)->get();
        @endphp
            <table class="table table-hover">
                <thead>
                    <th>id</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Supplier</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Offered Price</th>
                    <th>Manage</th>
                </thead>
                <tbody>
                @foreach($offeredOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->product }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->supplier->first_name }} {{ $order->supplier->last_name }}</td>
                            <td>{{ $order->supplier->number }}</td>
                            <td>{{ $order->supplier->email }}</td>
                            <td>{{ $order->offered_price}}</td>
                            <td>
                                <form action="/offerOrDecline" method="POST">
                                    @csrf
                                <input type="text" name="id" value="{{$order->id}} " hidden>
                                <button type="submit" name="submit" value="accept" class="btn btn-success">Accept</button>
                                <button type="submit" name="submit" value="decline" class="btn btn-danger">Decline</button>
                                
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>

        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-11 accepted-orders-div">

            <h4>Accepted Orders</h4>
        <div class="accepted-orders">
        @php
        $acceptedOrders = App\Models\order::where('status','accepted')->where('manager_id',Auth::guard('purchaseManager')->user()->id)->get();
        @endphp
            <table class="table table-hover">
                <thead>
                    <th>id</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Supplier</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>Invoice</th>
                </thead>
                <tbody>
                @foreach($acceptedOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->product }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->supplier->first_name }} {{ $order->supplier->last_name }}</td>
                            <td>{{ $order->supplier->number }}</td>
                            <td>{{ $order->supplier->email }}</td>
                            <td>{{ $order->offered_price}}</td>
                            <td>
                                <form action="/pdf" method="POST">
                                    @csrf
                                <input type="text" name="id" value="{{$order->id}} " hidden>
                                <button type="submit" class="btn btn-primary">Download</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>

        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-11 declined-orders-div">

            <h4>Declined Orders</h4>
        <div class="declined-orders">
        @php
        $declinedOrders = App\Models\order::where('status','declined')->where('manager_id',Auth::guard('purchaseManager')->user()->id)->get();
        @endphp
            <table class="table table-hover">
                <thead>
                    <th>id</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Supplier</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>Offered Price</th>
                    <th>Manage</th>
                </thead>
                <tbody>
                @foreach($declinedOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->product }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->supplier->first_name }} {{ $order->supplier->last_name }}</td>
                            <td>{{ $order->supplier->number }}</td>
                            <td>{{ $order->supplier->email }}</td>
                            <td>{{ $order->offered_price}}</td>
                            <td>
                                <form action="/deleteOrder" method="POST">
                                    @csrf
                                    <input type="text" name="id" value="{{$order->id}} " hidden>
                                    <button type="submit" name="submit" value="delete" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>

        </div>
        </div>
    </div>
        </div>
        

     </div>

    

     <script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.min.jss"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('inputCategory');
        const supplierSelect = document.getElementById('inputSupplier');

        categorySelect.addEventListener('change', function() {
            const category = this.value;
            if (category) {
                fetch(`/get-suppliers-by-category?category=${category}`)
                    .then(response => response.json())
                    .then(data => {
                        supplierSelect.innerHTML = '<option value="" disabled selected>Select a supplier</option>';
                        data.forEach(supplier => {
                            const option = document.createElement('option');
                            option.value = supplier.id;
                            option.textContent = supplier.name;
                            supplierSelect.appendChild(option);
                        });
                        supplierSelect.disabled = false;
                    })
                    .catch(error => {
                        console.error('Error fetching suppliers:', error);
                    });
            } else {
                supplierSelect.innerHTML = '<option value="" disabled selected>Select a supplier</option>';
                supplierSelect.disabled = true;
            }
        });
    });
</script>
</body>
</html>