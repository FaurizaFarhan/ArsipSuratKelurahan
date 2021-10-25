@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section">
            <div class="section-header">
                <h1>Arsip Surat >> Unggah</h1>
            </div>
            <div class="section-body">
                <div class="card card-danger">
                    <div class="card-header flex-row justify-content-between">
                        <h4>Catatan: Harap Gunakan file berformat PDF</h4>
                        <a href=" {{ route('surat.index') }} " class="btn btn-danger">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="no_surat">Nomor Surat</label>
                                <input id="no_surat" type="text"
                                    class="form-control @error('no_surat'){{ 'is-invalid' }}@enderror"
                                        name="no_surat" value="{{ old('no_surat') ?? '' }}">
                                    @error('no_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kategori_surat">Kategori</label>
                                    <select name="kategori_surat" id="kategori_surat"
                                        class="form-control @error('kategori_surat'){{ 'is-invalid' }}@enderror">
                                            <option value="" @if (old('kategori_surat') == null) {{ 'selected' }} @endif disabled>-- Pilih Kategori Surat --
                                            </option>
                                            <option value="Undangan" @if (old('kategori_surat') == 'Undangan') {{ 'selected' }} @endif>Undangan</option>
                                            <option value="Pengumuman" @if (old('kategori_surat') == 'Pengumuman') {{ 'selected' }} @endif>Pengumuman</option>
                                            <option value="Nota Dinas" @if (old('kategori_surat') == 'Nota Dinas') {{ 'selected' }} @endif>Nota Dinas</option>
                                            <option value="Pemberitahuan" @if (old('kategori_surat') == 'Pemberitahuan') {{ 'selected' }} @endif>Pemberitahuan</option>
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="judul_surat">Judul</label>
                                        <input id="judul_surat" type="text"
                                            class="form-control @error('judul_surat'){{ 'is-invalid' }}@enderror" name="judul_surat"
                                                value="{{ old('judul_surat') ?? '' }}">
                                            @error('judul_surat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="file_surat">File Surat (PDF)</label>
                                            <input id="file_surat" type="file" accept="application/pdf"
                                                class="form-control @error('file_surat'){{ 'is-invalid' }}@enderror"
                                                    name="file_surat">
                                                @error('file_surat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        <button type="submit" class="btn btn-danger btn-lg btn-block">
                                            Kirim
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endsection
