<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatSampah;

class TempatsampahController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tempatsampahs = TempatSampah::select('*')->get();

        return view('tempatsampahs.index', ['tempatsampahs' => $tempatsampahs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TempatSampah $request)
    {
        return view('tempatsampahs.create', ['tempatsampahs' => $request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tempatsampah = new TempatSampah;

        $tempatsampah->namalokasi = $request->namalokasi;
        $tempatsampah->alamatlokasi = $request->alamatlokasi;
        $tempatsampah->jenislokasi = $request->jenislokasi;
        $tempatsampah->luaslokasi = $request->luaslokasi;
        $tempatsampah->kapasitaslokasi = $request->kapasitaslokasi;
        $tempatsampah->radiuslokasi = $request->radiuslokasi;
        $tempatsampah->longitude = $request->longitude;
        $tempatsampah->latitude = $request->latitude;
        $tempatsampah->save();

        return redirect()->route('tempatsampahs.index')
            ->with('success_message', 'TPS Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tempatsampah = TempatSampah::findOrFail($id);
        return view('tempatsampahs.show', [
            'tempatsampah' => $tempatsampah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempatsampahs = TempatSampah::findOrFail($id);
        return view('tempatsampahs.edit', [
            'tempatsampah' => $tempatsampahs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $tempatsampah = TempatSampah::findOrFail($id);
        $tempatsampah->namalokasi = $request->namalokasi;
        $tempatsampah->alamatlokasi = $request->alamatlokasi;
        $tempatsampah->jenislokasi = $request->jenislokasi;
        $tempatsampah->luaslokasi = $request->luaslokasi;
        $tempatsampah->kapasitaslokasi = $request->kapasitaslokasi;
        $tempatsampah->radiuslokasi = $request->radiuslokasi;
        $tempatsampah->latitude = $request->latitude;
        $tempatsampah->longitude = $request->longitude;
        $tempatsampah->save();

        return redirect()->route('tempatsampahs.index')->with('success', 'Data sekolah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        var_dump($id);
        $sekolah = TempatSampah::findOrFail($id);
        $sekolah->delete();
        
        TempatSampah::where('id', $id )->delete();

        return redirect()->route('tempatsampahs.index')->with('success', 'Data TPS berhasil dihapus.');
    }
}
