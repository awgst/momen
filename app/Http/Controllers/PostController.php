<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all data
        // Eager Load for posts
        $posts = Post::with(['topic', 'user'])->get();
        $topics = Topic::limit(7)->get();
        return view('home', ['posts'=>$posts, 'topics'=>$topics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_nya = $request->id;
        // Store post into database
        $request->validate([
            'title'=>'required',
        ]);
        try {
            if($id_nya===null){
                $id = Post::insertGetId([
                    'title'=>$request->title,
                    'user_id'=>Auth::user()->id,
                    'created_at'=>date("Y-m-d H:i:s")
                ]);
                $text_slug = preg_replace("/[^A-Za-z0-9 ]/", '', $request->title);
                $slug = str_replace(' ', '-', $text_slug);
                $slug = $slug.'-'.$id;
                $post = Post::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>$slug,
                    'excerpt'=>$request->except,
                    'body'=>$request->body
                ]);
                $id_nya=$id;
            }
            else{
                $text_slug = preg_replace("/[^A-Za-z0-9 ]/", '', $request->title);
                $slug = str_replace(' ', '-', $text_slug);
                $slug = $slug.'-'.$request->id;
                $post = Post::find($request->id)->update([
                    'title'=>$request->title,
                    'slug'=>$slug,
                    'excerpt'=>$request->excerpt,
                    'body'=>$request->body
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }
        return response()->json(['id'=>$id_nya]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Show specific data by slug
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
