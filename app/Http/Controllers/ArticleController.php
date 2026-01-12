<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $data=Article::all();
        //$data=Article::find(5);
        //$data=Article::where('category_id', 5)->get();
         //$data=Article::where('category_id', 5)->first();
        //echo $data;

         //$data=Article::orderBy('id', 'desc')->get();
        //$data= Article::pluck('title');
       //$data=Article::create([
    //'title' => 'New Article',
    //'body' => 'This is content',
    //'category_id' => '6'

    //$data->update(['title' => 'Updated']);
    // $data=Article::find(1)->delete();
	   return view('articles.index',['articles'=> $data]);
    }
    public function detail($id)
    {  
        return "Controller - Article Detail - $id";
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
      Article::create([
          'title' => $request->title,
          'body' => $request->body,
          'category_id' => $request->category_id,
      ]);

      return redirect('/articles');
    }
}
