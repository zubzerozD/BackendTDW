<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interaccion;
use App\Models\Perro;

use Illuminate\Http\Response;
use App\Http\Requests\InteraccionRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Http\Response as HttpResponse;

class InteraccionController extends Controller
{
    public function createInteraccion(InteraccionRequest $request)
    {
        try {
            $interaccion = new Interaccion();
            $interaccion->perro_interesado_id = $request->perro_interesado_id;
            $interaccion->perro_candidato_id = $request->perro_candidato_id;
            $interaccion->preferencia = $request->preferencia;
            $interaccion->save();
            return response()->json([
                'message' => 'Interaccion creada correctamente',
                'error' => $interaccion
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al crear la interaccion'], Response::HTTP_BAD_REQUEST);
        }
    }
    public function getallInteracciones(InteraccionRequest $request)
    {
        try {
            $interacciones = Interaccion::all();
            return response()->json([
                'message' => 'Interacciones encontradas',
                'error' => $interacciones
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al encontrar las interacciones'], Response::HTTP_BAD_REQUEST);
        }
    }
    public function updateInteraccion(InteraccionRequest $request)
    {
        try {
            $interaccion = Interaccion::find($request->id);
            $interaccion->perro_interesado_id = $request->perro_interesado_id;
            $interaccion->perro_candidato_id = $request->perro_candidato_id;
            $interaccion->preferencia = $request->preferencia;
            $interaccion->save();
            return response()->json([
                'message' => 'Interaccion actualizada correctamente',
                'error' => $interaccion
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al actualizar la interaccion'], Response::HTTP_BAD_REQUEST);
        }
    }
    public function deleteInteraccion(InteraccionRequest $request)
    {
        try {
            $interaccion = Interaccion::find($request->id);
            $interaccion->delete();
            return response()->json([
                'message' => 'Interaccion eliminada correctamente',
                'error' => $interaccion
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al eliminar la interaccion'], Response::HTTP_BAD_REQUEST);
        }
    }
    public function getInteraccionesByPerro(InteraccionRequest $request)
    {
        try {
            $interacciones = Interaccion::where('perro_interesado_id', $request->id)->get();
            return response()->json([
                'message' => 'Interacciones encontradas',
                'error' => $interacciones
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al encontrar las interacciones'], Response::HTTP_BAD_REQUEST);
        }
    }
}
