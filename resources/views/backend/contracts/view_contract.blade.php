@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Contract Details</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Contract Details</li>
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
                  <h3 class="card-title">Contract Details</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
            
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-user"></i> Basic Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">Client  <span>*</span></label>
                              <select name="client"  class="form-control" readonly >
                                 <option value="" selected disabled hidden>Choose Client</option>
                                 @foreach($data['clients'] as $client_row)
                                 <option value="{{$client_row->id}}"{{($data['contract_details']->client_id === $client_row->id)?'selected':'disabled'}}>{{$client_row->first_name}} {{$client_row->first_name}} ({{$client_row->license_no}})</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">Car <span>*</span></label>
                              <select name="car"  class="form-control" readonly>
                                 <option value="" selected disabled hidden>Choose Car</option>
                                 @foreach($data['cars'] as $car_row)
                                 <option value="{{$car_row->id}}"{{($data['contract_details']->car_id === $car_row->id)?'selected':'disabled'}}>{{$car_row->marque}}({{$car_row->car_code}})</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="ldate">Deposit  <span>*</span></label>
                              <input type="text" class="form-control" id="ldate" placeholder="Enter Deposit" name="deposit" value="{{$data['contract_details']->deposit}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Rent Amount</label>
                              <input type="number" class="form-control" id="number" placeholder="Rent Amount" name="rent_amount" value="{{$data['contract_details']->rent_amount}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Price Add Km</label>
                              <input type="number" class="form-control" id="number" placeholder="Price Add Km" name="price_add_km" value="{{$data['contract_details']->price_add_km}}" readonly>
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
                              <input type="text" class="form-control"  placeholder="Enter Fuel Level" name="fuel_niveau" value="{{$data['contract_details']->fuel_niveau}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Rental period <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Rental Period" name="rental_period" value="{{$data['contract_details']->rental_period}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Start Date</label>
                              <input type="date" class="form-control"  placeholder="Enter Start Date" name="start_date" value="{{$data['contract_details']->start_date}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">Hour Departement <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Hour Departement" name="hour_depart" value="{{$data['contract_details']->hour_depart}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Free Kms <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Free Kms" name="free_km" value="{{$data['contract_details']->free_km}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Kms Depart <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Km Depart" name="km_depart" value="{{$data['contract_details']->km_depart}}" readonly>
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
                              <input type="number" class="form-control"  placeholder="Enter Km Arrival" name="km_arrival" value="{{$data['contract_details']->km_arrival}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="add">Fuel Level <span>*</span></label>
                              <input type="number" class="form-control"  placeholder="Enter Fuel level Arrival" name="fuel_arrival" value="{{$data['contract_details']->fuel_arrival}}" readonly>                           
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Date Arrival <span>*</span></label>
                              <input type="date" class="form-control"  placeholder="Enter Arrival Date" name="date_arrival" value="{{$data['contract_details']->date_arrival}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Hour Arrival <span>*</span></label>
                              <select name="hour_arrival"  class="form-control" readonly>
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
                              <input type="number" class="form-control"  placeholder="Enter Extra Charges" name="extra_charges" value="{{$data['contract_details']->extra_charges}}" readonly>
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
                              <input type="number" class="form-control"  placeholder="Enter Amount" name="amount" value="{{$data['contract_payment']->amount}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Date of Payment <span>*</span></label>
                              <input type="date" class="form-control" id="vat" placeholder="Enter Payment of Date" name="payment_date" value="{{$data['contract_payment']->payment_date}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">Payment Type <span>*</span></label>
                              <select name="payment_type"  class="form-control" onchange="selectPaymentType();" readonly>
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
                              <textarea class="form-control"  placeholder="Enter Payment Description" name="payment_description" readonly>{{$data['contract_payment']->payment_description}}</textarea>
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
                     <a href="{{url('admin/list/contracts')}}"  class="btn btn-default">Back</a>
                  </div>
            </div>
            <!-- /.card -->
         </div>
      </div>
   </section>
</div>
<!-- /.content-wrapper -->
@endsection
