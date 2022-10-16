<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        return view('auth.customer-register');
    }
    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'address' => 'required',
            'active' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->creates($data);
         
        return redirect("customers")->withSuccess('Great! You have Successfully added');
    }
    public function creates(array $data)
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
    public function index()
    {
        $customer = User::where('type','customers')->get();
        return view('customers-list', compact('customer'));
    }
    public function edit($id)
    {
        $user= User::find($id);
        return view('auth.customer-edit',compact('user'));
    }
    
    public function update(Request $request,$id)  
    {  
        $user = User::find($id);  
        $user->name =  $request->input('name');  
        $user->email = $request->input('email');  
        $user->address= $request->input('address');
        $user->type = $request->input('type');  
        $user->active = $request->input('active');  
        $user->password = $request->input('password'); 
        $user->save();  
        return redirect('customers');
    }  

    public function destroy(User $user)  
    {     
        $user=User::find($user); 
        $user->delete(); 
        return redirect('customers');
    } 
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return redirect('customers');
    }
    public function show($id)
    {
        //
    }
}
