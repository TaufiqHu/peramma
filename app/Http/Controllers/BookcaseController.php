<?php

namespace App\Http\Controllers;

use App\Bookcase;
use Illuminate\Http\Request;

class BookcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookcases = Bookcase::all();

        return view('admin.bookcase.index', ['bookcases' => $bookcases, 'title' => 'Rak Buku']);
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

        $bookcase = new Bookcase();
        $bookcase->name = $request->name;
        $bookcase->save();

        return redirect()->route('bookcases.index')->with(['success' => 'Data berhasil ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bookcase  $bookcase
     * @return \Illuminate\Http\Response
     */
    public function show(Bookcase $bookcase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookcase  $bookcase
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookcase $bookcase)
    {
        $title = 'Edit Rak Buku';
        return view('admin.bookcase.edit', compact('bookcase', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookcase  $bookcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookcase $bookcase)
    {
        $this->validateInput($request);

        $bookcase->name = $request->name;
        $bookcase->save();

        return redirect()->route('bookcases.index')->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookcase  $bookcase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookcase $bookcase)
    {
        if ($bookcase->books->count() > 0) {
            return redirect()->route('bookcases.index')->with(['fail' => 'Data Rak Buku tidak dapat dihapus karena masih ada buku yang menggunakan data ini.']);
        }

        $bookcase->delete();
        return redirect()->route('bookcases.index')->with(['success' => 'Data berhasil dihapus.']);
    }

    private function validateInput($input)
    {
        $input->validate(
            [
                'name'  => 'required'
            ],
            [
                'name.required' => 'Nama Rak Buku tidak boleh kosong.'
            ]
        );
    }
}
