@extends('layouts.app')

@section('content')
<h1 class="mt-4">Tahap 5</h1>

                                        @csrf
                                    </form>
  </ul>
   </div>
   <section><form method="POST" action="{{ route('submit.tahap5') }}" enctype="multipart/form-data">
        @csrf
        <input type ="hidden" name="user_id" value="{{ Auth::id() }}">
        <div>
            <label for="file">Pilih file (PDF maksimal 2MB):</label>
            <input type="file" name="file" accept=".pdf" required>
        </div>
        <button type="submit">Upload</button>
    </form>
    <a href="{{ route('download.tahap5', ['userId' => Auth::user()->id]) }}">Download File</a>
    @endsection
