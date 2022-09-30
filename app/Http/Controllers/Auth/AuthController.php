<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Product_category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.customer-login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.customer-register');
    }
    public function vendor_registration()
    {
        return view('auth.vendor-register');
    } 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */

    
    public function postVendorRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'active' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("vendor-list")->withSuccess('Great! You have Successfully added');
    }
    
     public function postCustomerRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'active' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("customers-list")->withSuccess('Great! You have Successfully added');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'address' => $data['address'],
        'active' => $data['active'],
        'type'   =>$data['type'],
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
    public function customers_list()
    {
        $customer = User::where('type','customers')->get();
        return view('customers-list', compact('customer'));
    }
    public function vendor_list()
    {
        $vendor = User::where('type','vendor')->get();
        return view('vendor-list', compact('vendor'));
    }
    
    public function vendor_edit($id)
    {
        $user= User::find($id);
        return view('auth.vendor-edit',compact('user'));
    }
    public function vendor_update(Request $request,$id)  
    {  
        $user = User::find($id);  
        $user->name =  $request->input('name');  
        $user->email = $request->input('email');  
        $user->address= $request->input('address');
        $user->type = $request->input('type');  
        $user->active = $request->input('active');  
        $user->password = $request->input('password'); 
        $user->save();  
        return redirect('vendor-list');
    }  
    public function vendor_destroy($id)  
    {  
        $user=User::find($id);  
        $user->delete();  
        return redirect('vendor-list');
    }  
    public function customer_edit($id)
    {
        $user= User::find($id);
        return view('auth.customer-edit',compact('user'));
    }
    
    public function customer_updates(Request $request,$id)  
    {  
        $user = User::find($id);  
        $user->name =  $request->input('name');  
        $user->email = $request->input('email');  
        $user->address= $request->input('address');
        $user->type = $request->input('type');  
        $user->active = $request->input('active');  
        $user->password = $request->input('password'); 
        $user->save();  
        return redirect('customers-list');
    }  

    public function customer_destroy($id)  
    {  
        $user=User::find($id);  
        $user->delete();  
        return redirect('customers-list');
    }  
    

    public function product_category()
    {
        return view('auth.category');
    }  
    
    public function postCategory(Request $request)
    {  
        $request->validate([
            'productname' => 'required',
            'description'=>'required',
            'active' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->category_create($data);
         
        return redirect("category-list")->withSuccess('Great! You have Successfully added');
    }



    public function category_create(array $data)
    {
 
       Product_category::create([
        'productname' => $data['productname'],
        'description' => $data['description'],
        'active'      =>  $data['active'],
      ]);
    }
    
    public function category_list()
    {
        $category = Product_category::all();
        return view('auth.category-list', compact('category'));
    }

    public function category_edit($id)
    {
        $user= Product_category::find($id);
        return view('auth.category-edit',compact('user'));
    }
    
    public function category_updates(Request $request,$id)  
    {  
        $user = Product_category::find($id);  
        $user->productname =  $request->input('productname');   
        $user->description= $request->input('description');
        $user->active = $request->input('active');  
        $user->save();  
        return redirect('category-list');
    }  

    public function category_destroy($id)  
    {  
        $user=Product_category::find($id);  
        $user->delete();  
        return redirect('category-list');
    }  
   


}
