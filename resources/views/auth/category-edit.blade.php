@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Category </div>
                  <div class="card-body">
  
                      <form action="{{route('category-update',$user->id)}}" method="POST">

                      @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="productname" class="form-control" name="productname" required autofocus value="{{ $user->productname }}">
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                         
                          <div class="form-group row">
                              <label for="address" class="col-md-4 col-form-label text-md-right">Description</label>
                              <div class="col-md-6">
                                  <input type="text" id="description" class="form-control" name="description" required value="{{ $user->description }}">
                                  
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