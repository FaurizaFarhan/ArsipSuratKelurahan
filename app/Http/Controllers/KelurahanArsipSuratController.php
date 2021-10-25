<?php

namespace App\Http\Controllers;

use App\Models\KelurahanArsipSurat;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class KelurahanArsipSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $arsip_Surats = KelurahanArsipSurat::get();
        return view ('surat.index', compact('arsip_Surats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('surat.create');
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
        $arsip_Surats = new KelurahanArsipSurat();
        $request->validate([
            'no_surat' => 'required',               
            'kategori_surat' => 'required',               
            'judul_surat' => 'required',               
            'file_surat' => 'required|mimes:pdf|max:3000'             
        ]);        
        $arsip_Surats->no_surat = $request->no_surat;
        $arsip_Surats->kategori_surat = $request->kategori_surat;
        $arsip_Surats->judul_surat = $request->judul_surat;
        $arsip_Surats->file_surat = $request->file('file_surat')->store('file-surat', 'public');
        $arsip_Surats->save();

        return redirect()->route('surat.index')->with(['data' => 'Arsip Surat Kelurahan Berhasil Ditambahkan', 'alert' => 'alert-danger']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelurahanArsipSurat  $kelurahanArsipSurat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $arsip_Surats = KelurahanArsipSurat::where("id", "=", $id)->first();
        return view('surat.show', compact('arsip_Surats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelurahanArsipSurat  $kelurahanArsipSurat
     * @return \Illuminate\Http\Response
     */
    public function edit(KelurahanArsipSurat $kelurahanArsipSurat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelurahanArsipSurat  $kelurahanArsipSurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KelurahanArsipSurat $kelurahanArsipSurat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelurahanArsipSurat  $kelurahanArsipSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy(KelurahanArsipSurat $kelurahanArsipSurat)
    {
        //
        // Storage::delete('app/public/'.$kelurahanArsipSurat->file_surat);
        unlink(storage_path('app/public/'.$kelurahanArsipSurat->file_surat));

        $kelurahanArsipSurat->delete();
        return redirect()->route('surat.index')-> with(['data' => 'Arsip Surat Berhasil Dihapus', 'alert' => 'alert-danger']);
    }

    public function download($id) 
    {
        $arsip_Surats = KelurahanArsipSurat::where('id', $id)->first();
        return response()->download(storage_path('app/public/'.$arsip_Surats->file_surat));
        
    	
    }
}
