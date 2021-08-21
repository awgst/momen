<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showPosts(User $user)
    {
        // Show all post by user
        $topics = Topic::limit(7)->get();
        return view('user', ['topics'=>$topics, 'user'=>$user, 'posts'=>$user->posts->load('topic', 'user')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Show setting form
        return view('setting', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Store update
        $request->validate([
            'name'=>'required',
            'username'=>['required', Rule::unique('users')->ignore($user), 'alpha_dash'],
            'email'=>['required', Rule::unique('users')->ignore($user), 'email:rfc,dns']
        ]);
        $user = User::find($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();
        return redirect('user/'.$user->username.'/setting')->with('msg', 'Berhasil menyimpan perubahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Force deleted an account
        $user = User::find($user->id);
        $user->forceDelete();
        return redirect('/')->with('deleted', 'Akun berhasil dihapus!');
    }
}
