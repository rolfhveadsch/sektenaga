<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function getData()
    {
        $students = Student::query();

        return DataTables::of($students)
            ->addColumn('status', function ($student) {
                return $student->is_active 
                    ? '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Aktif</span>'
                    : '<span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Nonaktif</span>';
            })
            ->addColumn('action', function ($student) {
                return '
                    <div class="flex gap-2">
                        <button onclick="editStudent('.$student->id.')" class="px-3 py-1.5 text-xs bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition duration-150 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </button>
                        <button onclick="deleteStudent('.$student->id.')" class="px-3 py-1.5 text-xs bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition duration-150 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus
                        </button>
                    </div>
                ';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|unique:students',
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'is_active' => 'boolean'
        ]);

        Student::create($validated);

        return response()->json(['success' => true, 'message' => 'Data siswa berhasil ditambahkan']);
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'nisn' => 'required|unique:students,nisn,'.$id,
            'nama_lengkap' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'angkatan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'is_active' => 'boolean'
        ]);

        $student->update($validated);

        return response()->json(['success' => true, 'message' => 'Data siswa berhasil diupdate']);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json(['success' => true, 'message' => 'Data siswa berhasil dihapus']);
    }
}