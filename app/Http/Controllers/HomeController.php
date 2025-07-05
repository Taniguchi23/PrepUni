<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        $examenes = Examen::where('user_id',Auth::id())
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();


        return view('home', compact('examenes'));
    }
}
