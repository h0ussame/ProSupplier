<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .container {
            margin-top: 30px;
        }
        .header, .footer {
            text-align: center;
        }
        .invoice-details, .contact-details {
            margin-top: 20px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>ProSupplier</h1>
            <p>ProSupplier.com</p>
        </div>
        <div class="contact-details">
            <p><strong>Supplier Email:</strong> {{ $supplier->email }}</p>
            <p><strong>Manager Email:</strong> {{ $manager->email }}</p>
        </div>
        <div class="invoice-details">
            <h4>Invoice Details</h4>
            <table class="table table-bordered">
                {{-- <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->product }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ number_format($order->offered_price, 2) }}</td>
                    </tr>
                </tbody> --}}
                <tr>
                    <th>Order ID</th>
                    <td>{{$order->id}}</td>
                </tr>
                <tr>
                    <th>Supplier</th>
                    <td>{{$supplier->first_name}}</td>
                </tr>
                <tr>
                    <th>Manager</th>
                    <td>{{$manager->first_name}}</td>
                </tr>
                <tr>
                    <th>Product</th>
                    <td>{{ $order->product }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $order->quantity }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ number_format($order->offered_price, 2) }} dhs</td>
                </tr>
                
                

            </table>
        </div>
        <br><br><br><br>
        <div class="footer">
            <p>&copy; {{ date('Y') }} ProSupplier. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
