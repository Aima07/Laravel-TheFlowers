<?php

namespace App\Http\Controllers;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $suratKeluar = SuratKeluar::all();
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isiNo'         => 'required',
            'isiPenerima'   => 'required',
            'isiPerihal'    => 'required',
            'isiTanggal'    => 'required',
            'lampiran'      => 'file|mimes:pdf,doc,docx|max:2048'
        ]);

                $lampiran = $request->file('lampiran');

        if ($lampiran) {
                $namaLampiran = time().'-'.$lampiran->getClientOriginalName();
                $lampiran->move(public_path('uploads'), $namaLampiran);

                $suratKeluar = new SuratKeluar();
                $suratKeluar->nomor_surat = $request -> isiNo;
                $suratKeluar->penerima = $request -> isiPenerima;
                $suratKeluar->perihal = $request -> isiPerihal;
                $suratKeluar->tanggal_surat = $request -> isiTanggal;
                $suratKeluar->lampiran = $namaLampiran;
                $suratKeluar->save();

                return redirect()->route('surat-keluar.index');
        } else {
            $suratKeluar = new SuratKeluar();
            $suratKeluar->nomor_surat = $request -> isiNo;
            $suratKeluar->penerima = $request -> isiPenerima;
            $suratKeluar->perihal = $request -> isiPerihal;
            $suratKeluar->tanggal_surat = $request -> isiTanggal;
            $suratKeluar->lampiran = "";
            $suratKeluar->save();
            return redirect()->route('surat-keluar.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $suratKeluar = SuratKeluar::find($id);
        return view('surat-keluar.show', compact('suratKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $suratMKeluar = SuratKeluar::find($id);
        return view('surat-keluar.edit', compact('suratKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validatedData = $request->validate([
            'isiNo'         => 'required',
            'isiPenerima'   => 'required',
            'isiPerihal'    => 'required',
            'isiTanggal'    => 'required',
            'lampiran'      => 'file|mimes:pdf,doc,docx|max:2048'
        ]);

                $lsuratKeluar = SuratKeluar::find($id);
        $lampiran = $request->file('lampiran');
        if ($request->hasFile('lampiran')) {
                $namaLampiran = time().'-'.$lampiran->getClientOriginalName();
                $lampiran->move(public_path('uploads'), $namaLampiran);

                $suratKeluar = new SuratKeluar();
                $suratKeluar->nomor_surat = $request -> isiNo;
                $suratKeluar->penerima = $request -> isiPenerima;
                $suratKeluar->perihal = $request -> isiPerihal;
                $suratKeluar->tanggal_surat = $request -> isiTanggal;
                $suratKeluar->lampiran = $namaLampiran;
                $suratKeluar->save();

                return redirect()->route('surat-keluar.index');
        } else {
            $suratKeluar = new SuratKeluar();
            $suratKeluar->nomor_surat = $request -> isiNo;
            $suratKeluar->penerima = $request -> isiPenerima;
            $suratKeluar->perihal = $request -> isiPerihal;
            $suratKeluar->tanggal_surat = $request -> isiTanggal;
            $suratKeluar->lampiran = "";
            $suratKeluar->save();
            return redirect()->route('surat-keluar.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suratKeluar = SuratKeluar::find($id);   
        $suratKeluar->delete();
        return redirect()->route('surat-keluar.index');
    }
}
