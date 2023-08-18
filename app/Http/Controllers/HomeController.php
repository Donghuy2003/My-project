<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //The "index" method gets a list of products, 3 products per page. 
    // The product data is passed to the view for display on the home page.
    // The above code does the fetching and displaying the paginated product list on the homepage.
    public function index(){
        $product=Product::paginate(3);
        return view('home.homepage', compact('product'));
    }
// Get current user data and check their role (user type)
// If the role is '1' (an admin), do the following to display the admin page:
// Get total products, total orders, and total users:
// Get all orders and calculate the total revenue from orders:
// Get the total number of orders shipped and in progress:
// Returns the view 'admin. home' with the variables passed to display information on the admin interface:
// If the role is not '1' i.e. the user is not admin, get the pagination list of products (3 products per page) and return the view 'home. homepage'
// In a nutshell, this code defines how to navigate users to the respective pages based on their role. If the user is an admin, they will see an admin page with infor-mation about products, orders, users, and revenue. 
// Otherwise, other users will see the main page with a paginated list of products.
    public function redirect(){

        $usertype= Auth::user()->usertype;

        if ($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();
            $total_revenue=0;
            foreach($order as $order){
                $total_revenue=$total_revenue+$order->price;

            }
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count(); 
            $total_processing=order::where('delivery_status','=','processing')->get()->count(); 
            return view('admin.home', compact('total_product','total_order','total_user','total_revenue',
            'total_delivered','total_processing'));
        }
        else {
            $product=Product::paginate(3);
            return view('home.homepage',compact('product'));
        }
    }
    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    // 
    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user=Auth::user();
            $product= product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            if($product->discount_price!=null){
            $cart->price=$product->discount_price * $request->quantity;
            }
            else{
                $cart->price=$product->price * $request->quantity;
            }

            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function show_cart(){
        if(Auth::id()){
            $id= Auth::user()->id;
            $cart= cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }
        else{
            return redirect('login');
        } 
    }

    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();

    }
    // public function cash_order(): This method is used to process the order and cre-ate an order for each product in the user's cart:
    //     Get logged-in user information:
    //     Get all products in the user's cart based on user_id:
    //     Browse through each product in the cart and create an order object to store or-der information:
    //     Redirect the user back to the previous page (usually the cart page) and display a message about the successful order:
    //     In a nutshell, this code does the creation of an order from the products in the user's cart and uses the "cash on delivery" payment method. After a successful order is placed, it removes the ordered products from the cart and notifies the user of the suc-cessful order.
        
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order= new order;
            $order->name =$data->name;
            $order->email =$data->email;
            $order->phone =$data->phone;
            $order->address =$data->address;
            $order->user_id =$data->user_id;
            $order->product_title =$data->product_title;
            $order->price =$data->price;
            $order->quantity =$data->quantity;
            $order->image =$data->image;
            $order->product_id =$data->product_id;
            $order->payment_status='cash on delivery';
            $order->delivery_status='processing';

            $order->save();
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','We have Received your Order. We will connect with you soon....');
    }

    public function show_order(){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }

    public function cancel_order($id){
        $order=order::find($id);
        $order->delivery_status='You canceled the order';
        $order->save();
        return redirect()->back();
    }

}
