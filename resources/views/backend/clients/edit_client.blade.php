@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Edit Client</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Edit Client</li>
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
                  <h3 class="card-title">Edit Client</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{url('admin/edit/client/'.$client_details->client_slug)}}" method="post">
                  @csrf
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-user"></i> Personal Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="name">First Name <span>*</span></label>
                              <input type="text" class="form-control" id="name" name="first_name" placeholder="Enter Name" value="{{$client_details->first_name}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Last Name <span>*</span></label>
                              <input type="text" class="form-control" id="lname" name="last_name" placeholder="Enter Last Name" value="{{$client_details->last_name}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">License Number <span>*</span></label>
                              <input type="text" class="form-control" id="lnum" placeholder="Enter License Number" name="license_no" value="{{$client_details->license_no}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="ldate">License Date <span>*</span></label>
                              <input type="text" onfocus="(this.type='date')" class="form-control" id="ldate" name="license_date" placeholder="Enter License Date" value="{{$client_details->license_date}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="dob">Date of Birth <span>*</span></label>
                              <input type="text" onfocus="(this.type='date')" class="form-control" id="dob" placeholder="Enter Date of Birth" name="date_of_birth" value="{{$client_details->dob}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Contact Number</label>
                              <input type="number" class="form-control" id="number" placeholder="Contact Number" name ="contact_no" value="{{$client_details->contact_no}}" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-globe"></i> Address</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="street">Street <span>*</span></label>
                              <input type="text" class="form-control" id="street" placeholder="Enter Street" name="street" value="{{$client_details->street}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Housenumber <span>*</span></label>
                              <input type="number" class="form-control" id="housenumber" placeholder="Enter Housenumber" name="house_no" value="{{$client_details->house_no}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Busnumber</label>
                              <input type="text" class="form-control" id="busnumber" placeholder="Enter Busnumber" name="bus_no" value="{{$client_details->bus_no}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">City <span>*</span></label>
                              <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="{{$client_details->city}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Zipcode <span>*</span></label>
                              <input type="number" class="form-control" id="zipcode" placeholder="Enter Zipcode" name="zipcode" value="{{$client_details->zipcode}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="country">Country <span>*</span></label>
                              <select name="country" id="country" class="form-control" required>
                                <option value="" selected disabled hidden>Choose Country</option>
                                 @foreach($countries as $row)
                                 <option value="{{$row->id}}"{{($client_details->country_id ==$row->id)?'selected':''}}>{{$row->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-building"></i> Company Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="company">Company</label>
                              <select name="company" id="adres" class="form-control" required>
                                 <option value="" selected disabled hidden>Choose</option>
                                 <option value="1"{{($client_details->company_status == 1)?"selected":''}}>YES</option>
                                 <option value="0" {{($client_details->company_status == 0)?"selected":''}}>NO</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="cname">Company Name <span>*</span></label>
                              <input type="text" class="form-control" id="cname" name="company_name" placeholder="Enter Company Name" value="{{$client_details->company_name}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="add">Addres <span>*</span></label>
                              <textarea  id="add" cols="30" rows="1" class="form-control" name="address" required>{{$client_details->address}}</textarea>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">VAT Number <span>*</span></label>
                              <input type="text" class="form-control" id="vat" placeholder="Enter VAT Number" name="vat_no" value="{{$client_details->vat_no}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="payment">Term of Payment</label>
                              <select id="payment" class="form-control" name="terms_of_payment" required>
                                 <option value="" selected disabled hidden>Choose Payment</option>
                                 <option value="8" {{($client_details->terms_of_payment === "8")?"selected":''}}>8 day</option>
                                 <option value="15" {{($client_details->terms_of_payment === "15")?"selected":''}}>15 day</option>
                                 <option value="30" {{($client_details->terms_of_payment === "30")?"selected":''}}>1 month</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <a href="{{url('admin/list/clients')}}" class="btn btn-default">Cancel</a>
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