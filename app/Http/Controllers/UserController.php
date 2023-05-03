<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            "Users" => User::all()
        ]);
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
    public function store(UserRequest $request)
    {
        $user_data = $request->all();
        $user_data["password"] = Hash::make($user_data["password"]);
        unset($user_data["password_confirmation"]);
        $user_data["last_login"] = Carbon::now();
        $user = User::create($user_data);
        if($user)
        {
          return response(["message" => "User Created"],200);
        }else{
            return response(["message" => "failed"],420);
        }

    }
    public function login(Request $request)
    {
        $user = User::where("email",$request->email)->first();
        if($user && Hash::check($request->password,$user->password)){
            $token = $user->createToken($user->email);
            return response([
                "message"=> "login success",
                "token" =>  $token->plainTextToken
            ],200);
        }else{
            return response([
                "message"=> "bad login",
            ],401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(["user_data" => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response(["user_data" => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $user = User::where("id",$id)->update($data);
        if($user){
            return response(["message" => "success","user" => $data],200);
        }else{
            return response(["message" => "failed","user" => $data],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where($id)->delete();
        return response(["message" => "deleted"]);
    }

    public function logout()
    {
        $user = auth()->user();
        $user->tokens()->delete();
        return response(["message" => "logout succesfully"]);
    }
}
