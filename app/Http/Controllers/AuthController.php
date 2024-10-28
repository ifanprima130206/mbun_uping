<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('auth.login', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil, anda akan diarahkan ke halaman dashboard...',
                'redirect_url' => route('dashboard.overview'),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Gagal login, silahkan coba lagi!',
        ], 401);
    }

    public function register()
    {

        $data = [
            'title' => 'Register',
        ];

        return view('auth.register', $data);
    }

    public function storeRegister(Request $request)
    {
        // var_dump($request->all());
        // exit();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1,
            'status' => 1,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil!',
            'redirect_url' => route('auth.login')
        ]);
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
