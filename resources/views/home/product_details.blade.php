<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->  
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto;width: 50%;padding: 30px">
         
            <div class="img-box" style="padding: 20px;">
               <img src="product/{{$product->image }}" alt="">
            </div>
            <div class="detail-box">
               <h5>
                  {{ $product->title }}
               </h5>
                 @if($product->discount_price!=null)
                 <h6 style="color: red"> 
                    ${{$product->discount_price}}
                 </h6>
                 <h6 style="text-decoration: line-through; color: blue">
                    ${{ $product ->price}}
                 </h6>
               @else
               <h6 style="color: blue">
                 ${{$product->price }}
               </h6>
               @endif
               <h6>Product category: {{$product->category}}</h6>
               <h6>Product description: {{$product->description }}</h6>
               <h6>Available quantity: {{$product->quantity }}</h6>
               <form action="{{ url('add_cart',$product->id) }}" method="POST">
                @csrf
                   <div class="col-lg-4">
                      <input type="number" name="quantity" value="1" min="1" style="width: 100px" >
                   </div>
                   <div class="col-lg-4">
                     <button class="col-lg-4"><input type="submit" value="Add to cart">
                     </button>
                   </div>
                </div>
              </form>
            </div>
         </div>
      </div>  
      <!-- footer end -->
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>