@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tahap 4</div>

                    <div class="card-body">
                    <table class="table">
    <thead>
        <tr>
            <th>ID Siswa</th>
            <th>Nama</th>
            <th>File Proyek ke-1</th>
            <th>File Proyek ke-2</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $siswaItem)
            <tr>
                <td>{{ $siswaItem->id_siswa }}</td>
                <td>
                    {{ $siswaItem->name }}
                </td>
                <td><a href="{{ route('download.tahap4-1', $siswaItem->id_siswa) }}">Progress 1</a></td>
                <td><a href="{{ route('download.tahap4-2', $siswaItem->id_siswa) }}">Progress 2</a></td>
                <td>
                    <a href="{{ route('tahap4.form',  $siswaItem->id_siswa) }}" class="btn btn-primary btn-sm">{{ $siswaItem->ACC == 1 ? 'ACC' : 'Belum diACC' }}</a>
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
