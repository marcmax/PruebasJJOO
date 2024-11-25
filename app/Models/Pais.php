<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table ='pais';
    protected $fillable = [
        'nombre', 
        'medallas_oro', 
        'medallas_plata', 
        'medallas_bronce', 
        'total_medallas'
    ];
      /**
     * Obtener todos los países
     */
    public static function obtenerTodos()
    {
        return self::all();
    }

    /**
     * Obtener un país por su ID
     */
    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    /**
     * Crear un nuevo país
     */
    public static function crearPais($nombre, $medallas_oro = 0, $medallas_plata = 0, $medallas_bronce = 0)
    {
        // Calcular el total de medallas
        $total_medallas = $medallas_oro + $medallas_plata + $medallas_bronce;

        return self::create([
            'nombre' => $nombre,
            'medallas_oro' => $medallas_oro,
            'medallas_plata' => $medallas_plata,
            'medallas_bronce' => $medallas_bronce,
            'total_medallas' => $total_medallas,
        ]);
    }

    /**
     * Actualizar los datos de un país
     */
    public static function actualizarPais($id, $nombre, $medallas_oro, $medallas_plata, $medallas_bronce)
    {
        $pais = self::find($id);
        if ($pais) {
            $pais->nombre = $nombre;
            $pais->medallas_oro = $medallas_oro;
            $pais->medallas_plata = $medallas_plata;
            $pais->medallas_bronce = $medallas_bronce;
            $pais->total_medallas = $medallas_oro + $medallas_plata + $medallas_bronce;
            $pais->save();
            return $pais;
        }
        return null;
    }

    /**
     * Eliminar un país
     */
    public static function eliminarPais($id)
    {
        $pais = self::find($id);
        if ($pais) {
            $pais->delete();
            return true;
        }
        return false;
    }

    /**
     * Actualizar el total de medallas de un país
     */
    public static function actualizarTotalMedallas($id)
    {
        $pais = self::find($id);
        if ($pais) {
            // Calcular el total de medallas
            $pais->total_medallas = $pais->medallas_oro + $pais->medallas_plata + $pais->medallas_bronce;
            $pais->save();
            return $pais;
        }
        return null;
    }
}
