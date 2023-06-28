<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perro;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Http\Response as HttpResponse;
use App\Http\Requests\perroRequest;

use Exception;

class PerroController extends Controller
{
    public function createPerro (perroRequest $request){
        try {
            $perro = new Perro();
            $perro->name = $request->name;
            $perro->url = $request->url;
            $perro->description = $request->description;
            $perro->save();
            return response()->json([
                'message' => 'Perro creado correctamente',
                'error' => $perro ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al crear el perro'], Response::HTTP_BAD_REQUEST);
        }
    }


    public function viewPerro (perroRequest $request){
        try {
            $perro = Perro::find($request->id);
            return response()->json([
                'message' => 'Perro encontrado',
                'error' => $perro ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al encontrar el perro'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getallPerros (perroRequest $request){
        try {
            $perros = Perro::all();
            return response()->json([
                'message' => 'Perros encontrados',
                'error' => $perros ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al encontrar los perros'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function updatePerro (perroRequest $request){
        try {
            $perro = Perro::find($request->id);
            $perro->name = $request->name;
            $perro->url = $request->url;
            $perro->description = $request->description;
            $perro->save();
            return response()->json([
                'message' => 'Perro actualizado correctamente',
                'error' => $perro ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al actualizar el perro'], Response::HTTP_BAD_REQUEST);
        }
    }

    public function deletePerro (perroRequest $request){
        try {
            $perro = Perro::find($request->id);
            $perro->delete();
            return response()->json([
                'message' => 'Perro eliminado correctamente',
                'error' => $perro ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Error al eliminar el perro'], Response::HTTP_BAD_REQUEST);
        }
    }

}

