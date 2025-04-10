<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelompokController extends Controller
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
        return view('kelompok');
    }
    public function submitKelompok(Request $request)
    {
        $user_id = $request->input('user_id');
        $kelompok_id = $request->input('kelompok');

        // Cek apakah pengguna sudah terdaftar dalam kelompok manapun
        $id_kelompok =  DB::table('kelompok')
        ->where('id_anggota1', $user_id)
        ->orWhere('id_anggota2', $user_id)
        ->orWhere('id_anggota3', $user_id)
        ->orWhere('id_anggota4', $user_id)
        ->value('id');
        

        if ($id_kelompok != 0) {
            

            return back()->with('error', 'Anda sudah terdaftar dalam ' . $id_kelompok . '.');
        }

        // Cari data kelompok berdasarkan ID
        $kelompok = DB::table('kelompok')->where('id', $kelompok_id)->first();

        if (!$kelompok) {
            return back()->with('error', 'Kelompok tidak ditemukan.');
        }

        // Proses pengecekan kelompok penuh
        if ($kelompok->id_anggota1 == 0) {
            // Kelompok masih memiliki slot kosong
            DB::table('kelompok')->where('id', $kelompok_id)->update(['id_anggota1' => $user_id]);
        } elseif ($kelompok->id_anggota2 == 0) {
            DB::table('kelompok')->where('id', $kelompok_id)->update(['id_anggota2' => $user_id]);
        } elseif ($kelompok->id_anggota3 == 0) {
            DB::table('kelompok')->where('id', $kelompok_id)->update(['id_anggota3' => $user_id]);
        } elseif ($kelompok->id_anggota4 == 0) {
            DB::table('kelompok')->where('id', $kelompok_id)->update(['id_anggota4' => $user_id]);
        } else {
            // Kelompok sudah penuh
            return back()->with('error', 'Kelompok ini sudah penuh.');
        }

        return back()->with('success', 'Berhasil memilih kelompok.');
    }
}
