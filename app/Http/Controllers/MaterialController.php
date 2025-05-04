<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function create($id_kursus)
    {
        return view('materials.create', compact('id_kursus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kursus' => 'required|exists:courses,id',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'tautan_video' => 'nullable|url',
        ]);

        Material::create($request->all());

        return redirect()->route('courses.show', $request->id_kursus)->with('success', 'Materi berhasil ditambahkan.');
    }
}

