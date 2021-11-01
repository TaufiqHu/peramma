<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use App\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::OrderBy('id', 'desc')->paginate(15);
        $classRooms = ClassRoom::all();

        return view('admin.student.index', ['students' => $students, 'classRooms' => $classRooms, 'title' => 'Daftar Siswa']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedInput = $this->validateInput($request);
        $student = new Student();
        $student = $this->updateData($validatedInput, $student);

        return redirect()->to(route('student-index'))->with(['success' => 'Data berhasil ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.student.card', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $title = 'Edit Data Siswa';
        $classRooms = ClassRoom::all();
        return view('admin.student.edit', compact('student', 'classRooms', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validatedInput = $this->validateInput($request, $student);
        $student = $this->updateData($validatedInput, $student);

        return redirect()->to(route('student-index'))->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->to(route('student-index'))->with(['success' => 'Data berhasil dihapus.']);
    }

    /**
     * Get Student Data format JSON Response
     */
    public function getAPI(Request $request)
    {
    }

    public function nis($student)
    {
        $nis = $student;
        $student = Student::where('nis', $nis)->first();
        if ($student) {
            return response()->json([
                'status'    => true,
                'data'      => $student
            ], 200);
        } else {
            return response()->json([
                'status'   => false,
                'message'  => "Data Anggota dengan NIS: $nis tidak ditemukan."
            ], 200);
        }
    }

    private function validateInput($input, $student = null)
    {

        $uniqueRule = '|unique:students,nis';
        if ($student && $student->nis == $input->nis) {
            $uniqueRule =  '';
        }
        $validatedInput = $input->validate(
            [
                // Set the Rules for validation
                'name'          => 'required',
                'nis'           => 'required' . $uniqueRule,
                'gender'        => 'required|in:FEMALE,MALE',
                'classroom'     => 'required|exists:class_rooms,id',
                'birthplace'    => 'required',
                'birthdate'     => 'required|date',
                'address'       => 'required',
            ],
            [
                // Set Custom Validation Error Message
                'name.required'     => 'Nama wajib diisi.',
                'nis.unique'        => ':attribute :input sudah ada, mohon periksa kembali data yang anda masukkan.',
                'classroom.exists'  => 'Nama Kelas yang dipilih tidak valid.'
            ],
            [
                // Set Custom Attribute
                'name'          => 'Nama',
                'nis'           => 'Nomor Induk Siswa',
                'gender'        => 'Jenis Kelamin',
                'classroom'     => 'Nama Kelas',
                'birthplace'    => 'Tempat Lahir',
                'birthdate'     => 'Tanggal Lahir',
                'address'       => 'Alamat',
            ]
        );

        return $validatedInput;
    }

    private function updateData($validateInput, $student)
    {
        $student->name          = $validateInput['name'];
        $student->nis           = $validateInput['nis'];
        $student->gender        = $validateInput['gender'];
        $student->class_room_id = $validateInput['classroom'];
        $student->birth_date    = $validateInput['birthdate'];
        $student->birth_place   = $validateInput['birthplace'];
        $student->address       = $validateInput['address'];
        $student->save();

        return $student;
    }
}
