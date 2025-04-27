<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Interfaces\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $data)
    {
        if(!Auth::guard('web') ->attempt($data)){
            return response([
                'success' => false,
                'message' => 'Unauthorized',
            ],401);
        }
    /** @var \App\Models\User $user */
        $user = Auth::user();

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'success' => true,
            'token' => $token,
            'message' => 'User logged in successfully',
        ], 200);

    }

    public function logout()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        $response = [
            'success' => true,
            'message' => 'User logged out successfully',
        ];
        return response($response, 200);
    }

    public  function me()
    {
        
        if(Auth::check()){
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->load('roles.permissions');
            $permissions = $user->roles->flatMap->permissions->pluck('name');
            $role = $user->roles->first()->name;

            return response()->json([
                'message' => 'User Data',
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'permissions' => $permissions,
                    'role' => $role
                ],
            ]);
        }
        return response()->json([
            'message' => 'You Are Not Logged In',
        ], 401);
    }
}