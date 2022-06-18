@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">User Profile</li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-3">
               <!-- Profile Image -->
               <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                     <div class="text-center">
                        @if(empty(auth()->user()->image))
                        <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('assets/backend/images/user.png')}}"
                           alt="User profile picture" id="imgPreview">
                        @elseif(!empty(auth()->user()->image))
                        <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('assets/backend/images/'.auth()->user()->image)}}"
                           alt="User profile picture" id="imgPreview">
                        @endif
                     </div>
                     <h3 class="profile-username text-center">{{auth()->user()->first_name}}  {{auth()->user()->last_name}}</h3>
                     <p class="text-muted text-center">Admin</p>
                     <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                           <b>Email</b> <a class="float-right">{{auth()->user()->email}}</a>
                        </li>
                        <li class="list-group-item">
                           <b>Contact No</b> <a class="float-right">{{auth()->user()->phone}}</a>
                        </li>
                        <li class="list-group-item overflow-hidden">
                           <b>Address</b> <p>{{auth()->user()->address}}</p>
                        </li>
                     </ul>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
               <div class="card">
                  <div class="card-header p-2">
                     <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#change_password" data-toggle="tab">Change Password</a></li>
                        <li class="nav-item "><a class="nav-link " href="#settings" data-toggle="tab">Settings</a></li>
                     </ul>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="settings">
                           <form class="form-horizontal" action="{{url('/admin/profile')}}" method="post"  enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                 <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Enter the first Name" name="first_name" value="{{auth()->user()->first_name}}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputName2" class="col-sm-2 col-form-label">Last Name</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Enter the last Name" name="last_name" value="{{auth()->user()->last_name}}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                 <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Enter the email" name="email" value="{{auth()->user()->email}}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail" placeholder="Enter the Phone no" name="phone" value="{{auth()->user()->phone}}">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail" class="col-sm-2 col-form-label">Image</label>
                                 <div class="col-sm-10">
                                    <input type="file" class="form-control" id="picture" name="image">
                                    <input type="hidden" name="hidden_image" value="{{auth()->user()->image}}">
                                 </div>
                              </div>
                              
                              <div class="form-group row">
                                 <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                                 <div class="col-sm-10">
                                    <textarea  class="form-control" id="inputEmail" placeholder="Enter the Address" name="address">{{auth()->user()->address}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane active" id="change_password">
                           <form class="form-horizontal">
                              <div class="form-group row">
                                 <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                 <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputName" placeholder="Old Password">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                                 <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputEmail" placeholder="New Password">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
                                 <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputEmail" placeholder="Confirm Password">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <!-- /.tab-pane -->
                     </div>
                     <!-- /.tab-content -->
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script>
   $(document).ready(()=>{
         $('#picture').change(function(){
           const file = this.files[0];
           console.log(file);
           if (file)
            {
             let reader = new FileReader();
             reader.onload = function(event){
               console.log(event.target.result);
   
               $('#imgPreview').attr('src', event.target.result);
             }
             reader.readAsDataURL(file);
            }
         });
   });
</script>
@endsection