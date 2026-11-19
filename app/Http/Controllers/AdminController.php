<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUmkm = Portofolio::count();
        $publishCount = Portofolio::where('status', 'publish')->count();
        $draftCount = Portofolio::where('status', 'draft')->count();
        $portofolios = Portofolio::latest()->take(5)->get();

        return view('Admin.admin', compact('totalUmkm', 'publishCount', 'draftCount', 'portofolios'));
    }

    public function profil()
    {
        return view('Admin.profil');
    }

    public function profilUpdate(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui!');
    }

    // ============ CRUD MANAJEMEN ADMIN ============

    public function usersIndex()
    {
        $users = User::latest()->get();
        return view('Admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('Admin.users.create');
    }

    public function usersStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    public function usersEdit($id)
    {
        $user = User::findOrFail($id);
        return view('Admin.users.edit', compact('user'));
    }

    public function usersUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Data admin berhasil diupdate!');
    }

    public function usersDestroy($id)
    {
        // Cegah admin menghapus dirinya sendiri
        if ($id == Auth::id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun yang sedang login!');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Admin berhasil dihapus!');
    }
}