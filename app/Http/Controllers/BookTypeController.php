<?php

namespace App\Http\Controllers;

use App\BookType;
use Illuminate\Http\Request;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $booktypes = BookType::all();

        return view('admin.booktype.index', ['booktypes' => $booktypes, 'title' => 'Jenis Buku']);
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

        $booktype = new BookType();
        $booktype->name = $request->name;
        $booktype->save();

        return redirect()->route('booktypes.index')->with(['success' => 'Data berhasil ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookType  $booktype
     * @return \Illuminate\Http\Response
     */
    public function show(BookType $booktype)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookType  $booktype
     * @return \Illuminate\Http\Response
     */
    public function edit(BookType $booktype)
    {
        $title = 'Edit Jenis Buku';
        return view('admin.booktype.edit', compact('booktype', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookType  $booktype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookType $booktype)
    {
        $this->validateInput($request);

        $booktype->name = $request->name;
        $booktype->save();
        return redirect()->to(route('booktypes.index'))->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookType  $booktype
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookType $booktype)
    {
        if ($booktype->books->count() > 0) {
            return redirect()->route('booktypes.index')->with(['fail' => 'Data Jenis Buku tidak dapat dihapus karena masih ada buku yang menggunakan data ini.']);
        }

        $booktype->delete();
        return redirect()->route('booktypes.index')->with(['success' => 'Data berhasil dihapus.']);
    }

    private function validateInput($input)
    {
        $input->validate(
            [
                'name'  => 'required'
            ],
            [
                'name.required' => 'Nama Jenis Buku tidak boleh kosong.'
            ]
        );
    }
}
