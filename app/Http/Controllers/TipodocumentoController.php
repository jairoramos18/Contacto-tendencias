<?php

namespace App\Http\Controllers;

use App\Models\Tipodocumento; // Asegúrate de incluir el modelo Tipodocumento
use Illuminate\Http\Request;
use App\Http\Requests\TipodocumentoRequest; // Asegúrate de tener el request adecuado
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;

class TipodocumentoController extends Controller
{
    // Método para mostrar la lista de tipos de documentos
    public function index()
    {
       
        // Obtener todos los tipos de documentos desde la base de datos
        $tipodocumentos = Tipodocumento::all();

        // Retornar la vista con los tipos de documentos
        return view('tipodocumentos.index', compact('tipodocumentos'));
    }

    // Método para mostrar el formulario de creación de un nuevo tipo de documento
    public function create()
    {
        return view('tipodocumentos.create');
    }

    // Método para almacenar un nuevo tipo de documento
    public function store(TipodocumentoRequest $request)
    {
        try {
            // Crear un nuevo tipo de documento usando los datos validados
            Tipodocumento::create($request->validated());

            // Redirigir con un mensaje de éxito
            return redirect()->route('tipodocumentos.index')->with('successMsg', 'Tipo de documento creado exitosamente.');
        } catch (QueryException $e) {
            Log::error('Error al guardar el tipo de documento: ' . $e->getMessage());
            return redirect()->route('tipodocumentos.create')->withErrors('Error al guardar el registro. Verifique los datos e intente nuevamente.');
        } catch (Exception $e) {
            Log::error('Error inesperado al guardar el tipo de documento: ' . $e->getMessage());
            return redirect()->route('tipodocumentos.create')->withErrors('Ocurrió un error inesperado al guardar el registro. Comuníquese con el Administrador.');
        }
    }

    // Método para mostrar el formulario de edición de un tipo de documento existente
    public function edit(Tipodocumento $tipodocumento)
    {
        return view('tipodocumentos.edit', compact('tipodocumento'));
    }

    // Método para actualizar un tipo de documento existente
    public function update(TipodocumentoRequest $request, Tipodocumento $tipodocumento)
    {
        try {
            // Actualizar el tipo de documento con los datos validados
            $tipodocumento->update($request->validated());

            return redirect()->route('tipodocumentos.index')->with('successMsg', 'Tipo de documento actualizado exitosamente.');
        } catch (QueryException $e) {
            Log::error('Error al actualizar el tipo de documento: ' . $e->getMessage());
            return redirect()->route('tipodocumentos.edit', $tipodocumento)->withErrors('Error al actualizar el registro. Verifique los datos e intente nuevamente.');
        } catch (Exception $e) {
            Log::error('Error inesperado al actualizar el tipo de documento: ' . $e->getMessage());
            return redirect()->route('tipodocumentos.edit', $tipodocumento)->withErrors('Ocurrió un error inesperado al actualizar el registro. Comuníquese con el Administrador.');
        }
    }

    // Método para eliminar un tipo de documento
    public function destroy(Tipodocumento $tipodocumento)
    {
        try {
            $tipodocumento->delete();
            return redirect()->route('tipodocumentos.index')->with('successMsg', 'Tipo de documento eliminado exitosamente.');
        } catch (QueryException $e) {
            Log::error('Error al eliminar el tipo de documento: ' . $e->getMessage());
            return redirect()->route('tipodocumentos.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador.');
        } catch (Exception $e) {
            Log::error('Error inesperado al eliminar el tipo de documento: ' . $e->getMessage());
            return redirect()->route('tipodocumentos.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador.');
        }
    }
    
    public function cambioestadotipodocumento(Request $request)
    {
        $tipodocumento = Tipodocumento::find($request->id);
        if ($tipodocumento) {
            $tipodocumento->estado = $request->estado;
            $tipodocumento->save();
            return response()->json(['success' => 'Estado actualizado correctamente.']);
        }
        return response()->json(['error' => 'Tipo de documento no encontrado.'], 404);
    }
}
