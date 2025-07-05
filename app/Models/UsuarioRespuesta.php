<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioRespuesta extends Model
{
    protected $table = 'usuario_respuestas';

    public function pregunta() {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }

    public function respuesta() {
        return $this->belongsTo(Respuesta::class, 'respuesta_id');
    }
}
