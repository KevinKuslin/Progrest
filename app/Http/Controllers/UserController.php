<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    
    public function search(Request $request){
        $search = trim($request->q);

        if ($search === '') {
            return response()->json([]);
        }

        $users = User::query()
            ->where('id', '!=', Auth::id()) 
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->limit(10)
            ->get([
                'id',
                'name',
                'username',
                'email',
                'avatar',
            ]);

        return response()->json($users);
    }
}
