<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function viewallusers(): JsonResponse
    {
        $users = User::all();

        return response()->json($users);
    }

    public function getUsercount($userId) {
        // Assuming you have a Message model with appropriate relationships set up
        $messages = Message::where('user_id', $userId)
                           ->with('user') // Eager load the user relationship
                           ->get();
    
        return response()->json($messages);
    }
}
