<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Product_category;
class VendorController extends Controller
{
    public function purchase_store()
    {
        $user = User::where('type','vendor')->get();
        $data['categories'] = Product_category::get(["productname","id"]);
        return view('purchase.create',$data,compact('user'));
    }  
    
    
    public function postPurchase(Request $request)
    {  
        $request->validate([
            'product_category_id' => 'required',
            'product_id'=>'required',
            'user_id'=>'required',
            'quantity'=>'required',
            'price' =>'required',
            'amount'=>'required',    
        ]);
        
        $data = $request->all();
        $check = $this->vendor_create($data);
         
        return redirect("purchase_list")->withSuccess('Great! You have Successfully added');
    }



    public function vendor_create(array $data)
    {
 
       Transaction::create([
        'date' =>Carbon::today(),
        'product_category_id' => $data['product_category_id'],
        'product_id' => $data['product_id'],
        'user_id' =>  $data['user_id'],
        'type' =>$data['type'],
        'quantity'=>$data['quantity'],
        'price'=>$data['price'],
        'amount'=>$data['amount']
      ]);
    
    }
    public function purchase_list()
    {
        $vendor = Transaction::where('type','purchase')->get();
        return view('purchase.purchase-list',compact('vendor'));
    }

    public function  purchase_edit($id)
    {   $user = User::where('type','vendor')->get();
        $product= Transaction::find($id);
        $data['categories'] = Product_category::get(["productname","id"]);
        return view('purchase.purchase-edit',$data,compact('product','user'));
    }
    public function purchase_updates(Request $request,Transaction $sale,$id)  
    {  
        $sale =Transaction::find($id);
        $sale->update($request->all());
        return redirect('purchase_list');
    }  

    public function purchase_destroy($id)  
    {  
        $sale=Transaction::find($id);  
        $sale->delete();  
        return redirect('purchase_list');
    }  



}
