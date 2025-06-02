@extends('layouts.app')

@section('content')
<h1 class="mt-4">Tahap 5</h1>
   <form action="{{ route('submit.tahap5.guru') }}" method="POST">
    @csrf
    <input type="hidden" name="id_kelompok" value="{{ $tahap5->id_kelompok }}">
    <p>Kelompok : {{($tahap5->id_kelompok)}}</p>
    <!-- Pertanyaan 1 -->
    <p>Hasil Proyek</p>
    <label>
    <a href="{{ route('guru.download.tahap5', $tahap5->id_kelompok) }}">Download File Hasil</a>
    </label><br><br><br>
    <p>Nilai</p>
    <label>
    <input type="number" min="0" max="100" name="nilai" value="{{ old('nilai', $tahap5->nilai ?? '') }}">
    </label>
   <br><br>

    <button type="submit">Submit</button>
</form>

@endsection
