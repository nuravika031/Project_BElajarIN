<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_kursus' => 'required|exists:courses,id',
        ]);

        Registration::create([
            'id_pengguna' => Auth::id(),
            'id_kursus' => $request->id_kursus,
            'tanggal_daftar' => now(),
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil.');
    }

    public function index()
    {
        $registrations = Registration::with('kursus')->where('id_pengguna', Auth::id())->get();
        return view('registrations.index', compact('registrations'));
    }
}
