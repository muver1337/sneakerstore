<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(RegisterRequest $request)
    {
        if ($request->validated()) {
            $user = User::create([
                'name' => $request->name,
                'login' => $request->login,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['message' => 'Вы успешно зарегистрировались '], 201);
        } else {
            return response()->json(['error' => 'Error registration', 400]);
        }
    }

    public function authorization(LoginRequest $request)
    {
        $user = User::where('login', $request->login)->first();
        if ($user && Hash::check($request->password, $user->password)) {


            $user->tokens()->delete();

            $token = null;
            if ($user->role_id === 1) {
                $token = $user->createToken('admin-token', ['create', 'update', 'delete']);
            } elseif ($user->role_id === 2) {
                $token = $user->createToken('basic-token', ['none']);
            }
            if ($token) {
                return response()->json(['bearer' => $token->plainTextToken, 'role_id' => $user->role_id]);
            } else {
                return response()->json(['error' => 'Ошибка Токена'], 400);
            }
        }
        return response()->json(['error' => 'Неправильный логин или пароль'], 422);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Успешный выход'], 201);
    }
}
