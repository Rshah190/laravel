@extends('backend.layouts.master_after_login')
@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>List</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Sellers/Buyers</li>
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
            <div class="col-12">
              
               <!-- /.card -->
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">List of Sellers/Buyers</h3>
                  </div>
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                           <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Email(s)</th>
                              <th>Phone</th>
                              <th>Shop</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$row)
                           <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$row->first_name}}  {{$row->last_name}}</td>
                              <td>{{$row->email}}
                              </td>
                              <td>{{$row->phone}}</td>
                              @if($row->is_shop ==1)
                              <td>Yes</td>
                              @elseif($row->is_shop ==0)
                              <td>No</td>
                              @endif
                              <td>
                                 <a><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                                 @if($row->status ==0)
                                 <a href="javascript:void(0);" onclick="BlockUnblockUser({{$row->id}},1);"><i class="fa fa-lock text-warning" aria-hidden="true"></i></a>
                                 @elseif($row->status==1)
                                 <a href="javascript:void(0);" onclick="BlockUnblockUser({{$row->id}},0);"><i class="fa fa-unlock-alt" aria-hidden="true"></i></a>
                                 @endif
                                 <a href="javascript:void(0);" onclick="deleteUser({{$row->id}});"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                              </td>
                           </tr>
                        @endforeach

                        </tbody>
                        
                     </table>
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
@endsection
