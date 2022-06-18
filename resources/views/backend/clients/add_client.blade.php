@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Add New Client</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Add Client</li>
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
                  <h3 class="card-title">New Client</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{url('/admin/add/client')}}" method="post">
                  @csrf
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-user"></i> Personal Information</h3>
                     </div>
                    
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="name">First Name <span>*</span></label>
                              <input type="text" class="form-control" id="name" placeholder="Enter Name" name="first_name" value="{{old('first_name')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Last Name <span>*</span></label>
                              <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="last_name" value="{{old('last_name')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">License Number <span>*</span></label>
                              <input type="text" class="form-control" id="lnum" placeholder="Enter License Number" name="license_no" value="{{old('license_no')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="ldate">License Date <span>*</span></label>
                              <input type="text" onfocus="(this.type='date')" class="form-control" id="ldate" placeholder="Enter License Date" name="license_date" value="{{old('license_date')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="dob">Date of Birth <span>*</span></label>
                              <input type="text" onfocus="(this.type='date')" class="form-control" id="dob" placeholder="Enter Date of Birth" name="date_of_birth" value="{{old('date_of_birth')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="number">Contact Number</label>
                              <input type="number" class="form-control" id="number" placeholder="Contact Number" name="contact_no" value="{{old('contact_no')}}" required>
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
                              <input type="text" class="form-control" id="street" placeholder="Enter Street" name="street" value="{{old('street')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Housenumber <span>*</span></label>
                              <input type="text" class="form-control" id="housenumber" placeholder="Enter Housenumber" name="house_no" value="{{old('house_no')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Busnumber</label>
                              <input type="text" class="form-control" id="busnumber" placeholder="Enter Busnumber" name="bus_no" value="{{old('bus_no')}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">City <span>*</span></label>
                              <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="{{old('city')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Zipcode <span>*</span></label>
                              <input type="number" class="form-control" id="zipcode" placeholder="Enter Zipcode" name="zipcode" value="{{old('zipcode')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="country">Country <span>*</span></label>
                              <select name="country" id="country" class="form-control"  value="{{old('country_id')}}" required>
                                 <option value="" selected disabled hidden>Choose Country</option>
                                 @foreach($countries as $row)
                                 <option value="{{$row->id}}">{{$row->name}}</option>
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
                              <select id="adres" class="form-control" name="company" value="{{old('company_status')}}" required>
                              <option value="" selected disabled hidden>Choose</option>
                                 <option value="1">YES</option>
                                 <option value="0">NO</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="cname">Company Name <span>*</span></label>
                              <input type="text" class="form-control" id="cname" placeholder="Enter Company Name" name="company_name" value="{{old('company_name')}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="add">Addres <span>*</span></label>
                              <textarea id="add" cols="30" rows="1" class="form-control" name="address" value="{{old('address')}}" required></textarea>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="vat">VAT Number <span>*</span></label>
                              <input type="text" class="form-control" id="vat" placeholder="Enter VAT Number" name="vat_no" value="{{old('vat_no')}}" required>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="payment">Term of Payment</label>
                              <select  id="payment" class="form-control" name="terms_of_payment" value="{{old('terms_of_payment')}}" required>
                              <option value="" selected disabled hidden>Choose Payment</option>
                                 <option value="8">8 day</option>
                                 <option value="15">15 day</option>
                                 <option value="30">1 month</option>
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