@extends('layouts.app')

@section('content')
<h1 class="mt-4">Tahap 1</h1>
   <form action="{{ route('submit.tahap1') }}" method="POST">
    @csrf
    <!-- Pertanyaan 1 -->
    <p>berikan pertanyaan dasar tentang Pemrograman dengan C++!</p>
    <label>
    <textarea name="pertanyaan" rows="5" cols="50" placeholder="Masukkan pertanyaan Anda" required>{{ old('pertanyaan', $tahap1->pertanyaan ?? '') }}</textarea>
    </label><br>
   <br><br>

    <button type="submit">Submit</button>
</form>
<br>   <br>
   <br><p>Jawaban guru dari pertanyaanmu:</p>

   <textarea name="jawaban" rows="5" cols="50" readonly>{{ old('jawaban', $tahap1->jawaban ?? '') }}</textarea>
@endsection
