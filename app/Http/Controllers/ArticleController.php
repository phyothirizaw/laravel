<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles=Article::all();
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
	   //return view('articles.index',['articles'=> $data]);
        return view('articles.index', compact('articles'));
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
    //   Article::create([
    //       'title' => $request->title,
    //       'body' => $request->body,
    //       'category_id' => $request->category_id,
    //   ]);

        $validated=$request->validate([
            'title'=>'required|min:3',
            'body' => 'required|min:10',
            'category_id' => 'required|integer',
        ]);

        Article::create($validated);

        return redirect('/articles/create')->with('success', 'Article created successfully!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id); // find and If ID is invalid, Laravel shows 404
        return view('articles.edit', compact('article'));
    }

     public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        return redirect('/articles');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/articles');
    }
}
