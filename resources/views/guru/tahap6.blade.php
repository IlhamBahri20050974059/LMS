@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tahap 6</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Siswa</th>
                                    <th>Umpan Balik Siswa</th>
                                    <th>Umpan Balik Guru</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $siswaItem)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswaItem->name }}</td>
                                        <td>{{ $siswaItem->umpan_balik_siswa }}</td>
                                        <td>{{ $siswaItem->umpan_balik_guru }}</td>
                                        <td>
                                            <a href="{{ route('tahap6.form', $siswaItem->id_siswa) }}" class="btn btn-primary btn-sm">View</a>
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
