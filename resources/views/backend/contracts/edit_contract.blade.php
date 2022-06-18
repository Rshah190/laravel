@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Edit Contract</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Edit Contract</li>
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
                  <h3 class="card-title">Edit Contract</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{url('admin/edit/contract/'.$data['contract_details']->contract_number)}}" method="post">
                  @csrf
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-user"></i> Basic Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">Client  <span>*</span></label>
                              <select name="client"  class="form-control" >
                                 <option value="" selected disabled hidden>Choose Client</option>
                                 @foreach($data['clients'] as $client_row)
                                 <option value="{{$client_row->id}}"{{($data['contract_details']->client_id === $client_row->id)?'selected':''}}>{{$client_row->first_name}} {{$client_row->first_name}} ({{$client_row->license_no}})</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">Car <span>*</span></label>
                              <select name="car"  class="form-control">
                                 <option value="" selected disabled hidden>Choose Car</option>
                                 @foreach($data['cars'] as $car_row)
                                 <option value="{{$car_row->id}}"{{($data['contract_details']->car_id === $car_row->id)?'selected':''}}>{{$car_row->marque}}({{$car_row->car_code}})</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="ldate">Deposit  <span>*</span></label>
                              <input type="text" class="form-control" id="ldate" placeholder="Enter Deposit" name="deposit" value="{{$data['contract_details']->deposit}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Rent Amount</label>
                              <input type="number" class="form-control" placeholder="Rent Amount" name="rent_amount" value="{{$data['contract_details']->rent_amount}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Price Add Km</label>
                              <input type="number" class="form-control" id="number" placeholder="Price Add Km" name="price_add_km" value="{{$data['contract_details']->price_add_km}}">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-globe"></i> Departure Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="street">Fuel Level <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Fuel Level" name="fuel_niveau" value="{{$data['contract_details']->fuel_niveau}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Rental period <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Rental Period" name="rental_period" value="{{$data['contract_details']->rental_period}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Start Date</label>
                              <input type="date" class="form-control"  placeholder="Enter Start Date" name="start_date" value="{{$data['contract_details']->start_date}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">Hour Departement <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Hour Departement" name="hour_depart" value="{{$data['contract_details']->hour_depart}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Free Kms <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Free Kms" name="free_km" value="{{$data['contract_details']->free_km}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Kms Depart <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Km Depart" name="km_depart" value="{{$data['contract_details']->km_depart}}">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-building"></i> Arrival Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="cname">Kms Arrival  <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Km Arrival" name="km_arrival" value="{{$data['contract_details']->km_arrival}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="add">Fuel Level <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Fuel level Arrival" name="fuel_arrival" value="{{$data['contract_details']->fuel_arrival}}">                           
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Date Arrival <span>*</span></label>
                              <input type="date" class="form-control"  placeholder="Enter Arrival Date" name="date_arrival" value="{{$data['contract_details']->date_arrival}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Hour Arrival <span>*</span></label>
                              <select name="hour_arrival"  class="form-control">
                                 <option value="" selected disabled hidden>Choose Hour</option>
                                 <option value="1"{{($data['contract_details']->hour_arrival === '1')?'selected':''}}>1</option>
                                 <option value="2" {{($data['contract_details']->hour_arrival === '2')?'selected':''}}>2</option>
                                 <option value="3" {{($data['contract_details']->hour_arrival === '3')?'selected':''}}>3</option>
                                 <option value="4" {{($data['contract_details']->hour_arrival === '4')?'selected':''}}>4</option>
                                 <option value="5" {{($data['contract_details']->hour_arrival === '5')?'selected':''}}>5</option>
                                 <option value="6" {{($data['contract_details']->hour_arrival === '6')?'selected':''}}>6</option>
                                 <option value="7" {{($data['contract_details']->hour_arrival === '7')?'selected':''}}>7</option>
                                 <option value="8" {{($data['contract_details']->hour_arrival === '8')?'selected':''}}>8</option>
                                 <option value="9" {{($data['contract_details']->hour_arrival === '9')?'selected':''}}>9</option>
                                 <option value="10" {{($data['contract_details']->hour_arrival === '10')?'selected':''}}>10</option>
                                 <option value="11" {{($data['contract_details']->hour_arrival === '11')?'selected':''}}>11</option>
                                 <option value="12" {{($data['contract_details']->hour_arrival === '12')?'selected':''}}>12</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Extra Charges <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Extra Charges" name="extra_charges" value="{{$data['contract_details']->extra_charges}}">
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-building"></i> Payment Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="cname">Amount  <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Amount" name="amount" value="{{$data['contract_payment']->amount}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Date of Payment <span>*</span></label>
                              <input type="date" class="form-control" id="vat" placeholder="Enter Payment of Date" name="payment_date" value="{{$data['contract_payment']->payment_date}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Payment Type <span>*</span></label>
                              <select name="payment_type"  class="form-control" onchange="selectPaymentType();">
                                 <option value="" selected disabled hidden>Choose Payment Type</option>
                                 <option value="Contant"{{($data['contract_payment']->payment_type ==='Contant')?'selected':''}}>Contant</option>
                                 <option value="Bankcontact"{{($data['contract_payment']->payment_type ==='Bankcontact')?'selected':''}}>Bankcontact</option>
                                 <option value="Banktransfer"{{($data['contract_payment']->payment_type ==='Banktransfer')?'selected':''}}>Banktransfer</option>
                                 <option value="To be paid"{{($data['contract_payment']->payment_type ==='To be paid')?'selected':''}}>To be paid</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Payment Description <span>*</span></label>
                              <textarea class="form-control"  placeholder="Enter Payment Description" name="payment_description">{{$data['contract_payment']->payment_description}}</textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-building"></i> Extend Information</h3>
                     </div>
                     <section class="content">
                        <div class="row justify-content-center">
                           <div class="col-md-12">
                              <div class="card">
                                 <div class="card-header">
                                    <h3 class="card-title"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                       Add Days Extend
                                       </button>
                                    </h3>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body table-responsive p-0">
                                    <table   class="table table-head-fixed text-nowrap table-hover">
                                       <thead>
                                          <tr>
                                             <th>ID</th>
                                             <th>New Arrival Date</th>
                                             <th>New Free Kms</th>
                                             <th>Extend Days</th>
                                             <th>Extend Price</th>
                                             <th>Payment Type</th>
                                             <th>Payment Date</th>
                                             <th class="text-center">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach($data['extend_response'] as $key=>$extend_row)
                                          <tr>
                                             <td>{{$key+1}}</td>
                                             <td>{{$extend_row['new_arrival_date']}}</td>
                                             <td>{{$extend_row['new_free_kms']}}</td>
                                             <td>{{$extend_row['extend_days']}}</td>
                                             <td>{{$extend_row['extend_price']}}</td>
                                             <td>{{$extend_row['payment_type']}}</td>
                                             <td>{{$extend_row['payment_date']}}</td>
                                             <td>
                                                <a href="javascript:void(0);" onclick="OpenEditModal({{$extend_row['id']}})" class="edit"><i class="fas fa-user-edit"></i></a> | 
                                                <a href="javascript:void(0);" class="dlte" onclick="deleteExtendDay({{$extend_row['id']}})"><i class="fas fa-trash-alt"></i></a>
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
                        </div>
                     </section>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <a href="{{url('admin/list/contracts')}}"  class="btn btn-default">Cancel</a>
                  </div>
               </form>
            </div>
            <!-- /.card -->
         </div>
      </div>
   </section>
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Days Extend</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{url('admin/add/extend/days/'.$data['contract_details']->id)}}" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Extend Days  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Extend days" name="extend_days">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Extend Free Kms  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Extend Free Kms" name="extend_free_kms">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Price Extending  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Price Extending" name="extend_price">
                     </div>
                  </div>
               </div>
               <hr class="divider" />
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <h3>Payment Details</h4>
                     </div>

                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Amount  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Amount" name="amount">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="vat">Date of Payment <span>*</span></label>
                        <input type="date" class="form-control" id="vat" placeholder="Enter Payment of Date" name="payment_date">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="vat">Payment Type <span>*</span></label>
                        <select name="payment_type"  class="form-control" onchange="selectPaymentType();">
                           <option value="" selected disabled hidden>Choose Payment Type</option>
                           <option value="Contant">Contant</option>
                           <option value="Bankcontact">Bankcontact</option>
                           <option value="Banktransfer">Banktransfer</option>
                           <option value="To be paid">To be paid</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6" id="description">
                     <div class="form-group">
                        <label for="vat">Payment Description <span>*</span></label>
                        <textarea class="form-control"  placeholder="Enter Payment Description" name="payment_description"></textarea>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="edit-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Days Extend</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{url('admin/edit/extend/days/'.$data['contract_details']->id)}}" method="post">
               @csrf
               <input type="hidden" name="extend_id" value="" id="extend_id">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Extend Days  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Extend days" name="extend_days" id="extend_days">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Extend Free Kms  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Extend Free Kms" name="extend_free_kms" id="extend_free_kms">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Price Extending  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Price Extending" name="extend_price" id="extend_price">
                     </div>
                  </div>
               </div>
               <hr class="divider" />
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <h3>Payment Details</h4>
                     </div>

                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="cname">Amount  <span>*</span></label>
                        <input type="number" class="form-control"  placeholder="Enter Amount" name="amount" id="amount">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="vat">Date of Payment <span>*</span></label>
                        <input type="date" class="form-control"  placeholder="Enter Payment of Date" name="payment_date" id="payment_date">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="vat">Payment Type <span>*</span></label>
                        <select name="payment_type"  class="form-control" onchange="selectPaymentType();" id="payment_type">
                           <option value="" selected disabled hidden>Choose Payment Type</option>
                           <option value="Contant">Contant</option>
                           <option value="Bankcontact">Bankcontact</option>
                           <option value="Banktransfer">Banktransfer</option>
                           <option value="To be paid">To be paid</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6" id="description">
                     <div class="form-group">
                        <label for="vat">Payment Description <span>*</span></label>
                        <textarea class="form-control"  placeholder="Enter Payment Description" name="payment_description" id="payment_description"></textarea>
                     </div>
                  </div>
               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
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
          <form action="{{url('admin/delete/extend/days')}}" method="post">
            @csrf
            <input type="hidden" name="extend_contract_id" value="{{$data['contract_details']->id}}">
            <input type="hidden" name="delete_extend_id" value="" id="delete_extend_id">
          <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
  function deleteExtendDay(id)
  {
    console.log(id);
    $('#modal-sm').modal('show');
    $('#delete_extend_id').val(id);


  }
</script>
<script>
   $('#description').hide();
   function selectPaymentType()
   {
      $('#description').show();
   
   }

   function OpenEditModal(id)
   {
      console.log(id);
      var contract_id ={{$data['contract_details']->id}};
      console.log(contract_id);
      $.ajax({
            type:'POST',
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('/admin/fetch/extend/days')}}",
            data: {'id': id, 'contract_id': contract_id},
            success: function(data){
               $('#extend_price').val(data.extend_data.extend_price);
               $('#extend_days').val(data.extend_data.extend_days);
               $('#extend_free_kms').val(data.extend_data.free_kms);
               $('#amount').val(data.payment_data.amount);
               $('#payment_date').val(data.payment_data.payment_date);
               $('#payment_description').val(data.payment_data.payment_description);
               $('#payment_type').val(data.payment_data.payment_type);

               $('#extend_id').val(data.extend_data.id);
               $('#edit-modal').modal('show');


            }
        });
   }
</script>
@endsection