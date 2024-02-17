<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facadres\Password;

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
            return redirect("/")->with("success", "logged as doctor successfully");
        } else if (Auth::guard("patient")->attempt($validatedData, $remember_me)) {
            return redirect("/")->with("success", "logged as patient successfully");
        } else if (Auth::guard("admin")->attempt($validatedData, $remember_me)) {
            return redirect("/dashboard")->with("success", "logged as admin successfully ");
        }
        return back()->withErrors(["email" => "invalid credentials"]);
    }
    public function destroy(){
        auth()->logout();
        Session::flush();
        return redirect("/login");
    }
}
