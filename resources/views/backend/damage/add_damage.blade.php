@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Add New Damage</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Add Damage</li>
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
                  <h3 class="card-title">New Damage</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->
               <form action="{{url('/admin/add/damage/report')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-user"></i> Damage Information</h3>
                     </div>
                     <div class="row">
                       
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lname">Car <span>*</span></label>
                              <select name="car"  class="form-control"  value="{{old('car')}}"  >
                                 <option value="" selected disabled hidden>Choose Car</option>
                                 @foreach($data['cars'] as $car_row)
                                 <option value="{{$car_row->id}}">{{$car_row->car_code}}</option>
                                 @endforeach
                                
                              </select>        
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">Damage Type <span>*</span></label>
                              <select name="damage_type[]"  class="form-control select2" multiple="multiple" data-placeholder="Choose Damage" >
                                 @foreach($data['damage_types'] as $damage_row)
                                 <option value="{{$damage_row->id}}">{{$damage_row->name}}</option>
                                 @endforeach
                                
                              </select>                           
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="ldate">Damage Place  <span>*</span></label>
                              <select name="damage_place[]" class="form-control  select2" multiple="multiple" data-placeholder="Choose Damage Place">
                                 @foreach($data['damage_places'] as $damage_place_row)
                                 <option value="{{$damage_place_row->id}}">{{$damage_place_row->place_name}}</option>
                                 @endforeach
                              </select>                         
                           </div>
                        </div>
                       
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-globe"></i> Wheel Information</h3>
                     </div>
                     <div class="col-md-3">
                           <div class="form-group">
                           <a href="javascript:void(0)" class="btn btn-primary" onclick="addClickOnWheel()">Add Work Wheel</a>
                           </div>
                        </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="country">Wheel <span>*</span></label>
                              <select name="wheel_type[]"  class="form-control"  value=""  >
                                 <option value="" selected disabled hidden>Choose wheel Type</option>
                                 <option value="Wheel LV">Wheel LV</option>
                                 <option value="Wheel RV">Wheel RV</option>
                                 <option value="Wheel RA">Wheel RV</option>
                                 <option value="Wheel LA">Wheel LA</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="street">Damage <span>*</span></label>
                              <select name="wheel_damage[]"  class="form-control" >
                                 <option value="" selected disabled hidden>Choose Damage</option>
                                 @foreach($data['damage_types'] as $damage_row)
                                 <option value="{{$damage_row->id}}">{{$damage_row->name}}</option>
                                 @endforeach
                                
                              </select>                                     
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Marque of Tire <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Marque of Tire " name="wheel_marque[]"   >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Tire Size</label>
                              <input type="text" class="form-control"  placeholder="Enter Tire Size" name="tire_size[]" value="">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">MM</label>
                              <input type="text" class="form-control"  placeholder="Enter MM" name="mm[]" value="">
                           </div>
                        </div>
                     </div>
                     <div id="addSection">
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-building"></i> Image Information</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="company">For Side 1</label>
                              <div class="side-1" style="padding-top: .5rem;"></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="cname">For Side 2 <span>*</span></label>
                              <div class="side-2" style="padding-top: .5rem;"></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="add">For Front Side <span>*</span></label>
                              <div class="front" style="padding-top: .5rem;"></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="vat">For Back side <span>*</span></label>
                              <div class="back" style="padding-top: .5rem;"></div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="vat">For Interior <span>*</span></label>
                              <div class="interior" style="padding-top: .5rem;"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-globe"></i> Interior Damage</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="street">Steering wheel <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Steering wheel " name="steering_wheel" value="{{old('steering_wheel')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Dashboard <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Dashboard" name="dashboard" value="{{old('dashboard')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Centre console</label>
                              <input type="text" class="form-control"  placeholder="Enter Centre console" name="centre_console" value="{{old('centre_console')}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">Driver seat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Driver seat" name="driver_seat" value="{{old('driver_seat')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Passenger seat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Passenger seat" name="passenger_seat" value="{{old('passenger_seat')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Floor mat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Floor mat" name="floor_mat" value="{{old('floor_mat')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Back Seat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Back seat" name="back_seat" value="{{old('back_seat')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Windows <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Windows" name="windows" value="{{old('windows')}}"  >
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-globe"></i> Technical Damage</h3>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="street">Airco <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Airco" name="airco" value="{{old('airco')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Working Enging <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Working Enging" name="working_enging" value="{{old('house_no')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Start enging</label>
                              <input type="text" class="form-control"  placeholder="Enter Start Enging" name="start_enging" value="{{old('start_enging')}}">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">Handbrake <span>*</span></label>
                              <input type="text" class="form-control" placeholder="Enter Handbrake" name="hand_brake" value="{{old('hand_brake')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Exhaust <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Exhaust" name="exhaust" value="{{old('exhaust')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Battery <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Battery" name="battery" value="{{old('battery')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Power steering <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Power steering" name="power_steering" value="{{old('power_steering')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Sound motor <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Sound motor" name="sound_motor" value="{{old('sound_motor')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Gear <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Gear" name="gear" value="{{old('gear')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Control Gear <span>*</span></label>
                              <input type="text" class="form-control" placeholder="Enter Control Gear" name="controle_gear" value="{{old('controle_gear')}}"  >
                           </div>
                        </div> <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Lights <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Lights" name="light" value="{{old('light')}}"  >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Wind Shield <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Wind Shield" name="windshield_wipers" value="{{old('windshield_wipers')}}"  >
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                     <a href="{{url('admin/list/damage/reports')}}" class="btn btn-default">Cancel</a>
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
   function addClickOnWheel()
   {

      $.ajaxSetup({
         headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         });
         var csrf_token = $('input[name="csrf-token"]').val();
         console.log(csrf_token);
         $.ajax({
                  url:"{{url('admin/click-add-work')}}",
                  type:"POST",
                  data: {
                  _token: csrf_token

                  },
                  success:function (data) {
                     console.log(data);
                     if(data.response_code == 400)
                     {
                        alert('Something went wrong');

                     }
                     else
                     {
                        $('#addSection').append(data.result);

                     }
                  }
               });
   }
   // remove row
   $(document).on('click', '#removeRow', function () {
   $(this).closest('#inputFormRow').remove();
   });
</script>
<script>
   $('.side-1').imageUploader({
    label: 'Drag & Drop files here or click to browse',
    imagesInputName: 'side1_images',

   });
   $('.side-2').imageUploader({
    label: 'Drag & Drop files here or click to browse',
    imagesInputName: 'side2_images',

   });
   $('.front').imageUploader({
    imagesInputName: 'front_images',
    label: 'Drag & Drop files here or click to browse',

   });
   $('.back').imageUploader({
    imagesInputName: 'back_images',
    label: 'Drag & Drop files here or click to browse',

   });
   $('.interior').imageUploader({
    label: 'Drag & Drop files here or click to browse',
    imagesInputName: 'interior_images',

   });

   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>
@endsection