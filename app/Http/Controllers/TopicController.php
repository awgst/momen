<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        // Show specific data by slug
        return view('topic', ['topic'=>$topic, 'posts'=>$topic->posts]);
    }
}
