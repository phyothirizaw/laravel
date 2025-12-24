<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        //$users = User::with('profile')->get();
         //echo $users;

        //$user = User::with('profile')->find(3);
        //$profile = $user->profile;
        //dd($profile);
         //dd($user); 

         //$user = User::with('profile')->first();
         $users = User::with('profile')->get();
         $user = $users[1];
         $bio = $user->profile->bio;
         $user_id = $user->profile->user_id;
        // dd($bio, $user_id);
        echo $bio, $user_id;
    }
}
