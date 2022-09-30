<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Product_category;
use App\Models\Transaction;


use DB;
class ProductController extends Controller
{
    public function product_store()
    {
        $product= Product_category::all();
        return view('product.products',compact('product'));
    }  
    
    public function postProduct(Request $request)
    {  
        $request->validate([
            'product_category_id' => 'required',
            'product'=>'required',
            'vendor_price' => 'required',
            'sale_price' =>'required',
            'description'=>'required',
            'active'   =>'required',
        ]);
           
        $data = $request->all();
        $check = $this->product_create($data);
         
        return redirect("product_list")->withSuccess('Great! You have Successfully added');
    }



    public function product_create(array $data)
    {
 
       Product::create([
        'product_category_id' => $data['product_category_id'],
        'product' => $data['product'],
        'vendor_price' =>  $data['vendor_price'],
        'sale_price' =>$data['sale_price'],
        'description'=>$data['description'],
        'active'=>$data['active'],
      ]);
    }
    public function product_list()
    {
        $product = Product::all();
        return view('product.products-list', compact('product'));
    }
    public function product_edit($id)
    {
        $datas =Product_category::get();
        $product= Product::find($id);
        return view('product.products-edit',compact('product','datas'));
    }
    public function product_updates(Request $request,$id)  
    {  
        $product =Product::find($id);  
        $product->product_category_id =  $request->input('product_category_id');   
        $product->product= $request->input('product');
        $product->vendor_price = $request->input('vendor_price'); 
        $product->sale_price = $request->input('sale_price');
        $product->description= $request->input('description');
        $product->active= $request->input('active');
        $product->save();  
        return redirect('product_list');
    }  
    public function product_destroy($id)  
    {  
        $product=Product::find($id);  
        $product->delete();  
        return redirect('product_list');
    }  

    // public function getProduct($product_category_id=0){

    //     // Fetch Employees by Departmentid
    //     $productData['data'] = Product::orderby("productname","asc")
    //        ->select('product_category_id','product_category_id')
    //        ->where('product_category_id',$product_category_id)
    //        ->get();
   
    //     return response()->json($productData);
   
    //   }

      public function fetchProduct(Request $request)
      {   
         
          $data['products'] = Product::where("product_category_id",$request->product_category_id)->get(["product", "id","product_category_id"]);
          return response()->json($data);
      }
      public function fetchPrice(Request $request)
      {   
         $request->product_category_id;
          $data['prices'] = Product::where("product_category_id",$request->product_category_id)->get(["sale_price", "id"]);
          return response()->json($data);
      }
      public function fetchVendorPrice(Request $request)
      {   
         $request->product_category_id;
          $data['prices'] = Product::where("product_category_id",$request->product_category_id)->get(["vendor_price", "id"]);
          return response()->json($data);
      }



      public function report()
    {
        return view('Report.report');
    } 

    // function fetch_data(Request $request)
    // {
    //  if($request->ajax())
    //  {
    //   if($request->from_date != '' && $request->to_date != '')
    //   {
    //    $data = Transaction::whereBetween('date', array($request->from_date, $request->to_date))
    //                     ->get();         

    //     // $sumofSale = Transaction::whereBetween('date', array($request->from_date, $request->to_date))->where('type','sale')
    //     // ->sum('amount');
    //     // $sumofPurchase= Transaction::whereBetween('date', array($request->from_date, $request->to_date))->where('type','purchase')
    //     // ->sum('amount');
    //   }
    // else
    //   {
    //    $data = DB::table('transactions')->orderBy('date', 'desc')->get();
    //   }
    //   echo json_encode($data);
    //  }
    // }
    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
       $data = DB::table('transactions')
         ->whereBetween('date', array($request->from_date, $request->to_date))
         ->get();
          $sumofSale = DB::table('transactions')->whereBetween('date', array($request->from_date, $request->to_date))->where('type','sales')
          ->sum('amount');
          $sumofPurchase= DB::table('transactions')->whereBetween('date', array($request->from_date, $request->to_date))->where('type','purchase')
         ->sum('amount');
         
      }
      else
      
      {
        
       $data = DB::table('transactions')->orderBy('date', 'desc')->get();
      }
      return json_encode(array('data'=>$data,'sum'=>$sumofPurchase,'sumsale'=>$sumofSale));
    //   return json_encode($data,$sumofSale,$sumofPurchase);
    echo json_encode($data,$sumofPurchase,$sumofSale);
     }
    }
}
