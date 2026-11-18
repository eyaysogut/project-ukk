<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUmkm = Portofolio::count();
        $websiteAktif = Portofolio::where('status', 'publish')->count();
        $permintaanBaru = Portofolio::where('status', 'draft')->count();
        $umkmTerbaru = Portofolio::orderByDesc('created_at')->limit(5)->get();
        $aktivitasTerbaru = LogActivity::orderByDesc('created_at')->limit(5)->get();

        return view('Admin.admin', compact(
            'totalUmkm', 'websiteAktif', 'permintaanBaru', 'umkmTerbaru', 'aktivitasTerbaru'
        ));
    }

    public function profil()
    {
        // Mengarah ke file profil.blade.php di folder Admin
        return view('Admin.profil', [
            'user' => Auth::user(),
        ]);
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        // Validasi input (email unik kecuali email milik sendiri)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed', // 'confirmed' wajib ada input password_confirmation
        ], [
            'email.unique' => 'Email sudah digunakan oleh akun lain.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, maka update password dengan Hash::make
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}