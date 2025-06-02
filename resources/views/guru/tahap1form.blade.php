@extends('layouts.app')

@section('content')
<h1 class="mt-4">Tahap 1</h1>
   <form action="{{ route('submit.tahap1.guru') }}" method="POST">
    @csrf
    <input type="hidden" name="id_siswa" value="{{ $tahap1->id_siswa }}">
    <p>Nama siswa : {{($tahap1->name)}}</p>
    <!-- Pertanyaan 1 -->
    <p>Judul Proyek</p>
    <label>
    <textarea name="pertanyaan" rows="5" cols="50" placeholder="Masukkan pertanyaan Anda" readonly>{{ old('pertanyaan', $tahap1->pertanyaan ?? '') }}</textarea>
    </label><br>
   <br><br>

   <br><p>Jawabanmu:</p>

   <textarea name="jawaban" rows="5" cols="50" required>{{ old('jawaban', $tahap1->jawaban ?? '') }} </textarea>
   <br>   <br><button type="submit">Submit</button>
</form>

@endsection
