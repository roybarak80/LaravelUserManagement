<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\User;

class UserController extends Controller
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
            if (request()->ajax()) {
                $data = Input::all();
                $user = User::where('user_id', $data['user_id'])->first();
               
                // if user has changed he's type then reset the opposite type to null
                if ($data['user_type'] == 'Demo') {
                    $user->credit_card_last_digits = null;
                    $user->demo_expiration_date = $data['demo_expiration_date'] ? date('Y-m-d', strtotime(str_replace('.', '/', $data['demo_expiration_date']))) : $user->demo_expiration_date;
                }

                if ($data['user_type'] == 'Live') {
                    $user->demo_expiration_date = null;
                    $user->credit_card_last_digits = $data['credit_card_last_digits'] ? $data['credit_card_last_digits'] : $user->credit_card_last_digits;
                }
               
                // get all data from Ajax request
                $user->user_type = $data['user_type'] ? $data['user_type'] : $user->user_type;
                $user->email = $data['email'] ? $data['email'] : $user->email;
                $user->first_name = $data['first_name'] ? $data['first_name'] : $user->first_name;
                $user->last_name = $data['last_name'] ? $data['last_name'] : $user->last_name;
                $user->created_at = $data['created_at'] ? $data['created_at'] : $user->created_at;
                $user->updated_at = date("Y-m-d H:i:s");
                
                $user->save();
               
                return response()->json(['status' => 200, 'message' => 'save success']);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    //Delete user

    public function delete_user(Request $request)
    {
        try {

            // get the selected user's id
            $user_id = $request['user_id'];
            User::where('user_id', $user_id)->delete();

            return response()->json(['status' => 200, 'message' => 'delete success']);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    // Navigate to AddUser Page

    public function add_user()
    {
        return view('layouts.adduser');
    }


    // Store new user

    public function save_user(Request $request)
    {
        try {
            if (request()->ajax()) {
                $lastUserId = User::where('user_id', '>', 0)->orderBy('user_id', 'desc')->get('user_id')->first()->toArray();
               
                // initiate user model
                $user = new User();
                // collect all the data from the request
                $data = Input::all();
                // assigning the data to the user object
                $user->user_id = intval($lastUserId['user_id'] + 1);
                $user->user_type = $data['user_type'];
                $user->email =$data['email'];
                $user->password = md5($data['password']);
                $user->first_name =$data['first_name'];
                $user->last_name = $data['last_name'];
               
                $user->save();
               
                return response()->json(['status' => 200, 'message' => 'save success']);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
