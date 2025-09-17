<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\SubscribeMessage;
use App\Http\Controllers\Controller;

class SubscribeMessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribe_messages,email',
        ]);

        SubscribeMessage::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Subscribed successfully!'
        ], 201);
    }
}
