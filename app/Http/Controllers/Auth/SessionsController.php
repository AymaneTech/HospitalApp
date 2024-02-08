<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create(){
        return view("auth.login");
    }
    public function store(LoginRequest $request){

    }
}
