@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Customer Edit</div>
                  <div class="card-body">
                <form action="{{ route('customer_updates',$user->id)}}" method="POST">
                @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" required  value="{{ $user->name }}" >
                                  
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus value="{{ $user->email }}">
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required  value="{{ $user->password }}">
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="address" onKeyPress class="form-control" name="address" autofocus required value="{{ $user->address}}">
                                
                                
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-6">
                                  <input type="hidden" id="type" class="form-control" name="type" value="customers" required value="{{ $user->type }}">
                              </div>
                          </div>





                          <div class="form-group row">
                              <!-- <label for="Active" class="col-md-4 col-form-label text-md-right">Active or Not</label> -->
                              <div class="col-md-6">
                               <input type="hidden" id="active" name="active" value="1">
                               <label for="html"></label><br>
                              
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