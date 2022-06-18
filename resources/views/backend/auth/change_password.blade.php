@extends('backend.layouts.master_before_login')
@section('content')
<div class="card-header text-center">
      <a href="#" class="h1"><b>Change</b>Password</a>
</div>
<div class="card-body">
   <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
   <form action="{{url('admin/change/password/'.$id)}}" method="post">
       @csrf
      <div class="input-group mb-3">
         <input type="password" class="form-control" placeholder="Password" name="password">
         <div class="input-group-append">
            <div class="input-group-text">
               <span class="fas fa-lock"></span>
            </div>
         </div>
      </div>
      <div class="input-group mb-3">
         <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
         <div class="input-group-append">
            <div class="input-group-text">
               <span class="fas fa-lock"></span>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
         </div>
         <!-- /.col -->
      </div>
   </form>
   <p class="mt-3 mb-1">
      <a href="login.html">Login</a>
   </p>
</div>
@endsection