<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $table='examenes';
    protected $fillable = [
        'curso_id',
        'user_id',
        'nota',
    ];
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function usuarioRespuestas()
    {
        return $this->hasMany(UsuarioRespuesta::class, 'examen_id');
    }
}
