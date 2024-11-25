<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento_deportivo extends Model
{
    use HasFactory;
    protected $table ='evento_deportivos';
    protected $fillable = ['id_deporte', 'nombre'];

    public function deporte()
    {
        return $this->belongsTo(Deporte::class, 'id_deporte');
    }

    /**
     * Obtener todos los eventos deportivos
     */
    public static function obtenerTodos()
    {
        return self::all();
    }

    /**
     * Obtener un evento deportivo por su nombre
     */
    public static function obtenerPorId($nombre)
    {
        return self::find($nombre);
    }

    /**
     * Crear un nuevo evento deportivo
     */
    public static function crearEventoDeportivo($id_deporte, $nombre)
    {
        return self::create([
            'id_deporte' => $id_deporte,
            'nombre' => $nombre,
        ]);
    }

    /**
     * Actualizar los datos de un evento deportivo
     */
    public static function actualizarEventoDeportivo($id, $id_deporte, $nombre)
    {
        $evento = self::find($id);
        if ($evento) {
            $evento->id_deporte = $id_deporte;
            $evento->nombre = $nombre;
            $evento->save();
            return $evento;
        }
        return null;
    }

    /**
     * Eliminar un evento deportivo
     */
    public static function eliminarEventoDeportivo($id)
    {
        $evento = self::find($id);
        if ($evento) {
            $evento->delete();
            return true;
        }
        return false;
    }

}
