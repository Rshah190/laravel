<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Client;
use Illuminate\Support\Str;
use Auth;
use Validator;
use Toastr;
class ClientController extends Controller
{
    /**************Add client*********/
    public function addClient(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'first_name' => 'required|min:2|max:20',
                'last_name' => 'required|min:2|max:20',
                'license_no'=>'required|unique:clients',
                'license_date'=>'required',
                'date_of_birth'=>'required',
                'contact_no'=>'required|unique:clients',
                'street'=>'required|min:3|max:30',
                'house_no'=>'required',
                'bus_no'=>'sometimes|nullable',
                'city'=>'required|min:3|max:30',
                'zipcode'=>'required|min:5',
                'company'=>'required',
                'company_name'=>'sometimes|nullable',
                'address'=>'required|min:4|max:100',
                'vat_no'=>'required',
                'terms_of_payment'=>'required'
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
            $client                                =new Client;
            $client->client_slug                   =Str::random(20);
            $client->first_name                    =trim($request->first_name);
            $client->last_name                     =trim($request->last_name);
            $client->license_no                    =trim($request->license_no);
            $client->license_date                  =trim($request->license_date);
            $client->dob                           =trim($request->date_of_birth);
            $client->contact_no                    =trim($request->contact_no);
            $client->street                        =trim($request->street);
            $client->house_no                      =trim($request->house_no);
            $client->bus_no                        =trim($request->bus_no);
            $client->city                          =trim($request->city);
            $client->zipcode                       =trim($request->zipcode);
            $client->company_status                =trim($request->company);
            $client->company_name                  =trim($request->company_name);
            $client->address                       =trim($request->address);
            $client->vat_no                        =trim($request->vat_no);
            $client->terms_of_payment              =trim($request->terms_of_payment);
            $client->country_id                    =trim($request->country);
            $client->status                        ='1';
            $client->save();
            if(!empty($client->id))
            {
                Toastr::success('Client Added Successfully :)','Success');
                return redirect()->back();

            }
            else
            {
                Toastr::error("Something went's wrong",'Error');
                return redirect()->back();
            }
        }
        $countries=Country::get();
        return view('backend.clients.add_client',compact('countries'));
    }
    /***************Edit Client*******/
    public function editClient(Request $request,$client_slug)
    {
        if($request->isMethod('post'))
        {
            
            $validator = Validator::make($request->all(),[
                'first_name' => 'required|min:2|max:20',
                'last_name' => 'required|min:2|max:20',
                'license_no'=>'required',
                'license_date'=>'required',
                'date_of_birth'=>'required',
                'contact_no'=>'required',
                'street'=>'required|min:3|max:30',
                'house_no'=>'required',
                'bus_no'=>'sometimes|nullable',
                'city'=>'required|min:3|max:30',
                'zipcode'=>'required|min:5',
                'company'=>'required',
                'company_name'=>'sometimes|nullable',
                'address'=>'required|min:4|max:100',
                'vat_no'=>'required',
                'terms_of_payment'=>'required'
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
            $details=Client::where('client_slug',$client_slug)->first();
            $client                                =Client::find($details->id);
            $client->first_name                    =trim($request->first_name);
            $client->last_name                     =trim($request->last_name);
            $client->license_no                    =trim($request->license_no);
            $client->license_date                  =trim($request->license_date);
            $client->dob                           =trim($request->date_of_birth);
            $client->contact_no                    =trim($request->contact_no);
            $client->street                        =trim($request->street);
            $client->house_no                      =trim($request->house_no);
            $client->bus_no                        =trim($request->bus_no);
            $client->city                          =trim($request->city);
            $client->zipcode                       =trim($request->zipcode);
            $client->company_status                =trim($request->company);
            $client->company_name                  =trim($request->company_name);
            $client->address                       =trim($request->address);
            $client->vat_no                        =trim($request->vat_no);
            $client->terms_of_payment              =trim($request->terms_of_payment);
            $client->country_id                    =trim($request->country);
            $client->save();
            if(!empty($client->id))
            {
                
                Toastr::success('Client Updated Successfully :)','Success');
                return redirect()->back();

            }
            else
            {
                Toastr::error("Something went's wrong",'Error');
                return redirect()->back();
            }

        }
        $client_details=Client::where('client_slug',$client_slug)->first();
        // dd($client_details);
        $countries=Country::get();
        return view('backend.clients.edit_client',compact('countries','client_details'));
    }
    /********************Delete Client******/
    public function deleteClient(Request $request)
    {
        $client=Client::where('id',$request->client_id)->delete();
        if($client)
        {
            Toastr::success('Client deleted Successfully :)','Success');
            return redirect()->back();
        }
        else
        {
            Toastr::error("Something went's wrong",'Error');
            return redirect()->back();
        }
       
        
    }
    /****************list of clients ********/
    public function listClients(Request $request)
    {
        $list_clients =Client::leftjoin('countries','countries.id','=','clients.country_id')
                               ->select('clients.*','countries.name')
                               ->get();
        return view('backend.clients.list_clients',compact('list_clients'));
    }
    /*****************View clients***********/
    public function viewClient(Request $request,$client_slug)
    {
        $client=Client::leftjoin('countries','countries.id','=','clients.country_id')
                        ->select('clients.*','countries.name')
                        ->where('clients.client_slug',$client_slug)
                        ->first();
        return view('backend.clients.view_client',compact('client'));

    }
}
