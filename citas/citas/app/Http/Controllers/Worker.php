<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Worker extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    
    //obtiene el listado de citas hechas
    public function obtener(Request $request)
    {
      
        $data = DB::select('SELECT * FROM citashechas;');

        return response()->json([
            'data' => $data
        ], 200);
    }

    //agregar una cita nueva a citas hechas
    public function agregar(Request $request)
    {
        $data = array(
            $request->nombre,
            $request->correo,
            $request->celular,
            $request->fecha,
            $request->paquete,
            $request->hora,
            $request->atiende
        );
        
        try {

            DB::insert("INSERT INTO citashechas (nombre, correo, celular , fecha ,paquete,hora,atiende) 
                         VALUES (?,?,?,?,?,?,?)",$data);
        } catch (Exception $e) {

            return response()->json([
                'message' => $e->errorInfo[2],
                'request' => $request,
            ], 400);
        }

        return response()->json([
            'message' => 'Cita guardada con éxito'
        ], 200);
    }

    //actualiza una cita
    public function actualizar(Request $request)
    {
        $data = array(
            $request->nombre,
            $request->correo,
            $request->celular,
            $request->fecha,
            $request->paquete,
            $request->hora,
            $request->atiende,
            $request->id
        );
        
        try {

            DB::update("UPDATE citashechas SET nombre = ?, correo = ?, celular = ?, fecha = ?, paquete = ?, hora = ? , atiende = ?
                         WHERE id = ?",$data);
        } catch (Exception $e) {

            return response()->json([
                'message' => $e->errorInfo[2],
                'request' => $request,
            ], 400);
        }

        return response()->json([
            'message' => 'Cita actualizada con éxito'
        ], 200);
    }

    //elimina una cita
    public function eliminar($id)
    {
        
        try {

            DB::delete("DELETE FROM citashechas WHERE id = ?",array($id));
        } catch (Exception $e) {

            return response()->json([
                'message' => $e->errorInfo[2],
                'request' => $id,
            ], 400);
        }

        return response()->json([
            'message' => 'Cita eliminada con éxito'
        ], 200);
    }
}

