<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all data
        $topics = Topic::all();
        return view('topics', compact('topics'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        // Show specific data by slug
        $topics = Topic::limit(7)->get();
        return view('topic', ['topics'=>$topics, 'topic'=>$topic, 'posts'=>$topic->posts]);
    }
}
