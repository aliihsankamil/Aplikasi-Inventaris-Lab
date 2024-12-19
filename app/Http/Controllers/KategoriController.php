<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // ngambil data dari tabel kategori
        $kategori = Kategori::all();

        // mengarahkan ke folder resource/view/kategori/kategori.blade.php
        return view('kategori/kategori', [
            'kategories' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriRequest $request)
    {
        $validateData = $request->validate([
            'nama' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Kategori::create($validateData);

        return redirect('/dashboard/kategori/')->with('success', 'Kategori baru telah disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::whereId($id)->first();
        return view('kategori/edit')->with('kategori', $kategori);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriRequest  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriRequest $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/dashboard/kategori/')->with('success', 'Kategori berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $kategori;
        Kategori::destroy($id);

        return redirect('/dashboard/kategori/')->with('success', 'Kategori berhasil dihapus!');
    }
}
