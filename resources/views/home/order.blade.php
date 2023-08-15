<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="homepage/images/favicon.png" type="">
        <title>Karma Shop</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="homepage/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="homepage/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="homepage/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="homepage/css/responsive.css" rel="stylesheet" />
        <style>
        .center{
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
            
        }
        table,th,td{
            border: 1px solid black;
        }
        .th_deg{
            padding: 10px;
            background-color: skyblue;
            font-weight:bold;
            font-size: 20px;
        }
      </style>
   </head>
   <body>
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Payment Stutus</th>
                <th class="th_deg">Delivery Status</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Cancel Order</th>

            </tr>
            @foreach($order as $order)

            <tr>
                <td>{{$order->product_title }}</td>
                <td>{{$order->quantity }}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img style="height: 100px; width: 100px" src="product/{{ $order->image }}" alt="">
                </td>
                <td>
                    @if($order->delivery_status=='processing')
                    <a class="btn btn-danger" onclick="return confirm('Are you sure to cancel this order !')" href="{{ url('cancel_order',$order->id) }}">cancel</a>
                    @else
                    <p style="color: blue;">Not Allowed</p>
                    @endif
                </td>

            </tr>
            @endforeach

        </table>
      
     
      <!-- jQery -->
      <script src="homepage/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="homepage/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="homepage/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="homepage/js/custom.js"></script>
   </body>
</html>