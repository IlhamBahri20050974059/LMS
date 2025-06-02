@extends('layouts.app')

@section('content')
<h1 class="mt-4">Tahap 2</h1>
   <form action="{{ route('submit.tahap2.guru') }}" method="POST">
    @csrf
    <input type="hidden" name="id_kelompok" value="{{ $tahap2->id_kelompok }}">
    <p>Kelompok : {{($tahap2->id_kelompok)}}</p>
    <!-- Pertanyaan 1 -->
    <p>Judul Proyek</p>
    <label>
    <textarea name="judul" rows="1" cols="30"readonly>{{ old('judul', $tahap2->judul ?? '') }}</textarea>
    </label><br>
    <p>Deskripsi Proyek</p>
    <label>
    <textarea name="deskripsi" rows="10" cols="30"readonly>{{ old('deskripsi', $tahap2->deskripsi ?? '') }}</textarea>
    </label>
   <br><br>
   <p>ACC</p>
<label>
    <select name="ACC" class="form-select" style="width: 150px;">
        <option value="1" {{ old('ACC', $tahap5->ACC ?? '') == 1 ? 'selected' : '' }}>ACC</option>
        <option value="0" {{ old('ACC', $tahap5->ACC ?? '') == 0 ? 'selected' : '' }}>Belum diACC</option>
    </select>
</label>

    <p>Komentar Guru : </p>
    <label>
    <textarea name="komentar_guru" rows="5" cols="30">{{ old('deskripsi', $tahap2->komentar_guru ?? '') }}</textarea>
    </label>
    <br><br>
    <button type="submit">Submit</button>
</form>

@endsection
