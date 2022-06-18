<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Car;
use App\Models\Client;
use App\Models\Contract;
use App\Models\ContractPayment;
use App\Models\ExtendContract;
use Auth;
use Validator;
use Toastr;
use Image;
use Response;
class ContractController extends Controller
{
    /*************list of Contracts********/
    public function listContracts(Request $request)
    {
        $list_contracts=Contract::leftjoin('cars','cars.id','=','contracts.car_id')
                                  ->leftjoin('clients','clients.id','=','contracts.client_id')
                                  ->select('contracts.*','clients.first_name','clients.last_name','cars.car_code','cars.model')
                                  ->get();
        $response=[];
        foreach($list_contracts as $row)
        {
            $amount_details                 =ContractPayment::where(['contract_id'=>$row->id])->sum('amount');
            $result['id']                   =$row->id;
            $result['contract_number']      =$row->contract_number;
            $result['first_name']           =$row->first_name;
            $result['last_name']            =$row->last_name;
            $result['car_code']             =$row->car_code;
            $result['model']                =$row->model;
            $result['amount']               =$amount_details;
            $result['created_at']           =$row->created_at;
            $response[]                     =$result;

        } 
       return view('backend.contracts.list_contracts',compact('response'));
    }
    /************Add Contract*************/
    public function addContract(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'car' => 'required',
                'client' => 'required',
                'deposit'=>'required|min:3|max:50',
                'price_add_km'=>'required',
                'rent_amount'=>'required',
                'fuel_niveau'=>'required',
                'rental_period'=>'required',
                'start_date'=>'required',
                'hour_depart'=>'required',
                'free_km'=>'required',
                'km_depart'=>'required',
                'km_arrival'=>'required',
                'fuel_arrival'=>'required',
                'date_arrival'=>'required',
                'hour_arrival'=>'required',
                'extra_charges'=>'sometimes|nullable',
                'amount'=>'required',
                'payment_date'=>'required',
                'payment_type'=>'required',
                'payment_description'=>'required'

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
          
            //Save contract data;
            $contract                            = new Contract;
            $contract->contract_number           = rand(99999,11111).Str::random(10);
            $contract->client_id                 = $request->client;
            $contract->car_id                    = $request->car;
            $contract->deposit                   = trim($request->deposit);
            $contract->rent_amount               = trim($request->rent_amount);
            $contract->price_add_km              = trim($request->price_add_km);
            $contract->fuel_niveau               = trim($request->fuel_niveau);
            $contract->rental_period             = trim($request->rental_period);
            $contract->start_date                = trim($request->start_date);
            $contract->end_date                  = date('Y-m-d', strtotime($request->start_date . " +".$request->rental_period." days"));
            $contract->hour_depart               = trim($request->hour_depart);
            $contract->free_km                   = trim($request->free_km);
            $contract->km_arrival                = trim($request->km_arrival);
            $contract->km_depart                 = trim($request->km_depart);
            $contract->fuel_arrival              = trim($request->fuel_arrival);
            $contract->date_arrival              = trim($request->date_arrival);
            $contract->hour_arrival              = trim($request->hour_arrival);
            $contract->extra_charges             = trim($request->extra_charges);

            $contract->save();

            if($contract->id)
            {
                // insert Contract payment
                $payment                            = new ContractPayment;
                $payment->contract_id               = $contract->id;
                $payment->amount                    = trim($request->amount);
                $payment->payment_date              = trim($request->payment_date);
                $payment->payment_type              = trim($request->payment_type);
                $payment->payment_description       = trim($request->payment_description);
                $payment->type                      = '1';
                $payment->save();
                if($payment->id)
                {
                    Toastr::success('Contract Created Successfully :)','Success');
                    return redirect()->back();
                }

            }
            else
            {
                Toastr::error("Something went's wrong",'Error');
                return redirect()->back();
            }

            

        }
        $clients=Client::get();
        $cars=Car::get();
        return view('backend.contracts.add_contract',compact('clients','cars'));

    }
    /************Edit Contract***********/
    public function editContract(Request $request,$contract_number)
    {
        if($request->isMethod('post'))
        {
            // dd($request->all());
            $validator = Validator::make($request->all(),[
                'car' => 'required',
                'client' => 'required',
                'deposit'=>'required|min:3|max:50',
                'price_add_km'=>'required',
                'rent_amount'=>'required',
                'fuel_niveau'=>'required',
                'rental_period'=>'required',
                'start_date'=>'required',
                'hour_depart'=>'required',
                'free_km'=>'required',
                'km_depart'=>'required',
                'km_arrival'=>'required',
                'fuel_arrival'=>'required',
                'date_arrival'=>'required',
                'hour_arrival'=>'required',
                'extra_charges'=>'sometimes|nullable',
                'amount'=>'required',
                'payment_date'=>'required',
                'payment_type'=>'required',
                'payment_description'=>'required'

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
            $contract_details                    =Contract::where('contract_number',$contract_number)->first();
          
            //Save contract data;
            $contract                            = Contract::find($contract_details->id);
            $contract->client_id                 = $request->client;
            $contract->car_id                    = $request->car;
            $contract->deposit                   = trim($request->deposit);
            $contract->rent_amount               = trim($request->rent_amount);
            $contract->price_add_km              = trim($request->price_add_km);
            $contract->fuel_niveau               = trim($request->fuel_niveau);
            $contract->rental_period             = trim($request->rental_period);
            $contract->start_date                = trim($request->start_date);
            $contract->end_date                  = date('Y-m-d', strtotime($request->start_date . " +".$request->rental_period." days"));
            $contract->hour_depart               = trim($request->hour_depart);
            $contract->free_km                   = trim($request->free_km);
            $contract->km_arrival                = trim($request->km_arrival);
            $contract->km_depart                 = trim($request->km_depart);
            $contract->fuel_arrival              = trim($request->fuel_arrival);
            $contract->date_arrival              = trim($request->date_arrival);
            $contract->hour_arrival              = trim($request->hour_arrival);
            $contract->extra_charges             = trim($request->extra_charges);

            $contract->save();

            if($contract_details->id)
            {
                // insert Contract payment
                $payment                            = ContractPayment::where(['contract_id'=>$contract_details->id,'type'=>'1'])
                                                                      ->update([
                                                                    'amount'=>trim($request->amount),
                                                                    'payment_date'=>trim($request->payment_date),
                                                                    'payment_type'=>trim($request->payment_type),
                                                                    'payment_description'=>trim($request->payment_description)
                                                                     ]);
               
                if($payment)
                {
                    Toastr::success('Contract Updated Successfully :)','Success');
                    return redirect()->back();
                }

            }
            else
            {
                Toastr::error("Something went's wrong",'Error');
                return redirect()->back();
            }

        }
        $data=$this->contractDetails($contract_number);
        // dd($data);
        return view('backend.contracts.edit_contract',compact('data'));
    }
    /************View Contract***********/
    public function viewContract(Request $request,$contract_number)
    {
        $data=$this->contractDetails($contract_number);
        return view('backend.contracts.view_contract',compact('data'));

    }
    /***********Delete Contract***********/
    public function deleteContract(Request $request)
    {
        ContractPayment::where(['contract_id'=>$request->contract_id])->delete();
        ExtendContract::where(['contract_id'=>$request->contract_id])->delete();
        Contract::where('id',$request->contract_id)->delete();
        Toastr::success('Deleted  Successfully :)','Success');
        return redirect()->back();

    }
    /***************Add Extend Days************/
    public function addExtendDay(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'extend_days'=>'required',
            'extend_free_kms'=>'required',
            'extend_price'=>'required',
            'amount'=>'required',
            'payment_date'=>'required',
            'payment_type'=>'required',
            'payment_description'=>'required'

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
        $contract_details                          = Contract::where('id',$id)->first();
        $extended                                  =new ExtendContract;
        $extended->contract_id                     =$id;
        $extended->extend_days                     =trim($request->extend_days);
        $extended->new_arrival_date                =date('Y-m-d', strtotime($contract_details->end_date . " +".$request->extend_days." days"));
        $extended->free_kms                        =trim($request->extend_free_kms);
        $extended->new_free_kms                    =$contract_details->free_kms + trim($request->extend_free_kms);
        $extended->extend_price                    =trim($request->extend_price);
        $extended->save();

        Contract::where('id',$id)->update(['end_date'=>$extended->new_arrival_date]);

        if($extended->id)
        {
            // insert Contract payment
            $payment                            = new ContractPayment;
            $payment->contract_id               = $id;
            $payment->extend_id                 = $extended->id;
            $payment->amount                    = trim($request->amount);
            $payment->payment_date              = trim($request->payment_date);
            $payment->payment_type              = trim($request->payment_type);
            $payment->payment_description       = trim($request->payment_description);
            $payment->type                      = '2';
            $payment->save();
            if($payment->id)
            {
                Toastr::success('Days extended  Successfully :)','Success');
                return redirect()->back();
            }

        }
        else
        {
            Toastr::error("Something went's wrong",'Error');
            return redirect()->back();
        }
    }

    /********fetch details of extend**********/
    public function fetchExtendDayDetails(Request $request)
    {
        $data= ExtendContract::where(['contract_id'=>$request->contract_id,'id'=>$request->id])->first();
        $payment=ContractPayment::where(['contract_id'=>$request->contract_id,'extend_id'=>$request->id])->first();

        return response(['extend_data'=>$data,'payment_data'=>$payment,'status'=>1,'response_code'=>200]);
    }
    /**************Edit Extend Day************/
    public function editExtendDay(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'extend_days'=>'required',
            'extend_free_kms'=>'required',
            'extend_price'=>'required',
            'amount'=>'required',
            'payment_date'=>'required',
            'payment_type'=>'required',
            'payment_description'=>'required'

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
        $contract_details                          = Contract::where('id',$id)->first();
        $extend=ExtendContract::where(['id'=>$request->extend_id,'contract_id'=>$id])
                               ->update([
                                    'extend_days'                     =>trim($request->extend_days),
                                    'new_arrival_date'                =>date('Y-m-d', strtotime($contract_details->end_date . " +".$request->extend_days." days")),
                                    'free_kms'                        =>trim($request->extend_free_kms),
                                    'new_free_kms'                    =>$contract_details->free_kms + trim($request->extend_free_kms),
                                    'extend_price'                    =>trim($request->extend_price)
                                ]);
        $extended=ExtendContract::where(['id'=>$request->extend_id,'contract_id'=>$id])->first();
        Contract::where('id',$id)->update(['end_date'=>$extended->new_arrival_date]);
        if(!empty($extend))
        {
            // insert Contract payment
            $payment = ContractPayment::where(['contract_id'=>$id,'extend_id'=>$request->extend_id])
                                        ->update([
                                            'amount'=>trim($request->amount),
                                            'payment_date'=>trim($request->payment_date),
                                            'payment_type'=>trim($request->payment_type),
                                            'payment_description'=>trim($request->payment_description)

                                        ]);
           
            if($payment)
            {
                Toastr::success('Days Update  Successfully :)','Success');
                return redirect()->back();
            }

        }
        else
        {
            Toastr::error("Something went's wrong",'Error');
            return redirect()->back();
        }
    }
    /************delete Extend Day***********/
    public function deleteExtendDay(Request $request)
    {
        ContractPayment::where(['extend_id'=>$request->delete_extend_id,'contract_id'=>$request->extend_contract_id,'type'=>'2'])->delete();
        ExtendContract::where(['id'=>$request->delete_extend_id,'contract_id'=>$request->extend_contract_id])->delete();  
        Toastr::success('Deleted  Successfully :)','Success');
        return redirect()->back();
    }
    /***************contract details******** */
    public function contractDetails($contract_number)
    {
        $data['contract_details'] = Contract::where('contract_number',$contract_number)->first();
        $data['clients']=Client::get();
        $data['cars']=Car::get();
        $payment =ContractPayment::where('contract_id',$data['contract_details']->id);
        $data['contract_payment']=$payment->where('type','1')->first();
        $extend_details = ExtendContract::where('contract_id',$data['contract_details']->id)->get();
     
        $extend_response=[];
        foreach($extend_details as $row)
        {
            $type=ContractPayment::where('contract_id',$data['contract_details']->id)->where('extend_id',$row->id)->first();
            $result['id']                           =$row->id;
            $result['new_free_kms']                 =$row->new_free_kms;
            $result['extend_days']                  =$row->extend_days;
            $result['new_arrival_date']             =$row->new_arrival_date;
            $result['extend_price']                 =$row->extend_price;
            $result['payment_type']                 =$type->payment_type;
            $result['payment_date']                 =$type->payment_date;
            $extend_response[]                      =$result;
        }
        $data['extend_response']=$extend_response;
        return $data;
    }

}
