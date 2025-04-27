<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    //
    public function index(): View
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'nis' => 'required|unique:students,nis',
            'alamat' => 'required',
            'angkatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('foto', $foto->hashName());

        Student::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'foto' => $foto->hashName()
        ]);
        return Redirect::route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(string $id): View
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    /**
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'nis' => 'required|unique:students,nis,' . $id,
            'alamat' => 'required',
            'angkatan' => 'required',
            // 'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $student = Student::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Delete old image
            Storage::delete('foto/' . $student->foto);

            // Uploaded new image
            $foto = $request->file('foto');
            $foto->storeAs('foto', $foto->hashName());

            $student->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'nis' => $request->nis,
                'alamat' => $request->alamat,
                'angkatan' => $request->angkatan,
                'foto' => $foto->hashName()

            ]);
        } else {
            $student->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'nis' => $request->nis,
                'alamat' => $request->alamat,
                'angkatan' => $request->angkatan
            ]);
        }

        return Redirect::route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $student = Student::findOrFail($id);
        Storage::delete('foto/' . $student->foto);
        $student->delete();
        return redirect()->route('students.index')->with(['success' => 'Student deleted successfully.']);
    }
}
