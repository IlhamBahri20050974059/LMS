@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tahap 2</div>

                    <div class="card-body">
                    <table class="table">
    <thead>
        <tr>
            <th>Kelompok</th>
            <th>Nama Siswa</th>
            <th>Judul Proyek</th>
            <th>Deskripsi Proyek</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $siswaItem)
            <tr>
                <td>{{ $siswaItem->id }}</td>
                <td>
                    {{ $siswaItem->anggota1_name ?? '-' }},
                    {{ $siswaItem->anggota2_name ?? '-' }},
                    {{ $siswaItem->anggota3_name ?? '-' }},
                    {{ $siswaItem->anggota4_name ?? '-' }}
                </td>
                <td>{{ $siswaItem->judul }}</td>
                <td>{{ $siswaItem->deskripsi }}</td>
                <td>
                    <a href="{{ route('tahap2.form', $siswaItem->id_siswa) }}" class="btn btn-primary btn-sm">View</a>
                    <!-- Add edit and delete buttons if needed -->
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
