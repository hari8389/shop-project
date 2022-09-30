<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Product_category;
class SalesController extends Controller
{
    public function sales_store()
    {
        $user = User::where('type','customers')->get();
        $data['categories'] = Product_category::get(["productname","id"]);
        return view('sales.create',$data,compact('user'));
    }  
    
    
    public function postSale(Request $request)
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
        $check = $this->sale_create($data);
         
        return redirect("sales.sales-list")->withSuccess('Great! You have Successfully added');
    }



    public function sale_create(array $data)
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
    public function sale_list()
    {
     
        $sale = Transaction::where('type','sales')->get();
        return view('sales.sales-list',compact('sale'));
    }

    public function  sales_edit($id)
    {   $user = User::where('type','customers')->get();
        $product= Transaction::find($id);
        $data['categories'] = Product_category::get(["productname","id"]);
        return view('sales.sales-edit',$data,compact('product','user'));
    }
    public function sales_updates(Request $request,Transaction $sale,$id)  
    {  
        $sale =Transaction::find($id);
        $sale->update($request->all());
        return redirect('sales_list');
    }  

    public function sales_destroy($id)  
    {  
        $sale=Transaction::find($id);  
        $sale->delete();  
        return redirect('sales_list');
    }  




}
