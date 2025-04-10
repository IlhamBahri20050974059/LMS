@extends('layouts.app') {{-- Sesuaikan dengan layout utama --}}
@section('content')

<div class="container">
    <h1 class="mt-4">BAB 8: Input dan Output (I/O) Dasar</h1>

    <h2 class="mt-3">A. Menggunakan <code>cin</code> dan <code>cout</code> untuk Input/Output Dasar</h2>
    <p>Dalam C++, kita menggunakan <code>cout</code> untuk menampilkan output ke layar dan <code>cin</code> untuk mengambil input dari pengguna.</p>

    <h3>1. Contoh Penggunaan <code>cin</code> dan <code>cout</code></h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    string nama;
    int umur;

    cout << "Masukkan nama Anda: ";
    cin >> nama;
    cout << "Masukkan umur Anda: ";
    cin >> umur;

    cout << "Halo, " << nama << "! Anda berumur " << umur << " tahun." << endl;

    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">B. Membaca dan Menulis File Sederhana Menggunakan <code>fstream</code></h2>
    <p>C++ menyediakan pustaka <code>fstream</code> untuk operasi file, seperti membaca dan menulis.</p>

    <h3>1. Menulis ke File</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
#include &lt;fstream&gt;
using namespace std;

int main() {
    ofstream file("data.txt");
    file << "Halo, ini adalah data yang disimpan dalam file!" << endl;
    file.close();
    
    cout << "Data berhasil disimpan ke file data.txt" << endl;
    return 0;
}</code></pre>
    </div>

    <h3>2. Membaca dari File</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
#include &lt;fstream&gt;
using namespace std;

int main() {
    string isi;
    ifstream file("data.txt");

    while (getline(file, isi)) {
        cout << isi << endl;
    }
    
    file.close();
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">C. Memahami Konsep Manipulasi File Dasar</h2>
    <p>Dalam operasi file, kita bisa:</p>
    <ul>
        <li>Membuka file dalam mode **append** untuk menambahkan data.</li>
        <li>Menghapus isi file sebelum menulis data baru.</li>
        <li>Membaca data baris per baris menggunakan <code>getline()</code>.</li>
    </ul>

    <h3>1. Menambahkan Data ke File</h3>
    <div class="code-box">
        <pre><code>#include &lt;iostream&gt;
#include &lt;fstream&gt;
using namespace std;

int main() {
    ofstream file("data.txt", ios::app);
    file << "Tambahan data ke file." << endl;
    file.close();

    cout << "Data berhasil ditambahkan!" << endl;
    return 0;
}</code></pre>
    </div>

    <h2 class="mt-3">Latihan</h2>
    <ol>
        <li>Buat program yang meminta pengguna memasukkan nama dan menyimpannya ke file.</li>
        <li>Buat program yang membaca isi file dan menampilkannya ke layar.</li>
        <li>Modifikasi program agar bisa menambahkan data tanpa menghapus isi sebelumnya.</li>
    </ol>

    <hr>

    {{-- Tombol Navigasi --}}
    <div class="text-center mt-4">
        <a href="/materi7" class="btn btn-secondary">Kembali ke BAB 7</a>
        <a href="/materi" class="btn btn-primary">Kembali ke BAB 1</a>
    </div>

</div>

<style>
    .code-box {
        background-color: #222;
        color: #fff;
        padding: 15px;
        border-radius: 5px;
        font-family: monospace;
        overflow-x: auto;
    }
</style>

@endsection
