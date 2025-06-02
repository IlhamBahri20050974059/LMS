@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tahap 5</div>

                    <div class="card-body">
                    <table class="table">
    <thead>
        <tr>
            <th>ID Kelompok</th>
            <th>Nama Anggota</th>
            <th>Hasil Proyek</th>
            <th>Nilai</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $siswaItem)
            <tr>
                <td>{{ $siswaItem->id_kelompok }}</td>
                <td>
                    {{ $siswaItem->anggota1_name ?? '-' }},
                    {{ $siswaItem->anggota2_name ?? '-' }},
                    {{ $siswaItem->anggota3_name ?? '-' }},
                    {{ $siswaItem->anggota4_name ?? '-' }}
                </td>
                <td><a href="{{ route('guru.download.tahap5', $siswaItem->id_kelompok) }}">Download File Hasil</a></td>
                <td>{{ $siswaItem->nilai }}</td>
                <td>
                    <a href="{{ route('tahap5.form',  $siswaItem->id_kelompok) }}" class="btn btn-primary btn-sm">View</a>
                    {{-- Bisa tambahkan tombol edit/hapus kalau perlu --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
