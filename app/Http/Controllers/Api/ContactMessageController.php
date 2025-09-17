<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;

class ContactMessageController extends Controller
{
     public function store(Request $request)
    {
      // Validation
        $data = $request->validate([
            'name'    => 'required|string|max:120',
            'email'   => 'required|email|max:190',
            'phone'   => 'required|string|max:40',
            'message' => 'required|string|min:5',
        ]);

        
        $data['status'] = 'new';
        $contact = ContactMessage::create($data);

        return response()->json([
            'message' => 'Thanks! We received your message.',
            'data'    => $contact
        ], 201);
    }

}
