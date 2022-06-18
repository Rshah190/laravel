<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Car;
use Illuminate\Support\Str;
use Auth;
use Validator;
use Toastr;
class CarController extends Controller
{
    /***********list of cars*********/
    public function listCars(Request $request)
    {
        $list_cars=Car::get();
        return view('backend.cars.list_cars',compact('list_cars'));

    }
    /***********Add car**************/
    public function addCar(Request $request)
    {
        if($request->isMethod('POST'))
        {
            $validator = Validator::make($request->all(),[
                'car_code'             => 'required|min:2|max:20',
                'marque'               => 'required|min:2|max:100',
                'model'                =>'required',
                'license_condition'    =>'required',
                'age_condition'        =>'required',
                'number_plate'         =>'required',
                'damage_report'        =>'required',
                'classis_no'           =>'required',
                'engine_no'            =>'required',
                
                
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

            $car                                 =new Car;
            $car->car_slug                       =Str::random(20);
            $car->car_code                       =trim($request->car_code);
            $car->marque                         =trim($request->marque);
            $car->license_condition              =trim($request->license_condition);
            $car->age_condition                  =trim($request->age_condition);
            $car->model                          =trim($request->model);
            $car->number_plate                   =trim($request->number_plate);
            $car->classis_no                     =trim($request->classis_no);
            $car->engine_no                      =trim($request->engine_no);
            $car->damage_report                  =trim($request->damage_report);
            $car->status                         ='1';
            $car->save();
            if(!empty($car->id))
            {
                Toastr::success('Car Added Successfully :)','Success');
                return redirect()->back();

            }
            else
            {
                Toastr::error("Something went's wrong",'Error');
                return redirect()->back();
            }
        }
        return view('backend.cars.add_car');
    }
    /*************View Car***********/
    public function viewCar(Request $request,$car_slug)
    {
        $car_details=Car::where('car_slug',$car_slug)->first();
        return view('backend.cars.view_car',compact('car_details'));
    }
    /********************Edit Car*******/
    public function editCar(Request $request,$car_slug)
    {
        if($request->isMethod('post'))
        {
          
                $validator = Validator::make($request->all(),[
                    'car_code'             => 'required|min:2|max:20',
                    'marque'               => 'required|min:2|max:100',
                    'model'                =>'required',
                    'license_condition'    =>'required',
                    'age_condition'        =>'required',
                    'number_plate'         =>'required',
                    'damage_report'        =>'required',
                    'classis_no'           =>'required',
                    'engine_no'            =>'required',
                    
                    
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
                $car_details=Car::where('car_slug',$car_slug)->first();

                $car                                 = Car::find($car_details->id);
                $car->car_code                       =trim($request->car_code);
                $car->marque                         =trim($request->marque);
                $car->license_condition              =trim($request->license_condition);
                $car->age_condition                  =trim($request->age_condition);
                $car->model                          =trim($request->model);
                $car->number_plate                   =trim($request->number_plate);
                $car->classis_no                     =trim($request->classis_no);
                $car->engine_no                      =trim($request->engine_no);
                $car->damage_report                  =trim($request->damage_report);
                $car->status                         ='1';
                $car->save();
                if(!empty($car->id))
                {
                    Toastr::success('Car Updated Successfully :)','Success');
                    return redirect()->back();

                }
                else
                {
                    Toastr::error("Something went's wrong",'Error');
                    return redirect()->back();
                }
            

        }
        $car_details=Car::where('car_slug',$car_slug)->first();
        return view('backend.cars.edit_car',compact('car_details'));
    }
    /******************delete Car******/
    public function deleteCar(Request $request)
    {
        $delete_id=Car::where('id',$request->car_id)->delete();
        if(!empty($delete_id))
        {
            Toastr::success('Car deleted Successfully :)','Success');
            return redirect()->back();

        }
        else
        {
            Toastr::error("Something went's wrong",'Error');
            return redirect()->back();
        }
        
    }
}
