<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medalla extends Model
{
    use HasFactory;
    protected $table ='medallas';
    protected $fillable = ['id_evento', 'tipo'];

        // Relación con el modelo EventoDeportivo
    public function eventoDeportivo()
    {
        return $this->belongsTo(EventoDeportivo::class, 'id_evento');
    }

      /**
     * Obtener todas las medallas
     */
    public static function obtenerTodas()
    {
        return self::all();
    }

    /**
     * Obtener una medalla por su ID
     */
    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    /**
     * Crear una nueva medalla
     */
    public static function crearMedalla($id_evento, $tipo)
    {
        return self::create([
            'id_evento' => $id_evento,
            'tipo' => $tipo,
        ]);
    }

    /**
     * Actualizar los datos de una medalla
     */
    public static function actualizarMedalla($id, $id_evento, $tipo)
    {
        $medalla = self::find($id);
        if ($medalla) {
            $medalla->id_evento = $id_evento;
            $medalla->tipo = $tipo;
            $medalla->save();
            return $medalla;
        }
        return null;
    }

    /**
     * Eliminar una medalla
     */
    public static function eliminarMedalla($id)
    {
        $medalla = self::find($id);
        if ($medalla) {
            $medalla->delete();
            return true;
        }
        return false;
    }
}
