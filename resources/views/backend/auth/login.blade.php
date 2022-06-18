@extends('backend.layouts.master_before_login')
@section('content')
<div class="card-header text-center">
    <a href="#" class="h1"><b>Login</b>Panel</a>
</div>
<div class="card-body">
   <form action="{{url('admin/login')}}" method="post">
      @csrf
      <div class="input-group mb-3">
         <input type="email" class="form-control" placeholder="Email" name="email">
         <div class="input-group-append">
            <div class="input-group-text">
               <span class="fas fa-envelope"></span>
            </div>
         </div>
      </div>
      <div class="input-group mb-3">
         <input type="password" class="form-control" placeholder="Password" name="password">
         <div class="input-group-append">
            <div class="input-group-text">
               <span class="fas fa-lock"></span>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-8">
            <div class="icheck-primary">
               <input type="checkbox" id="remember" name="remember_password">
               <label for="remember">
               Remember Me
               </label>
            </div>
         </div>
         <!-- /.col -->
         <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
         </div>
         <!-- /.col -->
      </div>
   </form>
   <p class="mb-1">
      <a href="{{url('admin/forgot/password')}}">I forgot my password</a>
   </p>
</div>
@endsection