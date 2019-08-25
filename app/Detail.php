<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Detail extends Model
{
    // public static function getUserDetails(){
      
    //     $user_details =  DB::table('users')
    //     ->select('users.email, users.first_name, users.last_name,user_types_translation_table.type_name, users.demo_expiration_date, users.credit_card_last_digits' )
    //     ->join('user_types_translation_table', 'user_types_translation_table.type_id', '=', 'users.user_type')->get();
    //     dd($user_details);
    //     return $user_details;
    // }

    protected $table = 'users';
    public function getUser(){
        
        return $this->hasMany('\App\User');
    }
}
