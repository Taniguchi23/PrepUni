<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function skill(){
        $userId = Auth::id();

        $rz = Examen::with('curso')
            ->where('user_id', $userId)
            ->where('curso_id', 1)
            ->orderBy('id', 'desc')
            ->first();

        $co = Examen::with('curso')
            ->where('user_id', $userId)
            ->where('curso_id', 2)
            ->orderBy('id', 'desc')
            ->first();


        $hi = Examen::with('curso')
            ->where('user_id', $userId)
            ->where('curso_id', 3)
            ->orderBy('id', 'desc')
            ->first();

        $bi = Examen::with('curso')
            ->where('user_id', $userId)
            ->where('curso_id', 4)
            ->orderBy('id', 'desc')
            ->first();

        $qui = Examen::with('curso')
            ->where('user_id', $userId)
            ->where('curso_id', 5)
            ->orderBy('id', 'desc')
            ->first();

        $data = [
            $rz?->nota ?? 1,
            $co?->nota ?? 1,
            $hi?->nota ?? 1,
            $bi?->nota ?? 1,
            $qui?->nota ?? 1,
        ];
        $labels = [
            $rz?->curso?->nombre ?? 'Razonamiento Matemático',
            $co?->curso?->nombre ?? 'Comunicación',
            $hi?->curso?->nombre ?? 'Historia',
            $bi?->curso?->nombre ?? 'Biología',
            $qui?->curso?->nombre ?? 'Química',
        ];

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }

    public function cursos(){
        $rz = Examen::where('user_id', Auth::id())
            ->where('curso_id', 1)
            ->orderByDesc('id')
            ->limit(15)
            ->get(['nota', 'created_at'])
            ->sortBy('created_at') // Ordena por fecha (antiguo → nuevo)
            ->values();


        $co = Examen::where('user_id', Auth::id())
            ->where('curso_id', 2)
            ->orderByDesc('id')
            ->limit(15)
            ->get(['nota', 'created_at'])
            ->sortBy('created_at') // Ordena por fecha (antiguo → nuevo)
            ->values();

        $hi = Examen::where('user_id', Auth::id())
            ->where('curso_id', 3)
            ->orderByDesc('id')
            ->limit(15)
            ->get(['nota', 'created_at'])
            ->sortBy('created_at') // Ordena por fecha (antiguo → nuevo)
            ->values();

        $bi = Examen::where('user_id', Auth::id())
            ->where('curso_id', 4)
            ->orderByDesc('id')
            ->limit(15)
            ->get(['nota', 'created_at'])
            ->sortBy('created_at') // Ordena por fecha (antiguo → nuevo)
            ->values();

        $qui = Examen::where('user_id', Auth::id())
            ->where('curso_id', 5)
            ->orderByDesc('id')
            ->limit(15)
            ->get(['nota', 'created_at'])
            ->sortBy('created_at') // Ordena por fecha (antiguo → nuevo)
            ->values();

        $data = [
            'rz' => $rz,
            'co' => $co,
            'hi' => $hi,
            'bi' => $bi,
            'qui' => $qui,
        ];

        return response()->json($data);

    }
}
