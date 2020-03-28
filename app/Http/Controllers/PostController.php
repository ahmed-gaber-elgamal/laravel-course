<?php

namespace App\Http\Controllers;
use \Cviebrock\EloquentSluggable\Services\SlugService;


use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show()
    {
        $request=request();  
        $postId=$request->post;
        $post=Post::find($postId);      
        
        return view('posts.show',[
            'post'=>$post,
        ]);
    }
    public function edit()
    {
        $users = User::all();
        $post_id = request('post');
        $post = Post::find($post_id);
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function update(UpdatePostRequest $request)
    {
        $postId = $request->post;
        // dd($request->post);
        $post = Post::find($postId);
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);


        $data = $request->only(['title', 'description', 'user_id',]);
        $data += array('slug' => $slug);
        $post->update($data);

        return redirect()->route('posts.show', ['post' => $request->post]);
    }
    

    
    
    public function destroy(){
        $request=request();
        $postId=$request->post;
        $post=Post::find($postId);
        $post->delete();
        return redirect()->route('posts.index');
    }
    
    public function create(){
        $users=User::all();
        return view('posts.create',[
        'users'=>$users 
        ]);
    }

    public function store(StorePostRequest $request){
        
            
        
    
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
        ]);
        return redirect()->route('posts.index');
    }

    

}
