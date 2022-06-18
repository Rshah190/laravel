@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Client Details</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Client Details</li>
               </ol>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card mb-3">
               <div class="card-header position-relative min-vh-25 mb-5">
                  <div class="bg-holder rounded-3 rounded-bottom-0"
                     style="background-image:url('assets/backend/dist/img/profile-bg.jpg');"></div>
                  <!--/.bg-holder-->
                  <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                     src="{{asset('assets/backend/dist/img/profile.jpg')}}" width="200" alt=""></div>
               </div>
               <div class="card-body">
                  <div class="row align-items-end">
                     <div class="col-lg-8">
                        <h4 class="mb-1"> {{$client->first_name}}  {{$client->last_name}}</h4>
                        <!-- <h5 class="fs-0 fw-normal">Senior Software Engineer at Infoicon</h5> -->
                        <p class="text-500">{{$client->city}}, {{$client->name}}</p>
                        <div class="border-dashed-bottom my-4 d-lg-none"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <!-- About Me Box -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Address Information </h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <strong><i class="fas fa-building mr-1"></i> Street</strong>
                  <p class="text-muted">
                     {{$client->street}}
                  </p>
                  <hr>
                  <strong><i class="fas fa-building mr-1"></i> House Number</strong>
                  <p class="text-muted">
                    {{$client->house_no}}
                  </p>
                  <hr>
                  <strong><i class="fas fa-building mr-1"></i> Bus Number</strong>
                  <p class="text-muted">
                     {{$client->bus_no}}
                  </p>
                  <hr>
                  <strong><i class="fas fa-building mr-1"></i> Zipcode</strong>
                  <p class="text-muted">{{$client->zipcode}}</p>
                  <hr>
                  
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <div class="col-md-6">
            <!-- About Me Box -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">Company Information </h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body">
                  <strong><i class="fas fa-building mr-1"></i> Company Name</strong>
                  <p class="text-muted">
                     {{$client->company_name}}
                  </p>
                  <hr>
                  <strong><i class="fas fa-building mr-1"></i> Vat Number</strong>
                  <p class="text-muted">
                     {{$client->vat_no}}
                  </p>
                  <hr>
                  
                  <strong><i class="fas fa-building mr-1"></i> Terms of Payment</strong>
                  <p class="text-muted">{{$client->terms_of_payment}} days</p>
                  <hr>
                  <strong><i class="fas fa-phone mr-1"></i> Contact No.</strong>
                  <p class="text-muted">{{$client->contact_no}}</p>
                  <hr>
                  
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         
      </div>
   </section>
</div>
<!-- /.content-wrapper -->
@endsection