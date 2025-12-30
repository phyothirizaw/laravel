<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class LikeController extends Controller
{
    //
    public function showLikedPosts()
    {
        $user = User::find(4);
        $likedPosts = $user->likedPosts()->get();
        //dd($likedPosts);

        foreach ($likedPosts as $post) {
             //echo $post->title . "<br>";
           $title[] = $post->title;

        }
        dd($title);
    }

    public function showPostLikers()
    {
        $post = Post::find(4); // get Post 2

        // Get all users who liked the post
        $likers = $post->likers()->get();

        foreach ($likers as $user) {
            echo($user->name . "<br>");
        }
    }
}
