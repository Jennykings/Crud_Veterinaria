<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';
    protected $fillable = ['nombre', 'especie', 'raza', 'edad', 'nombre_duenio', 'telefono_duenio'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function tratamientos()
    {
        return $this->hasMany(Tratamiento::class, 'id_paciente', 'id_paciente');
    }
}
