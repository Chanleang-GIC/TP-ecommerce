<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Client;

use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request) {
        $userFound = User::where('email', $request->get('email'))->first();
     
        if ($userFound) {
             return response(["message" => 'User with this email exists'], 400);
     
        } else {
            // 2. Verify if confirm_password and password match
            if ($request->get('password') == $request->get('confirm_password')) {
     
                $user = new User();
    
                // 3. Set user details
                $user->name = $request->get('username');
                $user->email = $request->get('email');
                $user->password = $request->get('password');
    
                // 4. Generate a random OTP for verification
                $otp = mt_rand(100088, 999999);
    
                // Save OTP in the database
                $user->otp_token = $otp;
    
                // 5. Save user record
                $user->save();
    
                // 6. Send OTP via email
                $verificationUrl = url('/api/verify-otp?user_id=' . $user->id . '&code=' . $otp);
                Mail::to($user->email)->send(new OtpMail($verificationUrl));
    
                return ["message" => "success"];
    
            } else {
                return response(["message" => "Password and confirm password do not match"], 400);
    
            }
        }
    }
    public function login1(Request $request)
    {
        // Validate email and password
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->all());
        }

        // Attempt to authenticate using email and password
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Invalid credentials'], 403);
        }

        $user = Auth::user();

        // Revoke existing tokens
        $user->tokens()->delete();

        // Create a new token for the user
        $token = $user->createToken('AuthToken')->accessToken;

        // If remember_me is true, return the remember_token
        if ($request->input('remember_me')) {
            $user->update(['remember_token' => Str::random(60)]);
            return response()->json(['token' => $token, 'user' => $user, 'remember_token' => $user->remember_token]);
        } else {
            return response()->json(['token' => $token, 'user' => $user]);
        }
    }

    
    public function login(Request $request)
    {
        // Check if remember_token is present in the request
        if ($request->has('remember_token')) {
            $user = $this->attemptLoginWithRememberToken($request->input('remember_token'));
        } else {
            // Validate email and password
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw ValidationException::withMessages($validator->errors()->all());
            }
    
            // Attempt to authenticate using email and password
            if (!Auth::attempt(request(['email', 'password']))) {
                return response()->json(['error' => 'Invalid credentials'], 403);
            }
    
            $user = $request->user();
        }
    
        // For "remember me," issue an access token without explicit expiration
        $token = $user->createToken('AuthToken')->plainTextToken;
        // Save the token to the api_token column
        $user->update(['api_token' => $token]);
    
        // If remember_me is true, return the remember_token
        if ($request->input('remember_me')) {
            $user->update(['remember_token' => $rememberToken = Str::random(60)]);
            return response()->json(['token' => $token, 'user' => $user, 'remember_token' => $rememberToken]);
        } else {
            return response()->json(['token' => $token, 'user' => $user]);
        }
    }
    
    protected function attemptLoginWithRememberToken($rememberToken)
    {
        // Attempt to authenticate the user using remember_token
        return Auth::onceUsingId(
            User::where('remember_token', $rememberToken)->value('id')
        );
    }
    

    public function verifyOTP(Request $request) {
        // The incoming URL is in this format: http://localhost/verify_opt?code=99999
        $code = $request->query('code');
        $userId = $request->query('user_id');
    
        $user = User::find($userId);
    
        // Verify the code with the otp_token that has been stored during registration
        if ($user && $code == $user->otp_token) {
            // Update the user account, indicating that the email is verified
            $user->email_verified_at = now();
    
            $user->save();
            return ["message" => "OTP is valid, your account is registered"];
            
        } else {
            // The OTP is not valid
            return response(["message" => "OTP is invalid"], 400);
        }
    }
    public function getProfile()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        if ($user) {
            // Return the user profile data
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);
        } else {
            // Return an error response if the user is not authenticated
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }

    public function deleteUser()
    {
        $user = Auth::user();
    
        if ($user) {
            $user->delete();
    
            // Log the successful deletion
            \Log::info('User deleted successfully', ['user_id' => $user->id]);
    
            // Return a success response
            return response()->json(['message' => 'User deleted successfully'], 200);
        }
    }
    

}
