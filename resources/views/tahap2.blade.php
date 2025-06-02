@extends('layouts.app')

@section('content')
<h1 class="mt-4">Tahap 2</h1>
   <section><form action="{{ route('submit.tahap2') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="id_kelompok" value="{{ $tahap2->id_kelompok }}">
    <!-- Pertanyaan 1 -->
    <p>Judul Proyek</p>
    <label>
    <textarea name="judul" rows="1" cols="30">{{ old('judul', $tahap2->judul ?? '') }}</textarea>
    </label><br>
    <p>Deskripsi Proyek</p>
    <label>
    <textarea name="deskripsi" rows="10" cols="30">{{ old('deskripsi', $tahap2->deskripsi ?? '') }}</textarea>
    </label>
   <br><br>

    <button type="submit">Submit</button>
</form></section>

@endsection
