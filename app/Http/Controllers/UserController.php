<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    // public function viewallusers(): JsonResponse
    // {
    //     $users = User::all();

    //     return response()->json($users);
    // }
    public function viewallusers(): JsonResponse
    {
        $users = User::all();
        
        // Initialize an array to store user data with message count
        $usersWithMessageCount = [];
    
        // Loop through each user
        foreach ($users as $user) {
            // Get the message count for the current user
            $messageCount = Message::where('user_id', $user->id)->count();
            
            // Append user data along with message count to the array
            $userData = $user->toArray();
            $userData['message_count'] = $messageCount;
            $usersWithMessageCount[] = $userData;
        }
    
        // Return the JSON response containing users with their respective message counts
        return response()->json($usersWithMessageCount);
    }

}
