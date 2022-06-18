<?php
namespace App\Http\Helper;
use Mail;
use Auth;
use App\Models\User;
use Exception;

class Helper
{ 
   	
    /*****************Send email************************/
    public static function sendEmail($data,$view,$subject)
    {
      try 
      {
          
          $folder='backend';
         
          Mail::send($folder.'.'.'email.'.$view, $data, function($message) use ($data,$subject) {
                $message->to($data['email'])->subject($subject.' | Luxury Rental');
              });
          return 1;
      }
      catch(Exception $e)
      {

        return $e->getMessage();

      } 
    }
  

    
    
    
    

 }


