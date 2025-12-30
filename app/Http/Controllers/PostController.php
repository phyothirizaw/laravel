<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function postedUser() 
    {
        $post= Post::find(5)->user; // WHERE id = 3
        $post_user = $post->name;
        dd($post_user);
    }
}
