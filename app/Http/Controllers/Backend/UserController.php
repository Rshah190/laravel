<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Helper;
use Toastr;
use Auth;
use Session;
use Validator;
use Cookie;
use Config;
use Response;
class UserController extends Controller
{
    /*******listing of Sellers/Buyers****/
    public function listUsers(Request $request)
    {
        $users=User::where('role_id','!=',Config::get('constants.ROLES.Admin'))->get();
        return view('backend.users.list_users',compact('users'));

    }
    /*******Delete Selller/Buyer account***/
    public function deleteUser(Request $request)
    {
        $user_id=User::where('id',$request->user_id)->delete();
        if($user_id ==1)
        {
            return response(['message'=>'User Deleted Successfully','response_code' =>'200','icon'=>'success','confirmButtonText'=>'Yes']);
        }
        else
        {
            return response(['message'=>'Something went Wrong','response_code' =>'500','icon'=>'error','confirmButtonText'=>'close']);

        }


    }
    /**************************Block User ****/
    public function BlockUser(Request $request)
    {
        $user_id=User::where('id',$request->user_id)->update(['status'=>$request->type_id]);
        if($request->type_id==0)
        {
            return response(['message'=>'User Block Successfully','response_code' =>'200','icon'=>'success','title'=>'Blocked']);
        }
        else
        {
            return response(['message'=>'User Unblock Successfully','response_code' =>'200','icon'=>'success','title'=>'Unblocked']);

        }
    }
}
