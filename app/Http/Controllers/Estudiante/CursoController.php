<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\UsuarioRespuesta;
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

    public function crearExamen($curso_id)
    {
        $curso = Curso::findOrFail($curso_id);
        $preguntas = Pregunta::where('curso_id', $curso_id)->inRandomOrder()->take(20)->with('respuestas')->get();

        return view('estudiante.curso.resolver', compact('curso', 'preguntas'));
    }

    public function guardarExamen(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'respuestas' => 'required|array',
        ]);

        $examen = Examen::create([
            'curso_id' => $request->curso_id,
            'user_id' => Auth::id(),
            'nota' => 0,
        ]);

        $correctas = 0;
        foreach ($request->respuestas as $pregunta_id => $respuesta_id) {
            $respuesta = Respuesta::find($respuesta_id);

            UsuarioRespuesta::create([
                'examen_id' => $examen->id,
                'pregunta_id' => $pregunta_id,
                'respuesta_id' => $respuesta_id,
                'user_id' => Auth::id(),
            ]);

            if ($respuesta && $respuesta->es_correcta) {
                $correctas++;
            }
        }

        $nota = round(($correctas / 20) * 20, 2); // escala de 0 a 20
        $examen->update(['nota' => $nota]);

        return redirect()->route('estudiante.cursos.examen.ver', ['id' => $examen->id]);
    }

}
