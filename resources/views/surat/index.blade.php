@extends('layouts.app')

@section('content')
<div class="section-header">
    <h1>Arsip Surat Kelurahan Lowokwaru</h1>
</div>
@if (session('data'))
    @include('layouts.alert')
@endif
<div class="section-body">
    <div class="card card-danger">
        <div class="card-header flex-row justify-content-between">
            <h4>Daftar Surat</h4>
            <a href="{{ route('surat.create')}}" class="btn btn-danger">Arsipkan Surat</a>
        </div>
        <div class="card-body">
            <table id="users" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Kategori Surat</th>
                        <th>Judul Surat</th>
                        <th>Waktu Pengarsipan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arsip_Surats as $surat)
                    <tr>
                        <td>{{ $surat->no_surat }}</td>
                        <td>{{ $surat->kategori_surat }}</td>
                        <td>{{ $surat->judul_surat }}</td>
                        <td>{{ $surat->created_at->translatedFormat('d F Y, H:i') }}</td>
                        <td>
                            <button class="btn btn-icon btn-danger" id="modal-destroy-{{$surat->id}}" data-toggle="modal" data-target="#modal-destroy-{{$surat->id}}">Hapus</button>
                            <a href="{{ route('surat.download', ['surat' => $surat->id]) }}" class="btn btn-success btn-icon">Unduh</a>
                            <a href="{{ route('surat.show', ['surat' => $surat->id]) }}" class="btn btn-warning btn-icon">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<!-- modal -->
@foreach ($arsip_Surats as $surat)
<div class="modal fade" tabindex="-1" role="dialog" id="modal-destroy-{{$surat->id}}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Surat</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span><i class="fas fa-times-circle"></i></span></button>
            </div>
            <div class="modal-body">
                Apa Anda yakin ingin menghapus arsip surat ini ?
            </div>
            <div class="modal-footer flex justify-content-center">
                <form action="{{ route('surat.destroy', ['surat' => $surat->id])}}" method="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-icon" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-success btn-icon"><i class="fas fa-check"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- custom -->
@section('customCSS')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.css" />
@endsection
@section('customJS')
<script src="{{asset('assets/js/bootstrap-modal.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users').DataTable({
            responsive: true,
            columns: [
                null,
                {
                    width: '20%'
                },
                null,
                null,
                {
                    searchable: false,
                    orderable: false
                }
            ]
        });
    });
</script>
@endsection