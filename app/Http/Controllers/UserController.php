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

}
