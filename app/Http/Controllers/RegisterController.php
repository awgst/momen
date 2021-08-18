<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function customvalidate(Request $request){
        // Store into users table
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required|email:rfc,dns|unique:users',
            'username'=>'required|unique:users|alpha_dash|min:5',
            'password'=>'required|min:8',
            'checkbox'=>'required'
        ], $this->messages(), $this->attributes());
        $validatedData['password']=Hash::make($validatedData['password']);
        $validatedData = collect($validatedData);
        $data = $validatedData->except(['checkbox']);
        return response()->json(['data'=>$data, 'status'=>200], 200);
    }

    // Store user data into database
    public function store(Request $request){
        $data = $this->customvalidate($request)->getData();
        $insert = collect($data->data);
        User::create($insert->all());
        return redirect('/');
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'required' => 'Harap isi bidang :attribute.',
            'alpha_dash' => "Hanya gunakan huruf, angka, '-' atau '_'",
            'min'=>':attribute minimal :min karakter.',
            'confirmed'=>':attribute tidak sesuai.',
            'email'=>'Harap isi dengan :attribute yang valid.',
            'unique'=>':attribute telah digunakan.'
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
    */
    public function attributes()
    {
        return [
            'name' => 'Nama',
            'email' => 'Alamat Email',
            'password' => 'Password',
            'username' => 'Username'
        ];
    }
}
