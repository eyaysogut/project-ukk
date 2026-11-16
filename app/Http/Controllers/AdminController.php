<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;

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
        return view('AdminUMKM.index', [
            'user' => Auth::user(),
        ]);
    }
}