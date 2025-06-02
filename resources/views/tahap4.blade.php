@extends('layouts.app')
@section('content')
<h1 class="mt-4">Tahap 2</h1>

   <section><form method="POST" action="{{ route('submit.tahap4-1') }}" enctype="multipart/form-data">
        @csrf
        <input type ="hidden" name="user_id" value="{{ Auth::id() }}">
        <div>
          <p> Progress 1</p>
            <label for="file">Pilih file (PDF maksimal 2MB):</label>
            <input type="file" name="file" accept=".pdf" required>
        </div>
        <button type="submit">Upload</button>
    </form>
    <a href="{{ route('download.tahap4-1', ['userId' => Auth::user()->id]) }}">Download File Jadwal</a>
    <br>
    <form method="POST" action="{{ route('submit.tahap4-2') }}" enctype="multipart/form-data">
        @csrf
        <input type ="hidden" name="user_id" value="{{ Auth::id() }}">
        <div>
        <p> Progress 2</p>
            <label for="file">Pilih file (PDF maksimal 2MB):</label>
            <input type="file" name="file" accept=".pdf" required>
        </div>
        <button type="submit">Upload</button>
    </form>
    <a href="{{ route('download.tahap4-2', ['userId' => Auth::user()->id]) }}">Download File Jadwal</a>
  </section>
  @endsection
