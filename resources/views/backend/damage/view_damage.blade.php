@extends('backend.layouts.master_after_login')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Damage Details</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">Damage Details</li>
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
            <div class="card mb-3">
               <div class="card-header position-relative min-vh-25 mb-5">
                  <div class="bg-holder rounded-3 rounded-bottom-0"
                     style="background-image:url('assets/backend/dist/img/car-bg.jpg');"></div>
                  <!--/.bg-holder-->
                  <?php
                  $front_images=json_decode($data['front_response']);
                  $url=$front_images[0]->src;
                  ?>
                  <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                     src="<?php echo $url;?>" width="200" alt=""></div>
               </div>
               <div class="card-body">
                  <div class="row align-items-end">
                     <div class="col-lg-8">
                        <h4 class="mb-1">{{$data['car_details']->marque}} ({{$data['car_details']->car_code}})</h4>
                        <h5 class="fs-0 fw-normal">{{$data['car_details']->model}}</h5>
                        <div class="border-dashed-bottom my-4 d-lg-none"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card">
               
               <!-- /.card-header -->
               <!-- form start -->
              
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
                                 <option value="{{$car_row->id}}"{{($car_row->id === $data['damage_report']->car_id)?'selected':'disabled hidden'}}>{{$car_row->car_code}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="lnum">Damage Type <span>*</span></label>
                              <select name="damage_type[]"  class="form-control select2" multiple="multiple" data-placeholder="Choose Damage" >
                              @foreach($data['damage_types'] as $damage_row)
                              <option value="{{$damage_row->id}}"{{ (in_array($damage_row->id, $data['report_damages']))?'selected':'disabled'}}>{{$damage_row->name}}</option>
                              @endforeach
                              </select>                           
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="ldate">Damage Place  <span>*</span></label>
                              <select name="damage_place[]" class="form-control  select2" multiple="multiple" data-placeholder="Choose Damage Place">
                              @foreach($data['damage_places'] as $damage_place_row)
                              <option value="{{$damage_place_row->id}}"{{ (in_array($damage_place_row->id, $data['report_places']))?'selected':'disabled'}}>{{$damage_place_row->place_name}}</option>
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
                   
                     @foreach($data['report_wheels'] as $wheel)
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="country">Wheel <span>*</span></label>
                              <select name="wheel_type[]"  class="form-control"  value=""  >
                                 <option value="" selected disabled hidden>Choose wheel Type</option>
                                 <option value="Wheel LV"{{($wheel->wheel_type === "Wheel LV")?"selected":'disabled'}}>Wheel LV</option>
                                 <option value="Wheel RV"{{($wheel->wheel_type === "Wheel RV")?"selected":'disabled'}}>Wheel RV</option>
                                 <option value="Wheel RA"{{($wheel->wheel_type === "Wheel RA")?"selected":'disabled'}}>Wheel RV</option>
                                 <option value="Wheel LA"{{($wheel->wheel_type === "Wheel LA")?"selected":'disabled'}}>Wheel LA</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="street">Damage <span>*</span></label>
                              <select name="wheel_damage[]"  class="form-control" >
                                 <option value="" selected disabled hidden>Choose Damage</option>
                                 @foreach($data['damage_types'] as $damage_row)
                                 <option value="{{$damage_row->id}}"{{($damage_row->id === $wheel->damage_type_id)?"selected":'disabled'}}>{{$damage_row->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Marque of Tire <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Marque of Tire " name="wheel_marque[]" value="{{$wheel->wheel_marque}}" readonly >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Tire Size</label>
                              <input type="text" class="form-control"  placeholder="Enter Tire Size" name="tire_size[]" value="{{$wheel->tire_size}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">MM</label>
                              <input type="text" class="form-control"  placeholder="Enter MM" name="mm[]" value="{{$wheel->mm}}" readonly>
                           </div>
                        </div>
                     </div>
                     @endforeach
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body border-full">
                     <div class="card-heading">
                        <h3 class="card-title"><i class="fa fa-building"></i> Image Information</h3>
                     </div>
                     <div class="card-body">
                        <div class="row">
                        @foreach($images as $image_row)
                        <?php 
                        $damage_title='';
                        if($image_row->type == 1)
                        {
                            $damage_title="Side 1";

                        }
                        elseif($image_row->type == 2)
                        {
                            $damage_title="Side 2";
                        }
                        elseif($image_row->type == 3)
                        {
                            $damage_title="Front";
                        }
                        elseif($image_row->type == 4)
                        {
                            $damage_title="Back";
                        }
                        else
                        {
                            $damage_title="Interior";
                        }
                       
                        ?>
                        <div class="col-sm-2">
                            <a href="{{asset('assets/backend/reports/'.$image_row->image)}}" data-toggle="lightbox" data-title="<?php echo $damage_title;?>" data-gallery="gallery">
                            <img src="{{asset('assets/backend/reports/'.$image_row->image)}}" class="img-fluid mb-2" alt="white sample"/>
                            </a>
                        </div>
                        @endforeach
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
                              <input type="text" class="form-control"  placeholder="Enter Steering wheel " name="steering_wheel" value="{{ $data['damage_report']->steering_wheel}}" readonly >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Dashboard <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Dashboard" name="dashboard" value="{{ $data['damage_report']->dashboard}}" readonly >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Centre console</label>
                              <input type="text" class="form-control"  placeholder="Enter Centre console" name="centre_console" value="{{$data['damage_report']->centre_console}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">Driver seat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Driver seat" name="driver_seat" value="{{$data['damage_report']->driver_seat}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Passenger seat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Passenger seat" name="passenger_seat" value="{{$data['damage_report']->passenger_seat}}" readonly >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Floor mat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Floor mat" name="floor_mat" value="{{$data['damage_report']->floor_mat}}" readonly >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Back Seat <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Back seat" name="back_seat" value="{{$data['damage_report']->back_seat}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Windows <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Windows" name="windows" value="{{$data['damage_report']->windows}}"  readonly>
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
                              <input type="text" class="form-control"  placeholder="Enter Airco" name="airco" value="{{$data['damage_report']->airco}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="housenumber">Working Enging <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Working Enging" name="working_enging" value="{{$data['damage_report']->working_enging}}" readonly >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="busnumber">Start enging</label>
                              <input type="text" class="form-control"  placeholder="Enter Start Enging" name="start_enging" value="{{$data['damage_report']->start_enging}}" readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="city">Handbrake <span>*</span></label>
                              <input type="text" class="form-control" placeholder="Enter Handbrake" name="hand_brake" value="{{$data['damage_report']->hand_brake}}" readonly >
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Exhaust <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Exhaust" name="exhaust" value="{{$data['damage_report']->exhaust}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Battery <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Battery" name="battery" value="{{$data['damage_report']->battery}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Power steering <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Power steering" name="power_steering" value="{{$data['damage_report']->power_steering}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Sound motor <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Sound motor" name="sound_motor" value="{{$data['damage_report']->sound_motor}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Gear <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Gear" name="gear" value="{{$data['damage_report']->gear}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Control Gear <span>*</span></label>
                              <input type="text" class="form-control" placeholder="Enter Control Gear" name="controle_gear" value="{{$data['damage_report']->controle_gear}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Lights <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Lights" name="light" value="{{$data['damage_report']->light}}"  readonly>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="zipcode">Wind Shield <span>*</span></label>
                              <input type="text" class="form-control"  placeholder="Enter Wind Shield" name="windshield_wipers" value="{{$data['damage_report']->windshield_wipers}}"  readonly>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <a href="{{url('admin/list/damage/reports')}}" class="btn btn-primary">Back</a>
                  </div>
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
   $(function () {
   //Initialize Select2 Elements
   $('.select2').select2()
   
   //Initialize Select2 Elements
   $('.select2bs4').select2({
   theme: 'bootstrap4'
   })
   });
</script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
  })
</script>
@endsection