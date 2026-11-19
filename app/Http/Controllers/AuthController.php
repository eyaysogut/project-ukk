<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // ✅ TAMBAHAN: untuk insert log

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('Admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // ✅ TAMBAHAN: Catat log LOGIN
            DB::table('log_activities')->insert([
                'aksi'         => 'LOGIN',
                'portfolio_id' => 0,
                'nama_usaha'   => 'Admin',
                'keterangan'   => 'Admin ' . Auth::user()->name . ' berhasil login',
                'created_at'   => now(),
            ]);

            return redirect()->intended(route('admin.dashboard'))
                             ->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // ✅ TAMBAHAN: Ambil nama user SEBELUM logout (karena setelah logout Auth::user() jadi null)
        $userName = Auth::user()->name ?? 'Unknown';

        // ✅ TAMBAHAN: Catat log LOGOUT
        DB::table('log_activities')->insert([
            'aksi'         => 'LOGOUT',
            'portfolio_id' => 0,
            'nama_usaha'   => 'Admin',
            'keterangan'   => 'Admin ' . $userName . ' berhasil logout',
            'created_at'   => now(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
                         ->with('success', 'Anda berhasil logout.');
    }
}