<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $user->save();

        return response()->json([
            'message' => 'Successfully logged in.',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ],200);
    }

    public function passwordreset(Request $request){

        $userId = Auth::id();

        $validator = Validator::make($request->all(), [
           'password' => 'required|string|min:6|confirmed', 
           'password_confirmation' => 'required|string|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
    
        if (!$userId) {
            return response()->json(['message' => 'Unauthorized user.'], 401);
        }

        $user = User::find($userId);

        $user->password = Hash::make($request->password);
        $confirmpassword = $request->password_confirmation;

        if($request->password != $confirmpassword){
            return response()->json(['message' => 'Password mismatch!'],401);
        }

        $user->save();

        return response()->json(['message' => 'Successfully updated the password!'],201);

    }

    public function signup(Request $request){
        $user = new User();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', 
            'password_confirmation' => 'required|string|same:password',
            'phone' => 'required|digits_between:10,15', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $confirmpassword = $request->password_confirmation;

        if($request->password != $confirmpassword){
            return response()->json(['message' => 'Password mismatch!'],401);
        }

        $user->phone = $request->phone;
    
        $user->save();

        return response()->json(['message' => 'User registered successfully!'],201);

    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out'],200);
    }
}
