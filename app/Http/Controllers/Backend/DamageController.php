<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\DamageType;
use App\Models\DamagePlace;
use App\Models\DamageReport;
use App\Models\ReportDamageType;
use App\Models\ReportDamagePlace;
use App\Models\ReportWheel;
use App\Models\DamageImage;
use Illuminate\Support\Str;
use Auth;
use Validator;
use Toastr;
use Image;
class DamageController extends Controller
{
    /************list of damage reports ****/
    public function listDamageReports(Request $request)
    {
        $list = DamageReport::get();
        $response=[];
        foreach($list as $row)
        {
            $car_details                         =Car::where('id',$row->car_id)->first();
            $details                             =ReportDamageType::rightjoin('damage_types','damage_types.id','report_damage_types.damage_type_id')
                                                                   ->where('report_damage_types.damage_report_id',$row->id)
                                                                   ->pluck('damage_types.name');
            // dd(($details['name'])->implode(','));                                         
            $result['id']                        =$row->id;
            $result['damage_slug']               =$row->damage_slug;
            $result['damage_types']              ='';
            $result['car_code']                  =$car_details->car_code;
            $result['car_marque']                =$car_details->marque;
            $result['car_model']                 =$car_details->model;
            $result['number_plate']              =$car_details->number_plate;
            $result['age_condition']             =$car_details->age_condition;
            $response[]                          =$result;

        }
        return view('backend.damage.list_damages',compact('response'));
    }
    /*****************Add damage***********/
    public function addDamageReport(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'car'                 =>'required',
                'damage_type'         =>'required',
                'damage_place'        =>'sometimes|nullable',
                'wheel_type'          =>'required',
                'wheel_damage'        =>'required',
                'wheel_marque'        =>'required',
                'tire_size'           =>'required',
                'mm'                  =>'required',
                'side1_images'        =>'required|max:2048',
                'side2_images'        =>'required|max:2048',
                'front_images'        =>'required|max:2048',
                'back_images'         =>'required|max:2048',
                'interior_images'     =>'required|max:2048',
                'light'               =>'required',
                'windshield_wipers'   =>'required',
                'steering_wheel'      =>'required',
                'dashboard'           =>'required',
                'centre_console'      =>'required',
                'driver_seat'         =>'required',
                'floor_mat'           =>'required',
                'back_seat'           =>'required',
                'passenger_seat'      =>'required',
                'windows'             =>'required',
                'airco'               =>'required',
                'working_enging'      =>'required',
                'start_enging'        =>'required',
                'hand_brake'          =>'required',
                'exhaust'             =>'required',
                'battery'             =>'required',
                'power_steering'      =>'required',
                'sound_motor'         =>'required',
                'gear'                =>'required',
                'controle_gear'       =>'required'
            ]);
            if($validator->fails())
            {
               $errors=$validator->messages();
                foreach($errors->all() as $error)
                {
                    Toastr::error($error,'Error');
                    return redirect()->back();
                }
            }

            $damage                                 =new DamageReport;
            $damage->damage_slug                    =Str::random(20);
            $damage->car_id                         =trim($request->car);
            $damage->steering_wheel                 =trim($request->steering_wheel);
            $damage->dashboard                      =trim($request->dashboard);
            $damage->centre_console                 =trim($request->trim);
            $damage->driver_seat                    =trim($request->driver_seat);
            $damage->floor_mat                      =trim($request->floor_mat);
            $damage->back_seat                      =trim($request->back_seat);
            $damage->passenger_seat                 =trim($request->passenger_seat);
            $damage->windows                        =trim($request->windows);
            $damage->airco                          =trim($request->airco);
            $damage->working_enging                 =trim($request->working_enging);
            $damage->start_enging	                =trim($request->start_enging);
            $damage->hand_brake                     =trim($request->hand_brake);
            $damage->exhaust                        =trim($request->exhaust);
            $damage->battery                        =trim($request->battery);
            $damage->power_steering                 =trim($request->power_steering);
            $damage->sound_motor                    =trim($request->sound_motor);
            $damage->gear                           =trim($request->gear);
            $damage->controle_gear                  =trim($request->controle_gear);
            $damage->light                          =trim($request->light);
            $damage->windshield_wipers              =trim($request->windshield_wipers);
            $damage->save();
            $damage_id=$damage->id;

            // Insert Damage Types
            $damage_types=$request->damage_type;
            foreach($damage_types as $row)
            {
               $report_types=new ReportDamageType;
               $report_types->damage_report_id=$damage_id;
               $report_types->damage_type_id=$row;
               $report_types->status='1';
               $report_types->save();
            }

            // Insert Damage Places
            $damage_places=$request->damage_place;
            if(!empty($damage_places))
            {
                foreach($damage_places as $place_row)
                {
                   $report_types=new ReportDamagePlace;
                   $report_types->damage_report_id=$damage_id;
                   $report_types->damage_place_id=$place_row;
                   $report_types->status='1';
                   $report_types->save();
                }
            }
         

            //Insert Wheel Information
            $wheel_types             =$request->wheel_type;
            $wheel_damages           =$request->wheel_damage;
            $wheel_marques           =$request->wheel_marque;
            $tire_sizes              =$request->tire_size;
            $mm                      =$request->mm; 
            
            foreach($wheel_types as $key=>$wheel_row)
            {
               $wheel                       = new ReportWheel;
               $wheel->damage_report_id     =$damage_id;
               $wheel->wheel_type           =$wheel_row;
               $wheel->wheel_marque         =$wheel_marques[$key];
               $wheel->tire_size            =$tire_sizes[$key];
               $wheel->mm                   =$mm[$key];
               $wheel->damage_type_id       =$wheel_damages[$key];
               $wheel->save();

            }

            //Insert images
            $this->addReportImages($request->side1_images,'1',$damage_id);
            $this->addReportImages($request->side2_images,'2',$damage_id);
            $this->addReportImages($request->front_images,'3',$damage_id);
            $this->addReportImages($request->back_images,'4',$damage_id);
            $this->addReportImages($request->interior_images,'5',$damage_id);
            Toastr::success('Record added successfully :)','Success');
            return redirect()->back();

        }
        $data['cars']=Car::get();
        $data['damage_types']=DamageType::get();
        $data['damage_places']=DamagePlace::get();

        return view('backend.damage.add_damage',compact('data'));
    }
     /*****************Edit damage***********/
     public function EditDamageReport(Request $request,$damage_slug)
     {
        $data['damage_report']=DamageReport::where('damage_slug',$damage_slug)->first();
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'car'                 =>'required',
                'damage_type'         =>'required',
                'damage_place'        =>'sometimes|nullable',
                'wheel_type'          =>'required',
                'wheel_damage'        =>'required',
                'wheel_marque'        =>'required',
                'tire_size'           =>'required',
                'mm'                  =>'required',
                'light'               =>'required',
                'windshield_wipers'   =>'required',
                'steering_wheel'      =>'required',
                'dashboard'           =>'required',
                'centre_console'      =>'required',
                'driver_seat'         =>'required',
                'floor_mat'           =>'required',
                'back_seat'           =>'required',
                'passenger_seat'      =>'required',
                'windows'             =>'required',
                'airco'               =>'required',
                'working_enging'      =>'required',
                'start_enging'        =>'required',
                'hand_brake'          =>'required',
                'exhaust'             =>'required',
                'battery'             =>'required',
                'power_steering'      =>'required',
                'sound_motor'         =>'required',
                'gear'                =>'required',
                'controle_gear'       =>'required'
            ]);
            if($validator->fails())
            {
               $errors=$validator->messages();
                foreach($errors->all() as $error)
                {
                    Toastr::error($error,'Error');
                    return redirect()->back();
                }
            }

            $damage                                 =DamageReport::find($data['damage_report']->id);
            $damage->car_id                         =trim($request->car);
            $damage->steering_wheel                 =trim($request->steering_wheel);
            $damage->dashboard                      =trim($request->dashboard);
            $damage->centre_console                 =trim($request->centre_console);
            $damage->driver_seat                    =trim($request->driver_seat);
            $damage->floor_mat                      =trim($request->floor_mat);
            $damage->back_seat                      =trim($request->back_seat);
            $damage->passenger_seat                 =trim($request->passenger_seat);
            $damage->windows                        =trim($request->windows);
            $damage->airco                          =trim($request->airco);
            $damage->working_enging                 =trim($request->working_enging);
            $damage->start_enging	                =trim($request->start_enging);
            $damage->hand_brake                     =trim($request->hand_brake);
            $damage->exhaust                        =trim($request->exhaust);
            $damage->battery                        =trim($request->battery);
            $damage->power_steering                 =trim($request->power_steering);
            $damage->sound_motor                    =trim($request->sound_motor);
            $damage->gear                           =trim($request->gear);
            $damage->controle_gear                  =trim($request->controle_gear);
            $damage->light                          =trim($request->light);
            $damage->windshield_wipers              =trim($request->windshield_wipers);
            $damage->save();
            $damage_id=$data['damage_report']->id;

            // Insert Damage Types
            $damage_types=$request->damage_type;
            ReportDamageType::where('damage_report_id',$damage_id)->delete();
            foreach($damage_types as $row)
            {
               $report_types=new ReportDamageType;
               $report_types->damage_report_id=$damage_id;
               $report_types->damage_type_id=$row;
               $report_types->status='1';
               $report_types->save();
            }

            // Insert Damage Places
            $damage_places=$request->damage_place;
            ReportDamagePlace::where('damage_report_id',$damage_id)->delete();
            if(!empty($damage_places))
            {
                foreach($damage_places as $place_row)
                {
                   $report_types=new ReportDamagePlace;
                   $report_types->damage_report_id=$damage_id;
                   $report_types->damage_place_id=$place_row;
                   $report_types->status='1';
                   $report_types->save();
                }
            }
         

            //Insert Wheel Information
            $wheel_types             =$request->wheel_type;
            $wheel_damages           =$request->wheel_damage;
            $wheel_marques           =$request->wheel_marque;
            $tire_sizes              =$request->tire_size;
            $mm                      =$request->mm; 
            ReportWheel::where('damage_report_id',$damage_id)->delete();
            foreach($wheel_types as $key=>$wheel_row)
            {
               $wheel                       = new ReportWheel;
               $wheel->damage_report_id     =$damage_id;
               $wheel->wheel_type           =$wheel_row;
               $wheel->wheel_marque         =$wheel_marques[$key];
               $wheel->tire_size            =$tire_sizes[$key];
               $wheel->mm                   =$mm[$key];
               $wheel->damage_type_id       =$wheel_damages[$key];
               $wheel->save();

            }
            // delete Old Images
            $this->deleteReportImage($damage_id,'1',$request->old_side1);
            $this->deleteReportImage($damage_id,'2',$request->old_side2);
            $this->deleteReportImage($damage_id,'3',$request->old_front);
            $this->deleteReportImage($damage_id,'4',$request->old_back);
            $this->deleteReportImage($damage_id,'5',$request->old_interior);




            //Insert images
            $this->addReportImages($request->side1_images,'1',$damage_id);
            $this->addReportImages($request->side2_images,'2',$damage_id);
            $this->addReportImages($request->front_images,'3',$damage_id);
            $this->addReportImages($request->back_images,'4',$damage_id);
            $this->addReportImages($request->interior_images,'5',$damage_id);
            Toastr::success('Record Updated successfully :)','Success');
            return redirect()->back();

        }
        $data=$this->damageDetails($damage_slug); 
        return view('backend.damage.edit_damage',compact('data'));
     }
     /*****************View damage**********/
     public function viewDamageReport(Request $request,$damage_slug)
     {
         $data=$this->damageDetails($damage_slug);
         $images=DamageImage::where('damage_report_id',$data['damage_report']->id)->get();
         return view('backend.damage.view_damage',compact('data','images'));
     }
     /***************Click add work ********** */
     public function clickAddWork()
     {
         $damage_types=DamageType::get();
            $html='';

            $html.='<div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="country">Wheel <span>*</span></label>
                    <select name="wheel_type[]" id="country" class="form-control">
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
                    <select name="wheel_damage[]" id="country" class="form-control">
                        <option value="" selected disabled hidden>Choose Damage</option>';


                        foreach($damage_types as $damage_row)
                        {
                          $html.='<option value='.$damage_row->id.'>'.$damage_row->name.'</option>';
                          
                        }
             
        $html.='</select>                                     
                </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="housenumber">Marque of Tire <span>*</span></label>
                    <input type="text" class="form-control" id="housenumber" placeholder="Enter Marque of Tire " name="wheel_marque[]">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="busnumber">Tire Size</label>
                    <input type="text" class="form-control" id="busnumber" placeholder="Enter Tire Size" name="tire_size[]">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label for="busnumber">MM</label>
                    <input type="text" class="form-control" id="busnumber" placeholder="Enter MM" name="mm[]">
                    </div>
                </div>
            </div>';
            return response()->json(['result'=>$html,'msg'=>'html fetch Successfully','response_code'=>200]);

     }
     /*************Add Images**************** */
     function addReportImages($images_array,$type,$damage_report_id)
     {
        if(!empty($images_array))
        {
            foreach($images_array as $row)
            {
                $thumbnailImage = Image::make($row);
    
                $rand=rand(9999,99999);
                $file_name=$rand.'.'.$row->getClientOriginalExtension();
    
                $originalPath = public_path().'/assets/backend/reports/';
    
                $thumbnailImage->save($originalPath.$file_name);
    
                $damage_image                          =new DamageImage;
                $damage_image->damage_report_id        =$damage_report_id;
                $damage_image->image                   =$file_name;
                $damage_image->type                          =$type;
                $damage_image->status                        ='1';
                $damage_image->save();
    
            }
        }
        
     }
     /*************delete Report Images*******/
     function deleteReportImage($damage_report_id,$type,$array_values)
     {
        $data= DamageImage::where(['damage_report_id'=>$damage_report_id,'type'=>$type]);

        if(!empty($array_values))
        {
            $data=$data->whereNotIn('id',$array_values);
        }
        $all_images=$data->get();
        foreach($all_images as $row)
        {
            unlink("assets/backend/reports/".$row->image);

        }

        $data->delete();
     }
     /************damage Details*************** */
     function damageDetails($damage_slug)
     {
        $data['damage_report']=DamageReport::where('damage_slug',$damage_slug)->first();
        $data['report_damages']=ReportDamageType::where('damage_report_id',$data['damage_report']->id)->pluck('damage_type_id')->toArray();
        $data['report_places']=ReportDamagePlace::where('damage_report_id',$data['damage_report']->id)->pluck('damage_place_id')->toArray();
        $data['report_wheels']=ReportWheel::where('damage_report_id', $data['damage_report']->id)->get();
        $data['cars']=Car::get();
        $data['car_details']=Car::where('id',$data['damage_report']->car_id)->first();
        $data['damage_types']=DamageType::get();
        $data['damage_places']=DamagePlace::get();
        $side1_response=[];
        $side2_response=[];
        $front_response=[];
        $back_response=[];
        $interior_response=[];
        $damage_images=DamageImage::where('damage_report_id',$data['damage_report']->id)->get();
        foreach($damage_images as $row)
        {
            $result['id']=$row->id;
            $result['src']=asset('assets/backend/reports/'.$row->image);
            if($row->type == 1)
            {
                $side1_response[]=$result;

            }
            elseif($row->type == 2)
            {
                $side2_response[]=$result;

            }
            elseif($row->type == 3)
            {
                $front_response[]=$result;

            }
            elseif($row->type == 4)
            {
                $back_response[]=$result;

            }
            else
            {
                $interior_response[]=$result;
            }
        }
        $data['side1_response']=json_encode($side1_response);
        $data['side2_response']=json_encode($side2_response);
        $data['front_response']=json_encode($front_response);
        $data['back_response']=json_encode($back_response);
        $data['interior_response']=json_encode($interior_response);
        return $data;

     }
     /*************Delete Damage Report *********** */
     public function deleteDamageReport(Request $request)
     {
        ReportWheel::where('damage_report_id',$request->damage_id)->delete();
        ReportDamageType::where('damage_report_id',$request->damage_id)->delete();
        ReportDamagePlace::where('damage_report_id',$request->damage_id)->delete();
        $data=DamageImage::where('damage_report_id',$request->damage_id);
        $list=$data->get();
        foreach($list as $row)
        {
            unlink("assets/backend/reports/".$row->image);
            $data->where('id',$row->id)->delete();

        }
        $damage=DamageReport::where('id',$request->damage_id)->delete();
        if($damage)
        {
            Toastr::success('Record deleted Successfully :)','Success');
            return redirect()->back();
        }
        else
        {
            Toastr::error("Something went's wrong",'Error');
            return redirect()->back();
        }
     }
}
