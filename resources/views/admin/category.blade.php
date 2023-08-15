<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
  </head>
  <style type="text/css">
  .center{
    text-align: center;
    padding: 10px;
    font-size:40px;
  }
  .inputcolor{
    color: black  
  }
  .center_form{
    line-height: 50px;
    width: 50%;
    margin: auto;
    margin-top: 15px;
    text-align: center;
    border: 3px solid white;
  }
  .tb_color{
    background: seagreen;
    color: aliceblue;
  }
  table,th,td{
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
              <div class="center">
              <h2>Add Category</h2>
              <form style="padding: 40px" action="{{url('/add_category')}}" method="POST">
                @csrf
                <input type="text" name="category" class="inputcolor" placeholder="Please enter category">
                <input type="submit" name="submit" class="btn btn-success btn-fw" value="Add Now">
              </form>
              </div>
              <table class="center_form">
                <td class="tb_color">Category Name</td>
                <td class="tb_color">Action</td>
                @foreach ($data as $data)
                    
                <tr>
                  <td >{{$data->category_name }}</td>
                  <td><a onclick="return confirm('Are you sure to delete')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
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