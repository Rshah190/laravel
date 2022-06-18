@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Car Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Car Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header position-relative min-vh-25 mb-5">
              <div class="bg-holder rounded-3 rounded-bottom-0"
                style="background-image:url('dist/img/car-bg.jpg');"></div>
              <!--/.bg-holder-->
              <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                  src="{{asset('assets/backend/car.jpg')}}" width="200" alt=""></div>
            </div>
            <div class="card-body">
              <div class="row align-items-end">
                <div class="col-lg-8">
                  <h4 class="mb-1">{{$car_details->marque}}</h4>
                  <h5 class="fs-0 fw-normal">{{$car_details->car_code}}</h5>
                  
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
              <h3 class="card-title">Car Details</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <strong><i class="fas fa-qrcode mr-1"></i> Car Code</strong>

<p class="text-muted">
{{$car_details->car_code}}
</p>

<hr>

<strong><i class="fas fa-car-alt mr-1"></i> Marque</strong>

<p class="text-muted">
  {{$car_details->marque}}
</p>

<hr>


<strong><i class="fas fa-car mr-1"></i> Model</strong>

<p class="text-muted">{{$car_details->model}}</p>

<hr>

<strong><i class="far fa-id-badge mr-1"></i> Numberplate</strong>

<p class="text-muted">{{$car_details->number_plate}}</p>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <!-- About Me Box -->
          <div class="card card-primary">
            
            <!-- /.card-header -->
            <div class="card-body">
            

              <strong><i class="fas fa-fan mr-1"></i> Age condition</strong>

              <p class="text-muted">{{$car_details->age_condition}}</p>

              <hr>

              <strong><i class="far fa-file-alt mr-1"></i> Classis Number</strong>

              <p class="text-muted">{{$car_details->classis_number}}</p>

              <hr>

              <strong><i class="fas fa-file-alt mr-1"></i> Engine Number</strong>

              <p class="text-muted">{{$car_details->engine_no}}</p>

              <hr>

              <strong><i class="fas fa-file-alt mr-1"></i> License condition</strong>

              <p class="text-muted">{{$car_details->license_condition}}</p>

              <hr>

              <strong><i class="fas fa-file-alt mr-1"></i> Damage rapport</strong>

              <p class="text-muted">{{$car_details->damage_report}}</p>
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