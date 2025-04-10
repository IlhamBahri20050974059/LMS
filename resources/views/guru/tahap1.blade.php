@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tahap 1</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Siswa</th>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $siswaItem)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswaItem->name }}</td>
                                        <td>{{ $siswaItem->pertanyaan }}</td>
                                        <td>{{ $siswaItem->jawaban }}</td>
                                        <td>
                                            <a href="{{ route('tahap1.form', $siswaItem->id_siswa) }}" class="btn btn-primary btn-sm">View</a>
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
