<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <style>
    .center{
        text-align: center;
        margin: auto;
        width: 50%;
        border: 3px solid whitesmoke;
        margin-top: 10px;
    }
    .font_size{
        text-align: center;
        font-size: 40px;
        padding-bottom: 20px;
    }
    .img_size{
        width: 150px;
        height: 150px;
    }
    .th_color{
        color: aliceblue;
        background: rgb(122, 69, 171);
    }
    .th_deg{
    padding: 30px;
    }
    table,th,td
    {
      border: solid grey;
    }
    table,th,td
    {
      border: solid white;
    }
  </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('admin.header')
      
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
              @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session()->get('message') }}
                </div>
                @endif
                <table class="center">
                    <h2 class="font_size">All Product</h2>
                    <tr class="th_color">
                        <td class="th_deg">Product title</td>
                        <td class="th_deg">Description </td>
                        <td class="th_deg">Quantity</td>
                        <td class="th_deg">Category</td>
                        <td class="th_deg">Price</td>
                        <td class="th_deg">Discount Price</td>
                        <td class="th_deg">Product Image</td>
                        <td class="th_deg">Delete</td>
                        <td class="th_deg">Edit</td>
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td><img class="img_size" src="/product/{{ $product->image }}" alt=""></td>
                        <td> 
                          <a href="{{ url('delete_product',$product->id) }}" onclick="return confirm ('Are you sure delete this')" class="btn btn-danger">Delete</a>
                        </td>
                        <td>
                          <a href="{{ url('update_product',$product->id) }}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
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