@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section">
            <div class="section-header">
                <h1>About</h1>
            </div>
            <div class="section-body">
                    <div class="card card-danger">
                        <div class="card-header flex-row-reverse">
                            <a href=" {{ route('surat.index') }} " class="btn btn-danger">Kembali</a>
                        </div>
                        <div class="d-flex justify-content-around">
                            <img alt="image" src="{{asset('assets/img/profil.jpg')}}" class="rounded float-left" width="150px" height="179px">
                            <div>
                                <h3>Aplikasi ini dibuat oleh:</h3>
                                <h3>Nama: Farhan Akbar Fauriza</h3>
                                <h3>NIM: 1831710004</h3>
                                <h3>Tanggal: 25 Oktober 2021</h3>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </section>
@endsection
