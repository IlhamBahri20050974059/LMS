<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
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
        return view('materi');
    }
    public function materi2()
    {
        return view('materi2');
    }
    public function materi3()
    {
        return view('materi3');
    }
    public function materi4()
    {
        return view('materi4');
    }
    public function materi5()
    {
        return view('materi5');
    }
    public function materi6()
    {
        return view('materi6');
    }
    public function materi7()
    {
        return view('materi7');
    }
    public function materi8()
    {
        return view('materi8');
    }
}
