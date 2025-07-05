<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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

    public function predecirNota(Request $request)
    {
        $cursoId = $request->query('curso_id');
        $userId = auth()->id();

        $notas = DB::table('examenes')
            ->where('user_id', $userId)
            ->where('curso_id', $cursoId)
            ->orderByDesc('id')
            ->limit(5)
            ->pluck('nota')
            ->reverse()
            ->values()
            ->all();

        if (count($notas) < 5) {
            return response()->json(['error' => 'No hay suficientes notas.'], 400);
        }

        $response = Http::post(env('BOT_URL').'/predecir', [
            'curso_id' => (int) $cursoId,
            'notas' => array_map('floatval', $notas)
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Error consultando el modelo.'], 500);
        }

        $prediccion = $response->json('nota_predicha');
        $ultimaNota = $notas[4];

        $mensaje = match(true) {
            $prediccion > $ultimaNota => '¡Buen trabajo! Tu próxima nota podría mejorar.',
            $prediccion < $ultimaNota => 'Ten cuidado, tu desempeño podría estar bajando.',
            default => 'Parece que tu rendimiento se mantiene estable.'
        };

        return response()->json([
            'prediccion' => round($prediccion, 2),
            'mensaje' => $mensaje
        ]);
    }
}
