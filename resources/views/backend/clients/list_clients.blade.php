@extends('backend.layouts.master_after_login')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Clients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">All Clients</li>
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
              <h3 class="card-title">All Clients Details</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 500px;">
              <table id="example1"  class="table table-head-fixed text-nowrap table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact No</th>
                    <th>License No</th>
                    <th>Country</th>
                    <th>VAT Number</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list_clients as $key=>$row)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$row->first_name}} {{$row->last_name}}</td>
                    <td>{{$row->contact_no}}</td>
                    <td>{{$row->license_no}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->vat_no}}</td>
                    <td class="text-center"><a href="{{url('admin/view/client/'.$row->client_slug)}}" class="view"><i class="fas fa-eye"></i></a> | 
                      <a href="{{url('admin/edit/client/'.$row->client_slug)}}" class="edit"><i class="fas fa-user-edit"></i></a> | 
                      <a href="javascript:void(0);" class="dlte" onclick="deleteClient({{$row->id}})"><i class="fas fa-trash-alt"></i></a></td>
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
<div class="modal fade" id="modal-sm" style="display: none;" aria-hidden="true">
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
          <form action="{{url('admin/delete/client')}}" method="post">
            @csrf
            <input type="hidden" name="client_id" value="" id="client_id">
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
  function deleteClient(id)
  {
    console.log(id);
    $('#modal-sm').modal('show');
    $('#client_id').val(id);


  }
</script>
@endsection