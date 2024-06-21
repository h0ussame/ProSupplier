<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supplier Dashboard</title>
    <link rel="stylesheet" href="./stylesheet/dashboardSupplier.css" />
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
      
    <div class="rectangle"></div>
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>
    <div class="saying-manager"><p>A thriving business depends on a <br>reliable supplier</p></div>
    <div class="container">

        <div class="row">
            <div class="col-1 nav">
                <form action="/logout" method="POST">
                    @csrf
                    <input type="text" name="userType" value="supplier" hidden>
                  <div class="home"> <button class="btn" type="submit" name="submit" value="home"><img src="./images/home.png" alt="home button"></button></div>
                  </form>
                  <form action="/logout" method="POST">
                    @csrf
                    <input type="text" name="userType" value="supplier" hidden>
                  <div class="logout"> <button class="btn" type="submit" name="submit" value="logout"><img src="./images/logout.png" alt="logout button"></button></div>
                </form>
            </div>
            <div class="col-8 welcome-div">
                <div class="welcome-text"> 
                    <h5> Good Day , Supplier!</h5>
                      <small>have a nice day ! </small>
                </div>
            <img src="./images/Team spirit-pana.png" alt="" class="supplier-logo">

            </div>
            <div class="col-2 profile-div">
                <div class="profile">
                    <div class="bold"> <p>{{Auth::guard('supplier')->user()->first_name}}</p> </div> 
                   <button class="btn" data-bs-toggle="modal" data-bs-target="#UpdateProfile"><img class="edit-img" src="./images/edit-text.png" alt=""></button>
                   

               </div>
            </div>
        </div>


        <div class="modal fade" id="UpdateProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Your Profile</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="/updateSupplier" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control form-control-sm" value="{{Auth::guard('supplier')->user()->first_name}}">
                    </div>

                    <div class="mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control form-control-sm" value="{{Auth::guard('supplier')->user()->last_name}}">
                    </div>

                    <div class="mb-3">
                        <label for="category">Category</label>
                        <input type="text" name="category" class="form-control form-control-sm" value="{{Auth::guard('supplier')->user()->category}}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control form-control-sm" value="{{Auth::guard('supplier')->user()->email}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="number">Number </label>
                        <input type="text" name="number" class="form-control form-control-sm" value="{{Auth::guard('supplier')->user()->number}}" disabled>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
                
              </div>
            </div>
          </div>


        <div class="row">
            <div class="col-11 pending-orders-div">
            <h4>Pending Orders</h4>
            <div class="pending-orders">
            @php
            $pendingOrders = App\Models\order::where('status','pending')->where('supplier_id',Auth::guard('supplier')->user()->id)->get();
            @endphp
            <table class="table table-hover">
                <thead>
                    <th>id</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Manager</th>
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
                            <td>{{ $order->manager->first_name }} {{ $order->manager->last_name }}</td>
                            <td>{{ $order->manager->number }}</td>
                            <td>{{ $order->manager->email }}</td>
                            <td><button class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#PriceOffer{{$order->id}}">Offer</button> </td>
                        </tr>
                        <div class="modal fade" id="PriceOffer{{$order->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Price Offer for Order #{{$order->id}}</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   <form action="/offerOrDecline" method="POST">
                                    @csrf
                                      <div class="mb-3">
                                        <label for="id">Id Order</label>
                                      <input type="text" class="form-control form-control-sm"  value="{{$order->id}}" disabled>
                                      <input type="text" class="form-control form-control-sm" name="id" value="{{$order->id}}" hidden>
                                      </div>
                                      <div class="mb-3">
                                        <label for="id">Product</label>
                                      <input type="text" class="form-control form-control-sm" name="product" value="{{$order->product}}" disabled>
                                      </div>
                                      <div class="mb-3">
                                        <label for="id">Quantity</label>
                                      <input type="text" class="form-control form-control-sm" name="quantity" value="{{$order->quantity}}" disabled>
                                      </div>
                                      <div class="mb-3">
                                        <label for="offered_price">Offered Price (mad)</label>
                                        <input type="number" step="0.01" class="form-control form-control-sm" name="offered_price" placeholder="Enter offered price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="motif">Motif (if declining the offer)</label>
                                        <textarea class="form-control form-control-sm" name="motif" rows="3" placeholder="Enter reason for declining"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="submit" value="offer" class="btn btn-primary">Submit Offer</button>
                                        <button type="submit" name="submit" value="decline" class="btn btn-danger">Decline Offer</button>
                                    </div>
      
                                  </form>
                                </div>
                               
                              </div>
                            </div>
                          </div>
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
            $offeredOrders = App\Models\order::where('status','offered')->where('supplier_id',Auth::guard('supplier')->user()->id)->get();
            @endphp
                <table class="table table-hover">
                    <thead>
                        <th>id</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Manager</th>
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
                                <td>{{ $order->manager->first_name }} {{ $order->manager->last_name }}</td>
                                <td>{{ $order->manager->number }}</td>
                                <td>{{ $order->manager->email }}</td>
                                <td>{{$order->offered_price}}</td>
                                <td>
                                    <form action="/offerOrDecline" method="POST">
                                        @csrf
                                        <input type="text" name="id" value="{{$order->id}} " hidden>
                                        <button type="submit" name="submit" value="decline" class="btn btn-danger">Cancel</button>
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
            $acceptedOrders = App\Models\order::where('status','accepted')->where('supplier_id',Auth::guard('supplier')->user()->id)->get();
            @endphp
                <table class="table table-hover">
                    <thead>
                        <th>id</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Manager</th>
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
                                <td>{{ $order->manager->first_name }} {{ $order->manager->last_name }}</td>
                                <td>{{ $order->manager->number }}</td>
                                <td>{{ $order->manager->email }}</td>
                                <td>{{$order->offered_price}}</td>
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
            $declinedOrders = App\Models\order::where('status','declined')->where('supplier_id',Auth::guard('supplier')->user()->id)->get();
            @endphp
                <table class="table table-hover">
                    <thead>
                        <th>id</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Manager</th>
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
                                <td>{{ $order->manager->first_name }} {{ $order->manager->last_name }}</td>
                                <td>{{ $order->manager->number }}</td>
                                <td>{{ $order->manager->email }}</td>
                                <td>{{$order->offered_price }}</td>
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


    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.jss"></script>
</body>
</html>