<?php

namespace App\Http\Controllers;

use App\Book;
use App\Bookcase;
use App\BookType;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::OrderBy('id', 'desc')->paginate(20);
        $bookcases = Bookcase::all();
        $bookTypes = BookType::all();

        return view('admin.book.index', ['books' => $books, 'booktypes' => $bookTypes, 'bookcases' => $bookcases, 'title' => 'Daftar Buku']);
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
        $validatedInput = $this->validateInput($request);
        $book = new Book();
        $book = $this->updateData($validatedInput, $book);

        return redirect()->to(route('books.index'))->with(['success' => 'Data berhasil ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.book.barcode', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $title = 'Edit Data Buku';
        $bookcases = Bookcase::all();
        $booktypes = BookType::all();
        return view('admin.book.edit', compact('book', 'booktypes', 'bookcases', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedInput = $this->validateInput($request, $book);
        $book = $this->updateData($validatedInput, $book);

        return redirect()->to(route('books.index'))->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // Cek apakah data buku digunakan di table peminjaman
        // if(){}

        // kalau tidak bisa dihapus
        $book->delete();

        return redirect()->to(route('books.index'))->with(['success' => 'Data berhasil dihapus.']);
    }

    public function isbn($isbn)
    {
        $book = Book::where('isbn', $isbn)->first();
        if ($book) {
            return response()->json([
                'status'    => true,
                'data'      => $book
            ], 200);
        } else {
            return response()->json([
                'status'   => false,
                'message'  => "Data Buku dengan ISBN: $isbn tidak ditemukan."
            ], 200);
        }
    }

    private function validateInput($input, $book = null)
    {
        $isbnUniqueRule = '';
        if ($book)
            $isbnUniqueRule = $book->isbn == $input->isbn ? '' : '|unique:books,isbn';
        $validatedInput = $input->validate(
            [
                // Set the Rules for validation
                'title'         => 'required',
                'isbn'          => 'required|numeric|digits:13' . $isbnUniqueRule,
                'booktype'      => 'required|exists:book_types,id',
                'bookcase'      => 'required|exists:bookcases,id',
                'stock'         => 'required|numeric|min:1',
                'publisher'     => 'nullable',
                'author'        => 'nullable',
                'year'          => 'required',
                'page_count'    => 'required|numeric',
                'condition'     => 'nullable',
            ],
            [
                // Set Custom Validation Error Message
                'required'     => ':attribute wajib diisi.',
                'unique'        => ':attribute :input sudah ada, mohon periksa kembali data yang anda masukkan.',
            ],
            [
                // Set Custom Attribute
                'title'         => 'Judul Buku',
                'isbn'          => 'ISBN',
                'booktype'      => 'Jenis Buku',
                'bookcase'      => 'Rak Buku',
                'stock'         => 'Stok',
                'year'          => 'Tahun Terbit',
                'page_count'    => 'Jumlah Halaman',
            ]
        );

        return $validatedInput;
    }

    private function updateData($validateInput, $book)
    {
        $book->title            = $validateInput['title'];
        $book->isbn             = $validateInput['isbn'];
        $book->book_type_id     = $validateInput['booktype'];
        $book->bookcase_id      = $validateInput['bookcase'];
        $book->stock            = $validateInput['stock'];
        $book->publisher        = $validateInput['publisher'];
        $book->author           = $validateInput['author'];
        $book->published_year   = $validateInput['year'];
        $book->page_count       = $validateInput['page_count'];
        $book->condition        = $validateInput['condition'];
        $book->save();

        return $book;
    }
}
