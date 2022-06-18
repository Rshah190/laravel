<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Car;
use App\Models\DamageReport;
use App\Models\Contract;
use Helper;
use Toastr;
use Auth;
use Session;
use Validator;
use Cookie;
use Config;
use Image;
class AuthController extends Controller
{
    /************login*************/
    public function login(Request $request)
    {
       if($request->isMethod('post'))
       {
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required',
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
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Authentication was successful...
                Toastr::success('login successfully :)','Success');
                return redirect('/admin/dashboard');
    
            }
            else
            {
                Toastr::error('Invalid Crediantials','Error');
                return redirect()->back();
            }           
           

       }
       return view('backend.auth.login');

    }
    /************forgot password*****/
    public function forgotPassword(Request $request)
    {
        if($request->isMethod('post'))
        {
           

            $validator = Validator::make($request->all(),[
                'email' => 'required',
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
            $user =User::where(['email'=>$request->email,'role_id'=>Config::get('constants.ROLES.Admin')])->first();
            if(!empty($user))
            {
             
               $url=url('/admin/change/password/'.$user->id);
               $data=['name'=>$user->first_name.' '.$user->last_name,'email'=>$request->email,'user_message'=>'Hello shah','url'=>$url];
               $subject='Forgot Password';
               $view='forgot_password';
               $type=1;
               $check= Helper::sendEmail($data,$view,$subject,$type);
               if($check == 1)
               {
                    $startTime = date("Y-m-d H:i:s");
                    $convertedTime = date('Y-m-d H:i:s', strtotime('+20 minutes', strtotime($startTime)));
                    User::where('id',$user->id)->update(['link_expire_time'=>$convertedTime]);
                    Toastr::success('Email sent successfully :)','Success');
                    return redirect('/admin/forgot/password');
               }
               else
               {
                Toastr::error('Something went error','Error');
                return redirect('/admin/forgot/password');
               }
             
               
            }
            else
            {
                Toastr::error('Invalid email','Error');
                return redirect('/admin/forgot/password');
            }

        }
        return view('backend.auth.forgot_password');
    }
    /*************change Password****/
    public function changePassword(Request $request,$id)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'password' => 'required|confirmed|min:6'
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
            $current_time = date("Y-m-d H:i:s");
            $user=User::where('id',$id)->first();
            if(!empty($user))
            {
                if($current_time < $user->link_expire_time)
                {
                    User::where('id',$id)->update(['password'=>bcrypt($request->password)]);
                    Toastr::success('Password changed Successfully','Success');
                    return redirect('/admin/login');
                }
                else
                {
                    Toastr::error('Link is expire','Error');
                    return redirect('/admin/login');
                }

            }
            else
            {
                Toastr::error('User does not exists','Error');
                return redirect('/admin/login');

            }




        }
        return view('backend.auth.change_password',compact('id'));
    }
    /*************Dashboard*************/
    public function dashboard()
    {
        $data['total_clients']=count(Client::get());
        $data['total_cars']=count(Car::get());
        $data['total_damages']=count(DamageReport::get());
        $data['total_contracts']=count(Contract::get());
        return view('backend.auth.dashboard',compact('data'));
    }
    /**************Logout****************/
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        Toastr::success('Logout Successfully :)','Success');
        return redirect('/admin/login');
    }
    /*************Update Profile**********/
    public function MyProfile(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(),[
                'first_name' => 'required',
                'last_name' => 'required',
                'email'=>'required',
                'phone'=>'required',
                'image'=>'sometimes|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address'=>'required|string',
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



            $originalImage= $request->file('image');
            if(!empty($originalImage))
            {
                $thumbnailImage = Image::make($originalImage);

                $rand=rand(9999,99999);
                $file_name=$rand.'.'.$originalImage->getClientOriginalExtension();
    
                $originalPath = public_path().'/assets/backend/images/';
    
                $thumbnailImage->save($originalPath.$file_name);
    
                $image=$file_name;

            }
            else
            {
                $image=$request->old_category_icon;

            }

            $update =User::where(['id'=>auth()->user()->id,'role_id'=>Config::get('constants.ROLES.Admin')])->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'image'=>$image,
                'address'=>$request->address
            ]);
            if($update)
            {
                Toastr::success('Profile update successfully :)','Success');
                return redirect()->back();
            }

        }
        return view('backend.auth.profile');
      
    }
}
