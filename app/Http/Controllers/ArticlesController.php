<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use Markdown;

class ArticlesController extends Controller
{
    //
    public function create(){
    	return view('articles.create');
    }

    public function store(Request $request) {
    	$this->validate($request,[
    		'title' => 'required|max:50',
    		'intro' => 'max:150',
    	]);

    	$article = Article::create([
    		'title' => $request->title,
    		'intro' => $request->intro,
    		'content' => $request->content,
    	]);

    	session()->flash('success', 'create successful');
    	return redirect()->route('home');
    }

    public function show($id){
    	$article = Article::findOrFail($id);

        $article->content = Markdown::convertToHtml($article->content);
    	return view('articles.show',compact('article'));
    }

    public function markdown(Request $request){
        return Markdown::convertToHtml($request->content);
    }
}
