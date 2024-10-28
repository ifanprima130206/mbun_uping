<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengguna',
            'users' => User::latest()->get(),
        ];

        return view('admin.master.user', $data);
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil ditambahkan.'
        ], 200);
    }

    public function update(UserRequest $request, $user_id)
    {
        $data = $request->validated();

        $user = User::findOrFail(decrypt($user_id));

        $updateData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ];

        if (isset($data['role'])) {
            $updateData['role'] = $data['role'];
        }

        $user->update($updateData);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($data['password']),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil diubah.'
        ], 200);
    }

    public function destroy($user_id){

        $user = User::findOrFail(decrypt($user_id));

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil dihapus.'
        ], 200);
    }

    public function activated($user_id){

        $user = User::findOrFail(decrypt($user_id));

        $user->update([
            'status' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil diaktifkan.'
        ], 200);
    }

    public function disactivated($user_id){

        $user = User::findOrFail(decrypt($user_id));

        $user->update([
            'status' => 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengguna berhasil dinonaktifkan.'
        ], 200);
    }
}
