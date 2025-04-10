@extends('layouts.app')

@section('content')
   <section><form action="{{ route('submit.tahap2') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    
    <!-- Pertanyaan 1 -->
    <p>Judul Proyek</p>
    <label>
    <textarea name="judul" rows="1" cols="30"></textarea>
    </label><br>
    <p>Deskripsi Proyek</p>
    <label>
    <textarea name="deskripsi" rows="10" cols="30"></textarea>
    </label>
   <br><br>

    <button type="submit">Submit</button>
</form></section>

