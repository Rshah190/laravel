@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Add New Contract</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Add Contract</li>
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
                  <h3 class="card-title">New Contract</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{url('admin/add/contract')}}" method="post">
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
                                 @foreach($clients as $client_row)
                                 <option value="{{$client_row->id}}">{{$client_row->first_name}} {{$client_row->first_name}} ({{$client_row->license_no}})</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">Car <span>*</span></label>
                              <select name="car"  class="form-control">
                              <option value="" selected disabled hidden>Choose Car</option>
                                 @foreach($cars as $car_row)
                                 <option value="{{$car_row->id}}">{{$car_row->marque}}({{$car_row->car_code}})</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="ldate">Deposit  <span>*</span></label>
                              <input type="text" class="form-control" id="ldate" placeholder="Enter Deposit" name="deposit">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Rent Amount</label>
                              <input type="number" class="form-control" id="number" placeholder="Rent Amount" name="rent_amout">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Price Add Km</label>
                              <input type="number" class="form-control" id="number" placeholder="Price Add Km" name="price_add_km">
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
                              <input type="text" class="form-control"  placeholder="Enter Fuel Level" name="fuel_niveau">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Rental period <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Rental Period" name="rental_period">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Start Date</label>
                              <input type="date" class="form-control"  placeholder="Enter Start Date" name="start_date">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">Hour Departement <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Hour Departement" name="hour_depart">
                           </div>
                        </div>
                       
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Free Kms <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Free Kms" name="free_km">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Kms Depart <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Km Depart" name="km_depart">
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
                              <input type="number" class="form-control"  placeholder="Enter Km Arrival" name="km_arrival">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="add">Fuel Level <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Fuel level Arrival" name="fuel_arrival">                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Date Arrival <span>*</span></label>
                              <input type="date" class="form-control"  placeholder="Enter Arrival Date" name="date_arrival">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Hour Arrival <span>*</span></label>
                              <select name="hour_arrival"  class="form-control">
                                 <option value="" selected disabled hidden>Choose Hour</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                              </select>                           
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Extra Charges <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Extra Charges" name="extra_charges">
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
                              <input type="number" class="form-control"  placeholder="Enter Amount" name="amount">
                           </div>
                        </div>
                        
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Date of Payment <span>*</span></label>
                              <input type="date" class="form-control" id="vat" placeholder="Enter Payment of Date" name="payment_date">
                           </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3" id="description">
                           <div class="form-group">
                              <label for="vat">Payment Description <span>*</span></label>
                              <textarea class="form-control"  placeholder="Enter Payment Description" name="payment_description"></textarea>
                           </div>
                        </div>
                       
                     </div>
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
@endsection
@section('script')
<script>
   $('#description').hide();
   function selectPaymentType()
   {
      $('#description').show();

   }
</script>
@endsection