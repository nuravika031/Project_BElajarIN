<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    // Tampilkan semua kursus
    public function index()
    {
        $courses = Course::with('pengajar')->get();
        return view('courses.index', compact('courses'));
    }

    // Tampilkan form tambah kursus
    public function create()
    {
        return view('courses.create');
    }

    // Simpan data kursus
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        DB::transaction(function () use ($request) {
            Course::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'id_pengajar' => Auth::id(),
            ]);
        });

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil ditambahkan.');
    }

    // Tampilkan detail/form edit kursus
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    // Update data kursus
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        DB::transaction(function () use ($request, $id) {
            $course = Course::findOrFail($id);
            $course->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        });

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil diperbarui.');
    }

    // Hapus kursus
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $course = Course::findOrFail($id);
            $course->delete();
        });

        return redirect()->route('courses.index')->with('success', 'Kursus berhasil dihapus.');
    }
}
