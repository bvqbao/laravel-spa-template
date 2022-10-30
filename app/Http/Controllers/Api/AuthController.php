<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
	public function register(Request $request)
	{
		$validateUser = Validator::make(
			$request->all(),
			[
				'name' => 'required',
				'email' => 'required|email|unique:users,email',
				'password' => 'required|confirmed'
			]
		);

		if ($validateUser->fails()) {
			return response()->json([
				'status' => false,
				'message' => 'Validation errors',
				'errors' => $validateUser->errors(),
			], 400);
		}

		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password)
		]);

		return response()->json([
			'status' => true,
			'message' => 'User registered successfully',
			'access_token' => $user->createToken('accessToken')->plainTextToken
		], 200);
	}

	public function login(Request $request)
	{
		$validateUser = Validator::make(
			$request->all(),
			[
				'email' => 'required|email',
				'password' => 'required'
			]
		);

		if ($validateUser->fails()) {
			return response()->json([
				'status' => false,
				'message' => 'Validation errors',
				'errors' => $validateUser->errors(),
			], 400);
		}

		if (!Auth::attempt($request->only(['email', 'password']))) {
			return response()->json([
				'status' => false,
				'message' => 'Incorrect email or password',
			], 401);
		}

		$user = User::where('email', $request->email)->first();

		return response()->json([
			'status' => true,
			'message' => 'User logged in successfully',
			'access_token' => $user->createToken('accessToken')->plainTextToken
		], 200);
	}
}
