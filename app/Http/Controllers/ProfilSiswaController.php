<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilSiswaController extends Controller
{
    public function show()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view your profile.');
        }

        // Mengambil data siswa dan user berdasarkan id
        \Log::info('Fetching siswa data for user ID: ' . Auth::id());

        $siswa = DB::table('siswa')
            ->join('users', 'siswa.id', '=', 'users.id')
            ->select('siswa.*', 'users.name', 'users.email', 'users.password')
            ->where('siswa.id', Auth::id())
            ->first();

        if (!$siswa) {
            \Log::warning('No siswa data found for user ID: ' . Auth::id());
        }
        return view('profilsiswa', compact('siswa'));

    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'nisn' => 'required|string|max:20',
            'kelas' => 'required|string|max:20',
        ]);

        // Update data di tabel users
        DB::table('users')->where('id', Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : DB::raw('password'),

        ]);

        // Update data di tabel siswa
        DB::table('siswa')->where('id', Auth::id())->update([
            'nisn' => $request->nisn,
            'kelas' => $request->kelas,
            //'kelompok' => $request->kelompok,
        ]);

        return redirect()->route('siswa.profil')->with('success', 'Profil berhasil diperbarui.');
}
}