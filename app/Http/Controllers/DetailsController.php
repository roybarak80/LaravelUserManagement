<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DetailsController extends Controller
{
    public function print_details()
    {
        $user_details = User::all()->toArray();
        
        return view('layouts.showusers')->with('userDetails', $user_details);
       
    }

    //Save / Update user details
    public function save_user_details(Request $request)
    {
        try {
            // get user_id
            $user_id = $request['user_id'];
     
            // get relevant user object from DB
            $user = User::select()
                  ->where('user_id', '=', $user_id)
                  ->get()->first();
      
            // if user has changed he's type then reset the opposite type to null      
            if ($request['user_type'] == 'Demo') {
                $user->credit_card_last_digits = null;
                $user->demo_expiration_date = $request['demo_expiration_date'] ? date('Y-m-d', strtotime(str_replace('.', '/', $request['demo_expiration_date']))) : $user->demo_expiration_date;
            }

            if ($request['user_type'] == 'Live') {
                $user->demo_expiration_date = null;
                $user->credit_card_last_digits = $request['credit_card_last_digits'] ? $request['credit_card_last_digits'] : $user->credit_card_last_digits;
            }

            // get all data from Ajax request
            $user->user_type = $request['user_type'] ? $request['user_type'] : $user->user_type;
            $user->email = $request['email'] ? $request['email'] : $user->email;
            $user->first_name = $request['first_name'] ? $request['first_name'] : $user->first_name;
            $user->last_name = $request['last_name'] ? $request['last_name'] : $user->last_name;
            $user->created_at = $request['created_at'] ? $request['created_at'] : $user->created_at;
            $user->updated_at = date("Y-m-d H:i:s");
            $user->save();
            return response()->json(['status' => 200, 'message' => 'save success']);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
    }

     //Delete user
     public function delete_user(Request $request){
        try {

            // get the selected user's id
            $user_id = $request['user_id'];
            User::where('user_id',$user_id)->delete();

            return response()->json(['status' => 200, 'message' => 'delete success']);
        }catch (\Exception $e) {
            echo $e->getMessage();
        }
 
     }
}
