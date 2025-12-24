<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    //
    public function index() {
        //$profile = Profile::find(10);
        //$user_name = $profile->user->name;
        //dd($user_name);

         $profile= Profile::with('user')->get();
         $name=$profile[2]->user->name;
         $email=$profile[4]->user->email;
         dd($email);
     }
}
