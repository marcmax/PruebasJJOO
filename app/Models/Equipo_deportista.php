<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipo_deportista extends Model
{
    use HasFactory;
    protected $table ='equipo_deportistas';
    protected $fillable = ['id_equipo', 'id_deportista'];

    // Relación con el modelo Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

    // Relación con el modelo Deportista
    public function deportista()
    {
        return $this->belongsTo(Deportista::class, 'id_deportista');
    }
}
