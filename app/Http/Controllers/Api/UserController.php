<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if ($users->count() > 0) {
            return response()->json([
                'message' => 'Users retrieved successfully',
                'data' => $users,
            ], 200);
        } else {
            return response()->json(['message' => 'No users available'], 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipe_user' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:150',
            'telpon' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:tbl_user',
            'password' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'errors' => $validator->messages(),
            ], 422);
        }

        $user = User::create([
            'tipe_user' => $request->tipe_user,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user,
        ], 201);
    }

    public function show(User $user)
    {
        return response()->json([
            'message' => 'User retrieved successfully',
            'data' => $user,
        ], 200);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'tipe_user' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:150',
            'telpon' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:users,username,' . $user->id,
            'password' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandatory',
                'errors' => $validator->messages(),
            ], 422);
        }

        $user->update([
            'tipe_user' => $request->tipe_user,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user,
        ], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ], 200);
    }
}
