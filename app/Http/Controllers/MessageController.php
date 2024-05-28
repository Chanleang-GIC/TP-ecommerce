<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
//    public function __construct() {
//        $this->middleware('auth');
//    }

    public function index() {
        $user = User::where('id', auth()->id())->select([
            'id', 'name', 'email',
        ])->first();

        return view('home', [
            'user' => $user,
        ]);
    }

    public function messages(): JsonResponse {
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function message(Request $request): JsonResponse {
        $message = Message::create([
            'user_id' => 1,
            'text' => $request->get('text'),
        ]);
        SendMessage::dispatch($message);

        return response()->json([
            'success' => true,
            'message' => "Message created and job dispatched.",
        ]);
    }

    public function getUserMessages($userId) {
        // Retrieve messages for the user with eager loading of the user relationship
        $messages = Message::where('user_id', $userId)
                           ->with('user') // Eager load the user relationship
                           ->get();
    
        // Count the number of messages retrieved
            // Count the number of messages retrieved
            $messageCount = $messages->count();

            // Cast message count to integer explicitly
            $messageCount = (int) $messageCount;

            // Return the messages along with the message count
            return response()->json([
                'message_count' => $messageCount,
                'messages' => $messages,
            ]);
    }
    
}
