<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .design{
            padding-bottom: 15px;

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
      
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  {{ session()->get('message') }}
                </div>
                @endif
            <div class="center">
                    <h1 class="font_size">Add Product</h1>
                <div class="design">
                <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Product Title :</label>
                    <input type="text" class="text_color" name="title" placeholder="Write a title" required="">
                </div>
                <div class="design">
                    <label for="">Product Description :</label>
                    <input type="text" class="text_color" name="description" required="" placeholder="Write a description">
                </div>
                <div class="design">
                    <label for="">Product Price :</label>
                    <input type="number" class="text_color" name="price" placeholder="Write a price" required="">
                </div>
                <div class="design">
                    <label for="">Discount Price :</label>
                    <input type="number" class="text_color" name="dis_price" placeholder="Write a Discount is apply">
                </div>
                <div class="design">
                    <label for="">Product Quantity :</label>
                    <input type="number" min="0" class="text_color" name="quantity" placeholder="Write a Quantity" required="">
                </div>
                <div class="design">
                    <label for="">Product Category :</label>
                    <select class="text_color" name="category" id="" required="">
                        <option value="" selected="">Add a category here</option>
                        @foreach($category as $category)
                        <option value="{{  $category-> category_name}}">{{  $category-> category_name}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="design">
                    <label for="">Product Image Here:</label>
                    <input type="file"  name="image" required="">
                </div>
                <div class="design">
                    <input type="submit" value="Add Product" class="btn btn-primary"> 
                </div>
            </form>
            </div>
                
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