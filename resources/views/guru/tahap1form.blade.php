@extends('layouts.app')

@section('content')
   <form action="{{ route('submit.tahap1') }}" method="POST">
    @csrf
    <input type="hidden" name="id_siswa" value="{{ $tahap1->id_siswa }}">

    <!-- Pertanyaan 1 -->
    <p>pertanyaan dasar tentang Pemrograman dengan C++ dari siswa:</p>
    <label>
    <textarea name="pertanyaan" rows="5" cols="50" placeholder="Masukkan pertanyaan Anda" readonly>{{ old('pertanyaan', $tahap1->pertanyaan ?? '') }}</textarea>
    </label><br>
   <br><br>
  
   <br><p>Jawabanmu:</p>

   <textarea name="jawaban" rows="5" cols="50" required>{{ old('jawaban', $tahap1->jawaban ?? '') }} </textarea>
   <br>   <br><button type="submit">Submit</button>
</form>

@endsection