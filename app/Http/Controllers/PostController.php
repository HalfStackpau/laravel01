<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Image;
use GrahamCampbell\Markdown\Facades\Markdown;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
       // $this->authorize('view',$post);

       $user=Auth::user();

        if(!$user->isAdmin()){
           $posts=Post::where('user_id',$user->id)->get();
       }
       else{
           $posts=Post::all();
       }

       return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'string|unique:posts|max:90',


        ]);
        $validatedData['user_id']=Auth::user()->id;
        $validatedData['category_id']='1';
        $validatedData['contents']=$request->contents;

        Post::create($validatedData);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       //$this->authorize('view',$post);
       $cont=Markdown::convertToHTML($post->contents);

       return view('posts.show',['post'=>$post,'cont'=>$cont]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'string|max:90',


        ]);
        $validatedData['user_id']=Auth::user()->id;
        $validatedData['category_id']='1';
        $validatedData['contents']=$request->contents;
        $post->update($validatedData);

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
