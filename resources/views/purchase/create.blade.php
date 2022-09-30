@extends('layout')
<meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Vendor </div>
                  <div class="card-body">
  
                      <form action="/postPurchase"  method="POST" >
                         @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
                              <div class="col-md-6">
                                  <div class="form-group mb-3">
                                    <select  id="user_id" name="user_id" class="form-control">
                                        @foreach($user as $data)
                                        <option value="{{$data->id}}"> {{$data->name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Product Category</label>
                              <div class="col-md-6">
                                  <div class="form-group mb-3">
                                    <select  id="category-dd" name="product_category_id" class="form-control">
                                       <option value="">Select Category</option>
                                       @foreach ($categories as $data)
                                       <option value="{{$data->id}}">
                                       {{$data->productname}}
                                       </option>
                                    @endforeach
                                    </select>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Product</label>
                              <div class="col-md-6">
                                  <div class="form-group mb-3">
                                  <select id="product-dd" name="product_id" class="form-control">
                                  </select>
                                  </div>
                              </div>
                          </div>
                         
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Price</label>
                              <div class="col-md-6">
                              <div class="form-group mb-3">
                                  <input id="price-dd" name="price" class="form-control" type="text">
                                  </select> 
                                  
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Quantity</label>
                              <div class="col-md-6">
                                  <input type="text" class="form-control" name="quantity" id="quantity_id" required >
                                  @if ($errors->has('saleprice'))
                                      <span class="text-danger">{{ $errors->first('saleprice') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Amount</label>
                              <div class="col-md-6">
                                  <input type="text" id="amount"  class="form-control" name="amount" required >
                                  @if ($errors->has('amount'))
                                      <span class="text-danger">{{ $errors->first('amount') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                             
                               <input type="hidden" id="type" name="type" value="purchase">
                              
                              </div>
                          </div>
                          
                        
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Submit
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#category-dd').on('change', function () {
                var product_category_id = this.value;
                $("#product-dd").html('');
                $.ajax({
                    url: "{{url('/fetch-products')}}",
                    type: "POST",
                    data: {
                        product_category_id: product_category_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#product-dd').html('<option value="">Select Product</option>');
                        $.each(result.products, function (key, value) {
                            $("#product-dd").append('<option value="' + value
                                .product_category_id + '">' + value.product + '</option>');
                        });
                        $('#price-dd').html('');
                    }
                });
            });
            $('#product-dd').on('click', function () {
                var product_category_id = this.value;
                $("#price-dd").val();
                $.ajax({
                    url: "{{url('/fetchVendorPrice')}}",
                    type: "POST",
                    data: {
                        product_category_id: product_category_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#price-dd').val();
                        $.each(res.prices, function (key, value) {
                        //     $("#price-dd").append('<option value="' + value
                        //    .product_category_id + '">' + value.sale_price + '</option>');
                           $("#price-dd").val(value.vendor_price);
                           
                        });
                      
                    }
                });
            });


            $("#quantity_id").keyup(function(){
                
          
             var qty= $(this).val();

            if (qty){
                
            var price=$("#price-dd").val();
            var amt= qty * price;
            $("#amount").val(amt);
        }
    }); 

    });
</script>

        






