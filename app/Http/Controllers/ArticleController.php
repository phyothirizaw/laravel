<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        //$data=Article::all();
        //$data=Article::find(5);
        //$data=Article::where('category_id', 5)->get();
         //$data=Article::where('category_id', 5)->first();
         //dd($data); 
         //$data=Article::orderBy('id', 'desc')->get();
        //$data= Article::pluck('title');
       //$data=Article::create([
    //'title' => 'New Article',
    //'body' => 'This is content',
    //'category_id' => '6'

    //$data->update(['title' => 'Updated']);
    $data=Article::find(1)->delete();
	    return view('articles.index',['output'=> $data]);
    }
    public function detail($id)
    {  
        return "Controller - Article Detail - $id";
    }
}
