@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Product </div>
                  <div class="card-body">
  
                      <form action="{{route('product_updates',$product->id)}}" method="POST">
                         @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Category</label>
                              <div class="col-md-6">
                                 
                             
                                    <select  id="country-dropdown" name="product_category_id" class="form-control">
                                        <option value="">-- Select Category --</option>
                                         @foreach ($datas  as $item)
                                        <option  value="{{$item->id}}"{{($item->id == $product->product_category_id) ? "selected":""}}>{{$item->productname}}</option>
                                        
                                        
                                         </option>
                                        @endforeach
                                    </select>
                                





                              </div>
                          </div>

                         
                          <div class="form-group row">
                              <label for="address" class="col-md-4 col-form-label text-md-right">Product Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="product" class="form-control" name="product" required value="{{ $product->product}}">
            
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Vendor Price</label>
                              <div class="col-md-6">
                                  <input type="text" id="vendor_price" class="form-control" name="vendor_price" required autofocus value="{{ $product->vendor_price}}">
                                  @if ($errors->has('vendorprice'))
                                      <span class="text-danger">{{ $errors->first('vendorprice') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Sale Price</label>
                              <div class="col-md-6">
                                  <input type="text" id="sale_price" class="form-control" name="sale_price" required autofocus value="{{ $product->sale_price}}">
                                  @if ($errors->has('saleprice'))
                                      <span class="text-danger">{{ $errors->first('saleprice') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="Active" class="col-md-4 col-form-label text-md-right">Active or Not</label>
                              <div class="col-md-6">
                               <input type="radio" id="active" name="active" value="1">
                               <label for="html">Yes</label><br>
                               <input type="radio" id="active" name="active" value="0">
                               <label for="css">No</label><br>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                              <div class="col-md-6">
                                  <input type="text" id="description" class="form-control" name="description" required autofocus value="{{ $product->description}}">
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection