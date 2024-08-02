<?php

namespace App\Http\Controllers;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat-masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isiNo'         => 'required',
            'isiPengirim'   => 'required',
            'isiPerihal'    => 'required',
            'isiTujuan'     => 'required',
            'isiTanggal'    => 'required',
            'lampiran'      => 'file|mimes:pdf,doc,docx|max:2048'
        ]);

                $lampiran = $request->file('lampiran');

        if ($lampiran) {
                $namaLampiran = time().'-'.$lampiran->getClientOriginalName();
                $lampiran->move(public_path('uploads'), $namaLampiran);

                $suratMasuk = new SuratMasuk();
                $suratMasuk->nomor_surat = $request -> isiNo;
                $suratMasuk->pengirim = $request -> isiPengirim;
                $suratMasuk->perihal = $request -> isiPerihal;
                $suratMasuk->tujuan_surat = $request -> isiTujuan;
                $suratMasuk->tanggal_surat = $request -> isiTanggal;
                $suratMasuk->lampiran = $namaLampiran;
                $suratMasuk->save();

                return redirect()->route('surat-masuk.index');
        } else {
            $suratMasuk = new SuratMasuk();
            $suratMasuk->nomor_surat = $request -> isiNo;
            $suratMasuk->pengirim = $request -> isiPengirim;
            $suratMasuk->perihal = $request -> isiPerihal;
            $suratMasuk->tujuan_surat = $request -> isiTujuan;
            $suratMasuk->tanggal_surat = $request -> isiTanggal;
            $suratMasuk->lampiran = "";
            $suratMasuk->save();
            return redirect()->route('surat-masuk.index');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suratMasuk = SuratMasuk::find($id);
        return view('surat-masuk.show', compact('suratMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suratMasuk = SuratMasuk::find($id);
        return view('surat-masuk.edit', compact('suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validatedData = $request->validate([
            'isiNo'         => 'required',
            'isiPengirim'   => 'required',
            'isiPerihal'    => 'required',
            'isiTujuan'     => 'required',
            'isiTanggal'    => 'required',
            'lampiran'      => 'file|mimes:pdf,doc,docx|max:2048'
        ]);

                $lsuratMasuk = SuratMasuk::find($id);
        $lampiran = $request->file('lampiran');
        if ($request->hasFile('lampiran')) {
                $namaLampiran = time().'-'.$lampiran->getClientOriginalName();
                $lampiran->move(public_path('uploads'), $namaLampiran);

                $suratMasuk = new SuratMasuk();
                $suratMasuk->nomor_surat = $request -> isiNo;
                $suratMasuk->pengirim = $request -> isiPengirim;
                $suratMasuk->perihal = $request -> isiPerihal;
                $suratMasuk->tujuan_surat = $request -> isiTujuan;
                $suratMasuk->tanggal_surat = $request -> isiTanggal;
                $suratMasuk->lampiran = $namaLampiran;
                $suratMasuk->save();

                return redirect()->route('surat-masuk.index');
        } else {
            $suratMasuk = new SuratMasuk();
            $suratMasuk->nomor_surat = $request -> isiNo;
            $suratMasuk->pengirim = $request -> isiPengirim;
            $suratMasuk->perihal = $request -> isiPerihal;
            $suratMasuk->tujuan_surat = $request -> isiTujuan;
            $suratMasuk->tanggal_surat = $request -> isiTanggal;
            $suratMasuk->lampiran = "";
            $suratMasuk->save();
            return redirect()->route('surat-masuk.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suratMasuk = SuratMasuk::find($id);   
        $suratMasuk->delete();
        return redirect()->route('surat-masuk.index');
        
    }
}
