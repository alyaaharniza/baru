<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|max:30',
            'nim'=>'required|max:30',
            'no_hp'=>'required|max:30'
        ]);

        $students = new Student();
        $students->nama = $request->nama;
        $students->nim = $request->nim;
        $students->no_hp = $request->no_hp;

        return response()->json(['message'=>'Data Siswa Berhasil Ditambahkan'], 200);
    }
}
