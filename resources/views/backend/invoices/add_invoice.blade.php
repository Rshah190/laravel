@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"> New Invoice</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Invoice</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">New Invoice</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{url('admin/add/invoice')}}" method="post">
                  @csrf
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-user"></i> Invoice Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="name">Client <span>*</span></label>
                              <select name="client"  class="form-control" id="client_id" onchange="ChangeClient()">
                                 <option value="" selected disabled hidden>Choose Client</option>
                                 @foreach($data['clients'] as $client_row)
                                 <option value="{{$client_row->id}}">{{$client_row->first_name}} {{$client_row->last_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Car <span>*</span></label>
                              <select name="car"  class="form-control" onchange="ChangeCar()" id="car_id">
                                 <option value="" selected disabled hidden>Choose Client</option>
                                 @foreach($data['cars'] as $car_row)
                                 <option value="{{$car_row->id}}">{{$car_row->model}} ({{$car_row->car_code}})</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Damage Report <span>*</span></label>
                              <select name="damage_report"  class="form-control" id="damage_id">
                                 <option value="" selected disabled hidden>Choose Damage Report</option>
                              </select>
                           </div>
                        </div>
                        <div id="damage_error"></div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Contract Number <span>*</span></label>
                              <select name="contract"  class="form-control" id="contract_id" onchange="ChangeContract()">
                                 <option value="" selected disabled hidden>Choose Contract</option>
                              </select>
                           </div>
                        </div>
                     
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Invoice Amount <span>*</span></label>
                              <input type="number" class="form-control" id="ldate" placeholder="Enter Invoice amount" name="invoice_amount">

                           </div>
                        </div>
                        <div class="col-md-3" id="contract_amount_display">
                           <div class="form-group">
                              <label for="lname">Contract Amount <span>*</span></label>
                              <input type="number" class="form-control" id="contract_amount" placeholder="Enter Contract amount" name="contract_amount" readonly>

                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Status <span>*</span></label>
                              <select name="status"  class="form-control" >
                                 <option value="" selected disabled hidden>Choose Status</option>
                                 <option value="1">Active</option>
                                 <option value="0">Inactive</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <a href="{{url('admin/list/invoices')}}"  class="btn btn-default">Cancel</a>
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
@section('script')
<script>
   $('#contract_amount_display').hide();
   function ChangeCar()
   {
     var car_id =$('#car_id').val();
    
     $.ajax({
         type:'POST',
         headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: "{{url('/admin/fetch/car/damages')}}",
         data: {'car_id': car_id},
         success: function(data){
           var damage='';
           $.each(data.damage_data, function (key, value) {
               damage +='<option value="' + value.id +'">' + value.damage_slug + '</option>';
           });
           $("#damage_id").append(damage);
   
       
   
         }
     });
     
        
   }
   
   function ChangeClient()
   {
     var client_id =$('#client_id').val();
     $.ajax({
         type:'POST',
         headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: "{{url('/admin/fetch/client/contracts')}}",
         data: {'client_id': client_id},
         success: function(data){
           
           // apped the contract data
           var contract='';
           $.each(data.contract_data, function (key, value) {
             contract +='<option value="' + value.id +'">' + value.contract_number + '</option>';
           });
           $("#contract_id").append(contract);
   
         }
     });
     
        
   }

   function ChangeContract()
   {
      var contract_id =$('#contract_id').val();
     $.ajax({
         type:'POST',
         headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: "{{url('/admin/fetch/contract/total/amount')}}",
         data: {'contract_id': contract_id},
         success: function(data){
           
            $('#contract_amount_display').show();
            $('#contract_amount').val(data.contract_amount);

   
         }
     });
     
   }
</script>
@endsection