@extends('backend.layouts.master_after_login')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Cars</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">All Cars</li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Cars Details</h3>

              <!-- <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
              <table id="example1" class="table table-head-fixed text-nowrap table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Car Code</th>
                    <th>Model</th>
                    <th>Numberplate</th>
                    <th>Engine Number</th>
                    <th>Damage rapport</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list_cars as $key=>$row)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$row->car_code}}</td>
                    <td>{{$row->model}}</td>
                    <td>{{$row->number_plate}}</td>
                    <td>{{$row->engine_no}}</td>
                    <td>{{$row->damage_report}}</td>

                    <td class="text-center"><a href="{{url('admin/view/car/'.$row->car_slug)}}" class="view"><i class="fas fa-eye"></i></a> | 
                      <a href="{{url('admin/edit/car/'.$row->car_slug)}}" class="edit"><i class="fas fa-user-edit"></i></a> | 
                      <a href="javascript:void(0);" class="dlte" onclick="deleteCar({{$row->id}})"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  @endforeach
                
                  
                </tbody>
              </table>
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
@section('script')
<div class="modal fade deleteCarModal" id="modal-sm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Are you sure?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete this item? This process cannot be undone.</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <form action="{{url('admin/delete/car')}}" method="post">
            @csrf
            <input type="hidden" name="car_id" value="" id="car_id">
           <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <script>
    function deleteCar(id)
    {
      console.log(id);
      $('#car_id').val(id);
      $('.deleteCarModal').modal('show');
    }
  </script>
@endsection