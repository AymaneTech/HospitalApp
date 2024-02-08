<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class SessionsController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(LoginRequest $request)
    {
        $validatedData = $request->only('email', 'password');;
        $remember_me = $request->has("remember_me");

        if (Auth::guard("doctor")->attempt($validatedData, $remember_me)) {
            return "good";
        } else if (Auth::guard("patient")->attempt($validatedData, $remember_me)) {
            return "not good";
        } else if (Auth::guard("admin")->attempt($validatedData, $remember_me)) {
            return "admin homie";
        }
        return back()->withErrors(["email" => "invalid credentials"]);
    }
    
}
