<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class CursoController extends Controller
{
    public function lista()
    {
        $cursos = Curso::where('estado','A')->get();
        return view('estudiante.curso.lista',compact('cursos'));
    }

    public function ver($id){
        $examenes = Examen::where('curso_id',$id)
            ->where('user_id',Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        $curso = Curso::find($id);

        $data = [
            'examenes' => $examenes,
            'curso' => $curso,
        ];


        return view('estudiante.curso.ver',$data);
    }

    public function verExamen($id){
        $examen = Examen::findOrFail($id);

        $respuestasUsuario = \App\Models\UsuarioRespuesta::with([
            'pregunta',
            'respuesta' => function ($q) {
                $q->with('pregunta'); // por si necesitas comparar
            },
            'pregunta.respuestas' // para listar todas las opciones y saber cuál era la correcta
        ])->where('examen_id', $examen->id)
            ->where('user_id', auth()->id())
            ->get();

        return view('estudiante.curso.examen', compact('examen', 'respuestasUsuario'));

    }
    public function exportarPdf($id)
    {
        $examen = Examen::with(['curso', 'usuarioRespuestas.pregunta.respuestas'])
            ->findOrFail($id);

        $pdf = Pdf::loadView('estudiante.curso.export', compact('examen'));

        return $pdf->download('examen-'.$examen->id.'.pdf');
    }



}
