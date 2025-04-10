@extends('layouts.app')

@section('content')
   <form action="{{ route('submit.tahap6') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    
    <!-- Pertanyaan 1 -->
    <p>Berikan umpan balik pembelajaran!!</p>
    <label>
    <textarea name="umpanbaliksiswa" rows="5" cols="50"  required>{{ old('umpan_balik_siswa', $tahap6->umpan_balik_siswa ?? '') }}</textarea>
    </label><br>
   <br><br>

    <button type="submit">Submit</button>
</form>
<br>   <br>
   <br><p>Umpan balik dari guru:</p>

   <textarea name="umpanbalikguru" rows="5" cols="50" readonly>{{ old('umpan_balik_guru', $tahap6->umpan_balik_guru ?? '') }}</textarea>
@endsection