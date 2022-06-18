@extends('backend.layouts.master_after_login')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Car</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">Add Car</li>
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
          <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">New Car</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('admin/add/car')}}" method="post">
          @csrf
          <div class="card-body border-full">
            <div class="card-heading">
              <h3 class="card-title"><i class="fa fa-car"></i> Car Information</h3>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="carcode">Car Code</label>
                  <input type="text" class="form-control" id="carcode" placeholder="Enter Car Code" name="car_code" required>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="marque">Marque</label>
                  <input type="text" class="form-control" id="marque" placeholder="Enter Marque" name="marque" required>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="age">Age condition</label>
                  <input type="number" class="form-control" id="age" placeholder="Enter Age condition" name="age_condition" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="model">Model</label>
                  <input type="text" class="form-control" id="model" placeholder="Enter Model" name="model" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="numberplate">Numberplate</label>
                  <input type="text" class="form-control" id="numberplate" placeholder="Enter Numberplate" name="number_plate" required>
                </div>
              </div>
              

              <div class="col-md-3">
                <div class="form-group">
                  <label for="cnum">Classis Number</label>
                  <input type="text" class="form-control" id="cnum" placeholder="Enter Classis Number" name="classis_no" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="enum">Engine Number</label>
                  <input type="text" class="form-control" id="enum" placeholder="Enter Engine Number" name="engine_no" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="license">License condition</label>
                  <input type="number" class="form-control" id="license" placeholder="Enter License condition" name="license_condition" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="rapport">Damage rapport</label>
                  <input type="text" class="form-control" id="rapport" placeholder="Damage rapport" name="damage_report" required>
                </div>
              </div>
            </div>       
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{url('admin/list/cars')}}" class="btn btn-default">Cancel</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
        </div>
      </div>

    </section>
    
  </div>
  <!-- /.content-wrapper -->
@endsection