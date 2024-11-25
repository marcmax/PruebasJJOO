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
      /**
     * Obtener todos los registros de equipo_deportista
     */
    public static function obtenerTodos()
    {
        return self::all();
    }

    /**
     * Obtener un registro de equipo_deportista por su ID
     */
    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    /**
     * Crear una relación entre un equipo y un deportista
     */
    public static function crearRelacion($id_equipo, $id_deportista)
    {
        return self::create([
            'id_equipo' => $id_equipo,
            'id_deportista' => $id_deportista,
        ]);
    }

    /**
     * Eliminar una relación entre un equipo y un deportista
     */
    public static function eliminarRelacion($id_equipo, $id_deportista)
    {
        $relacion = self::where('id_equipo', $id_equipo)
                        ->where('id_deportista', $id_deportista)
                        ->first();

        if ($relacion) {
            $relacion->delete();
            return true;
        }

        return false;
    }
}
