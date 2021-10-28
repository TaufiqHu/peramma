<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = ClassRoom::all();

        return view('admin.classroom.index', ['classrooms' => $classrooms, 'title' => 'Daftar Kelas']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);

        $classroom = new Classroom();
        $classroom->name = $request->name;
        $classroom->grade = $request->grade;
        $classroom->save();

        return redirect()->route('classrooms.index')->with(['success' => 'Data berhasil ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassRoom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassRoom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classroom)
    {
        $title = 'Edit Data Kelas';
        return view('admin.classroom.edit', compact('classroom', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassRoom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $classroom)
    {
        $this->validateInput($request);

        $classroom->name = $request->name;
        $classroom->grade = $request->grade;
        $classroom->save();

        return redirect()->route('classrooms.index')->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassRoom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classroom)
    {
        //Jika data parent dari data lainnya, maka tidak boleh dihapus
        if ($classroom->students->count() > 0) {
            return redirect()->route('classrooms.index')->with(['fail' => 'Data kelas tidak dapat dihapus karena masih ada siswa yang menggunakan data ini.']);
        }
        $classroom->delete();

        return redirect()->route('classrooms.index')->with(['success' => 'Data berhasil dihapus.']);
    }

    private function validateInput($input)
    {
        $input->validate(
            [
                'name'  => 'required',
                'grade' => 'required|in:7,8,9' // Hanya boleh 7 atau 8 atau 9
            ],
            [
                'name.required' => 'Nama Rak Buku tidak boleh kosong.',
                'grade.in'      => 'Pilihan grade tidak sesuai'
            ]
        );
    }
}
