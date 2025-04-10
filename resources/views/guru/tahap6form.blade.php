@extends('layouts.app')

@section('content')
<form action="{{ route('submit.tahap6') }}" method="POST">
    @csrf
    <input type="hidden" name="id_siswa" value="{{ $tahap6->id_siswa }}">
    
    <!-- Pertanyaan 1 -->
    <p>Umpan balik dari Siswa:</p>
    <label>
    <textarea name="umpanbaliksiswa" rows="5" cols="50"readonly>{{ old('umpan_balik_siswa', $tahap6->umpan_balik_siswa ?? '') }}</textarea>
    </label>
    <br><br><br><br> 
    <p>Berikan umpan balik pembelajaran!!</p>
    <textarea name="umpanbalikguru" rows="5" cols="50" required>{{ old('umpan_balik_guru', $tahap6->umpan_balik_guru ?? '') }}</textarea>
    <br>
   <br>
    <button type="submit">Submit</button>
</form>
  

  
@endsection