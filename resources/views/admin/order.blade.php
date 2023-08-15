<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .title_deg{
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        padding-bottom: 30px;
        }
        .table_deg{
            border: 2px solid white;
            margin: auto;
            width: 100%;
            text-align: center;
        }
        .th_deg{
            background-color:slategrey;
        }
        .img_deg{
            width: 200px;
            height: 200px;
        }
        table,th,td{
      border: solid white;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('admin.header')
      <div class="main-panel">
        <div class="content-wrapper">
            <h1 class="title_deg"> All order</h1>
            <div style="padding-bottom: 20px;">
                <form action="{{ url('search') }}" method="GET">
                    <input type="text" name="search" style="color: black" placeholder="Search For Something">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>
            <table class="table_deg">
                <tr class="th_deg">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status </th>
                    <th>Image</th>
                    <th>Delivered</th>

                </tr>
                @forelse($order as $order)
                <tr>
                    
                    <th>{{ $order->name}}</th>
                    <th>{{ $order->email }}</th>
                    <th>{{ $order->address}}</th>
                    <th>{{ $order->phone}}</th>
                    <th>{{ $order->product_title}}</th>
                    <th>{{ $order->quantity}}</th>
                    <th>{{ $order->price}}</th>
                    <th>{{ $order->payment_status}}</th>
                    <th>{{ $order->delivery_status}}</th>
                    <th><img class="img_deg" src="/product/{{$order->image}}" alt=""></th>
                    <th>
                        @if($order->delivery_status=='processing')
                        <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('Are you sure this product is delivered !')" class="btn btn-success"> Delivered</a>
                        @else
                        <p style="color: green">Delivered</p>
                        @endif
                    </th>
                </tr>                    
                @empty
                <td colspan="16">
                    No Data Found
                </td>
                @endforelse
            </table>
        </div>
      </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    @include('admin.script')

  </body>
</html>