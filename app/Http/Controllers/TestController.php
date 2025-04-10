<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('test');
    }
    public function pretest()
    {
        return view('pretest');
    }
    public function posttest()
    {
        return view('posttest');
    }
    public function submitAnswerPretest(Request $request) 
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'user_id' => 'required',
            'selected_option' => 'required|array', // Memastikan bahwa data yang diterima adalah array
        ]);

        $jawabanBenar = 0;

        // Lakukan pengecekan jawaban untuk setiap pertanyaan
        foreach ($validatedData['selected_option'] as $questionId => $selectedOption) {
            if ($this->cekJawaban($questionId, $selectedOption)) {
                $jawabanBenar++;
            }
        }
        
        // Hitung nilai total ujian
        $nilaiUjian = $jawabanBenar * 50;

        // Simpan nilai ujian ke dalam tabel nilai_test
        DB::table('nilai_test')->insert([
            'id_siswa' => $validatedData['user_id'],
            'pretest' => $nilaiUjian,
            'post' => 0 // Set nilai kolom post menjadi 0
        ]);

        return redirect('/test')->with('message', 'Jawaban Anda berhasil disimpan.');
    }
    public function submitAnswerPosttest(Request $request) 
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'user_id' => 'required',
            'selected_option' => 'required|array', // Memastikan bahwa data yang diterima adalah array
        ]);

        $jawabanBenar = 0;

        // Lakukan pengecekan jawaban untuk setiap pertanyaan
        foreach ($validatedData['selected_option'] as $questionId => $selectedOption) {
            if ($this->cekJawaban($questionId, $selectedOption)) {
                $jawabanBenar++;
            }
        }

        // Hitung nilai total ujian
        $nilaiUjian = $jawabanBenar * 50;

        /// Update nilai post berdasarkan id_siswa
    DB::table('nilai_test')
    ->where('id_siswa', $validatedData['user_id'])
    ->update(['post' => $nilaiUjian]);
        return redirect('/test')->with('message', 'Jawaban Anda berhasil disimpan.');
    }
    // Fungsi untuk memeriksa apakah jawaban benar
    private function cekJawaban($questionId, $selectedOption) 
    {
        // Lakukan logika pengecekan jawaban
        // Misalnya, jika pilihan yang benar disimpan dalam database, kamu dapat membandingkan dengan database di sini
        // Contoh sederhana hanya untuk tujuan demonstrasi
        return $selectedOption === 'A'; // Misalnya, jawaban yang benar adalah pilihan A
    }
}
