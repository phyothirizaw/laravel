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
    public function postList(){
        //  $user = User::with('posts')->find(3);
        //  $posts = $user->posts;
        //  dd($posts);

        //  $user_posts  = User::find(4)->posts;
        //  dd($user_posts);

        $user_posts  = User::find(5)->posts;
        foreach($user_posts as $user_post) {
            //echo $user_post->title  "<br>";
            $user_post_title[] = $user_post->title;
        }
        dd($user_post_title);
        
    }

    public function showLatestComment($userId)
    {
        // Using find()
        $user = User::find($userId);

        // Access single comment through hasOneThrough
        $latestComment = $user->latestCommentThroughPost;

        // Show result
        dd($latestComment->comment);
    }

    public function showUserComments($id)
    {
        // get single user
        $user = User::find($id);

        // get all comments through posts
        $comments = $user->commentsThroughPosts;

        foreach ($comments as $comment) {
             echo $comment->comment . "<br>";
        }
    
    }

   
}
