<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

    public function respuestas() {
        return $this->hasMany(Respuesta::class, 'pregunta_id');
    }
}
