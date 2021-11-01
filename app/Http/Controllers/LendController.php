<?php

namespace App\Http\Controllers;

use App\Book;
use App\Lend;
use App\Setting;
use App\Student;
use Illuminate\Http\Request;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'     => 'Peminjaman Buku',
            'setting'   => Setting::first(),
        );

        return view('admin.borrow.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function show(Lend $lend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function edit(Lend $lend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lend $lend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lend $lend)
    {
        //
    }
}
