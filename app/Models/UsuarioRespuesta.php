<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioRespuesta extends Model
{
    protected $table = 'usuario_respuestas';

    protected $fillable = [
        'examen_id',
        'pregunta_id',
        'respuesta_id',
       'user_id'
    ];
    public function pregunta() {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }

    public function respuesta() {
        return $this->belongsTo(Respuesta::class, 'respuesta_id');
    }
}
