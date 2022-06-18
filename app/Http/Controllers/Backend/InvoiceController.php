<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Car;
use App\Models\DamageReport;
use App\Models\Contract;
use App\Models\ContractPayment;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Auth;
use Validator;
use Toastr;
use PDF;
class InvoiceController extends Controller
{
    /**********List of Invoices *********/
    public function listInvoices(Request $request)
    {
        $list=Invoice::leftjoin('clients','clients.id','=','invoices.client_id')
                       ->leftjoin('contracts','contracts.id','=','invoices.contract_id')
                       ->select('invoices.*','clients.first_name','clients.last_name','cars.car_code','cars.model','contracts.contract_number')
                       ->leftjoin('cars','cars.id','=','invoices.car_id')
                       ->get();
        return view('backend.invoices.list_invoices',compact('list'));

    }
    /*********Add Invoice*****************/
    public function addInvoice(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'client'                 =>'required',
                'car'                    =>'required',
                'damage_report'          =>'required',
                'status'                 =>'required',
                'contract'               =>'required',
                'invoice_amount'         =>'required'
               
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
            $invoice                                        =new Invoice;
            $invoice->invoice_slug                          =Str::random(20);
            $invoice->client_id                             =$request->client;
            $invoice->car_id                                =$request->car;
            $invoice->contract_id                           =$request->contract;
            $invoice->report_damage_id                      =$request->damage_report;
            $invoice->contract_amount                       =$request->contract_amount;
            $invoice->invoice_amount                        =trim($request->invoice_amount);
            $invoice->status                                ='1';
            $invoice->save();
            if($invoice->id)
            {
                Toastr::success('Invoice created successfully :)','Success');
                return redirect()->back();
            }
            else
            {
                Toastr::error("Something went's wrong",'Error');
                return redirect()->back();
            }
        
        }
        $data['clients'] = Client::get();
        $data['cars']    = Car::get();
        return view('backend.invoices.add_invoice',compact('data'));

    }
    /**********Edit Invoice *****************/
    public function editInvoice(Request $request,$invoice_slug)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'client'                 =>'required',
                'car'                    =>'required',
                'damage_report'          =>'required',
                'status'                 =>'required',
                'contract'               =>'required',
                'invoice_amount'         =>'required'
               
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
            $details                                        =Invoice::where('invoice_slug',$invoice_slug)->first();
            $invoice                                        =Invoice::find($details->id);
            $invoice->client_id                             =$request->client;
            $invoice->car_id                                =$request->car;
            $invoice->contract_id                           =$request->contract;
            $invoice->report_damage_id                      =$request->damage_report;
            $invoice->contract_amount                       =$request->contract_amount;
            $invoice->invoice_amount                        =trim($request->invoice_amount);
            $invoice->status                                =$request->status;
            $invoice->save();
            if($invoice->id)
            {
                Toastr::success('Invoice updated successfully :)','Success');
                return redirect()->back();
            }
            else
            {
                Toastr::error("Something went's wrong",'Error');
                return redirect()->back();
            }

        }
        $data['clients']                    = Client::get();
        $data['cars']                       = Car::get();
        $data['contracts']                  = Contract::get();
        $data['damage_reports']             = DamageReport::get();
        $data['invoice_details']            = Invoice::where('invoice_slug',$invoice_slug)->first();
        return view('backend.invoices.edit_invoice',compact('data'));
    }
    /******************Delete Invoice*********/
    public function deleteInvoice(Request $request)
    {
        $invoice = Invoice::where('id',$request->invoice_id)->delete();
        if($invoice)
        {
            Toastr::success('Invoice deleted successfully :)','Success');
            return redirect()->back();
        }
        else
        {
            Toastr::error("Something went's wrong",'Error');
            return redirect()->back();
        }
    }
    /*****************list of car damages dropdowns****** */
    public function fetchCarDamages(Request $request)
    {
        $damage=DamageReport::where('car_id',$request->car_id)->get();
        return response(['damage_data'=>$damage,'status'=>1,'response_code'=>200]);

    }
     /*****************list of client Contracts dropdowns****** */
     public function fetchClientContracts(Request $request)
     {
         $contract=Contract::where(['client_id'=>$request->client_id])->get();
         return response(['contract_data'=>$contract,'status'=>1,'response_code'=>200]);
 
     }
     /**********************fetch total amount******************** */
     public function fetchContractorTotalAmount(Request $request)
     {
        $contract=ContractPayment::where(['contract_id'=>$request->contract_id])->sum('amount');
        return response(['contract_amount'=>$contract,'status'=>1,'response_code'=>200]);

     }
     /********************delete Invoice************************ */
     public function downloadInvoice(Request $request,$invoice_slug)
     {
        return view('backend.invoices.invoice');
        // $invoice_details=Invoice::where('invoice_slug',$invoice_slug)->first();
        // if($invoice_details->status =='0')
        // {
        //     Toastr::error("Please enable the status for download invoice",'Error');
        //     return redirect()->back();
        // }
        // $pdf = PDF::loadView('backend.invoices.invoice', []);
    
        // return $pdf->download('itsolutionstuff.pdf');
            
     }
}
