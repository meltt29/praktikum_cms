<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        Log::info('Memasuki function showLoginForm', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);
        return view('auth.login');
    }

    public function login(Request $request)
    {
        Log::info('Memasuki function login', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/films');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegisterForm()
    {
        Log::info('Memasuki function showRegisterForm', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);
        return view('auth.register');
    }

    public function register(Request $request)
    {
        Log::info('Memasuki function register', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(Request $request)
    {
        Log::info('Memasuki function logout', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showResetPasswordForm()
    {
        Log::info('Memasuki function showResetPasswordForm', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        Log::info('Memasuki function resetPassword', [
            'user' => auth()->user()?->email,
            'request' => isset($request) ? $request->all() : null
        ]);
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Password berhasil direset. Silakan login dengan password baru.');
    }
}
