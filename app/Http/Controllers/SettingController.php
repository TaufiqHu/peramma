<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();

        return view('admin.setting.index', ['setting' => $setting, 'title' => 'Pengaturan Peminjaman']);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'max_item'  => 'required|numeric|min:1',
            'max_day'   => 'required|numeric|min:1',
            'fine'      => 'required|numeric',
        ], [
            'max_item.numeric'  => 'Field wajib diisikan angka.',
            'max_day.numeric'   => 'Field wajib diisikan angka.',
            'fine.numeric'      => 'Field wajib diisikan angka.',
            'max_day.required'  => 'Field tidak boleh kosong',
            'max_item.required' => 'Field tidak boleh kosong',
            'fine.required'     => 'Field tidak boleh kosong',
            'max_item.min'      => 'Field tidak boleh dibawah :min',
            'max_day.min'      => 'Field tidak boleh dibawah :min',
        ]);
        $setting = Setting::first();
        $setting->max_item      = $request->max_item;
        $setting->max_day       = $request->max_day;
        $setting->fine_per_day  = $request->fine;
        $setting->save();

        // dd($setting);

        return redirect()->route('setting.index')->with(['success' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
