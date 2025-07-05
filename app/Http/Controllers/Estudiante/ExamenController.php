<?php

namespace App\Http\Controllers\Estudiante;

use App\Helpers\Util;
use App\Http\Controllers\Controller;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamenController extends Controller
{
    public function historial(){
        return view('estudiante.examen.historial');
    }

    public function lista(Request $request)
    {
        $usuario = Auth::user();

        $examenes = Examen::with('curso')
            ->where('user_id', $usuario->id)
            ->orderBy('created_at', 'desc')
            ->get();


        $datos = $examenes->map(function ($examen, $index) {
            return [
                $index + 1,
                $examen->curso->nombre ?? 'Sin curso',
                Util::colorNota($examen->nota),
                Util::fecha($examen->created_at),

            ];
        });


        return response()->json($datos);
    }
}
