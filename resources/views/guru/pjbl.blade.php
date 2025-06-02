@extends('layouts.app')

                                        @csrf
                                        @section('content')
                                    </form> 
  </ul>
   </div>
   <section>
        <a href="/guru/tahap1">
            <h2>Tahap 1: Pertanyaan Mendasar</h2>
        </a>
        <p>Memberikan pertanyaan dasar tentang logika dasar.</p>
    </section>
    <section>
        <a href="/guru/tahap2">
            <h2>Tahap 2: Desain Proyek</h2>
        </a>
        <p>Merancang proyek dengan membentuk judul proyek dan menggambarkan implementasi.</p>
    </section>
    <section>
        <a href="/guru/tahap3">
            <h2>Tahap 3: Menyusun Penjadwalan</h2>
        </a>
        <p>Menyusun penjadwalan dengan menentukan waktu pelaksanaan setiap langkah proyek.</p>
    </section>
    <section>
        <a href="/guru/tahap4">
            <h2>Tahap 4: Kemajuan Proyek</h2>
        </a>
        <p>Melaksanakan proyek yang sudah dirancang dan membuat laporan aktivitas.</p>
    </section>
    <section>
        <a href="/guru/tahap5">
            <h2>Tahap 5: Hasil Proyek</h2>
        </a>
        <p>Mengumpulkan hasil proyek kepada guru.</p>
    </section>
    <section>
        <a href="/guru/tahap6">
            <h2>Tahap 6: Evaluasi</h2>
        </a>
        <p>Memberikan umpan balik tentang proses-proses pembelajaran.</p>
        @endsection

