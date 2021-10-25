@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section">
            <div class="section-header">
                <h1>Arsip Surat >> Lihat</h1>
            </div>
            <div class="section-body">
                <div class="card card-danger">
                    <div class="card-header d-flex justify-content-between">
                        <a href=" {{ route('surat.index') }} " class="btn btn-primary">Kembali</a>
                        <a href=" {{ route('surat.download', ['surat' => $arsip_Surats->id]) }} " class="btn btn-success">Unduh</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            <h5>Nomor : {{ $arsip_Surats->no_surat }}</h5>
                            <h5>Kategori : {{ $arsip_Surats->kategori_surat }}</h5>
                            <h5>Judul : {{ $arsip_Surats->judul_surat }}</h5>
                            <h5>Waktu Pengarsipan : {{ $arsip_Surats->created_at }}</h5>
                            
                            <center><embed src="{{asset('storage/'.$arsip_Surats->file_surat)}}"
                                type="application/pdf" frameBorder="0" scrolling="auto" height="1500px" width="800px"></embed>
                            </center>
                            
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
