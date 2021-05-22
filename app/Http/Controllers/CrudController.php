<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CrudController extends Controller
{
    public function index(){
        $articles = Article::get();
        return view('home',compact('articles'));
    }
    public function create(){
        return view("create");
    }
    public function store(){
        $validated = request()->validate([
            'title' => 'required|min:3',
            'category' => 'required',
            'image' => 'required',
            'body' => 'required'
        ]);
        
        $file = request()->file('image');
        $file->move('img',$file->getClientOriginalName());
        $validated['image'] = $file->getClientOriginalName();
        $validated['slug'] = Str::slug($validated['title']); 
        Article::create($validated);
        
        return redirect('/create')->with('status','Article has been added');
    }
    public function delete(){
        $article = Article::where('slug',request()->slug)->first();
        File::delete(public_path('img/'.$article->image));
        Article::where('slug',request()->slug)->delete();
        return redirect('/')->with('status','Post has been deleted');
    }
    public function detail($slug){
        $article = Article::where('slug',$slug)->first();
        return view('detail',['article'=>$article]);
    }
    public function update($slug){
        $article = Article::where('slug',$slug)->first();
        return view('update',['article'=>$article]);
    }
    public function _update($id){
        $validated = request()->validate([
            'title' => 'required|min:3',
            'category' => 'required',
            'body' => 'required'
        ]);
        $validated['slug'] = Str::slug($validated['title']); 
        if(request()->image){
            $file = request()->file('image');
            $file->move('img',$file->getClientOriginalName());
            $validated['image'] = $file->getClientOriginalName();
            File::delete(public_path('img/'.request()->oldImage));
            Article::where('id',$id)->update($validated);
        }else{
            Article::where('id',$id)->update($validated);
        }

        return redirect('/update/'.$validated['slug'])->with('message','The post has been updated');
    }
}
