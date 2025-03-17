<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/');
    }

    public function updatePost($id, Request $request){
     $post = Post::findOrFail($id);   
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $post->update($data);

        return redirect('/');



    }
    public function createPost(Request $request){
    $data = $request->validate([
        'title'=>'required',
        'body'=>'required'
    ]);      

    $data['title'] = strip_tags($data['title']);
    $data['body'] = strip_tags($data['body']);
    $data['user_id'] = auth()->id();

    Post::create($data);
    return redirect()->back()->with('post','Post Created succesfully');  

    }

    public function fetch(){
        $posts = [];
        if(auth()->check()){
            $posts = auth()->user()->posts()->latest()->get();
        }
        
        // $posts = Post::all();
        return view('home',compact('posts'));
    }

    public function showEditPost($id){
        $post = Post::findOrFail($id);
        return view('edit-post', compact('post'));
    }
}
