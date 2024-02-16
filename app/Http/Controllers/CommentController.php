<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validatedData = $request->validated();
        Comment::create([
            "content" => $validatedData["content"],
            "doctor_id" => $validatedData["doctor_id"],
            "patient_id" => auth("patient")->user()->id,
        ]);
        return back()->with("success", "comment created successfully");
    }
}
