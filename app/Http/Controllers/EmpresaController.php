<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    // Muestra una lista de empresas
    public function index()
    {
        // Obtener todas las empresas desde la base de datos
        $empresas = Empresa::all();
        $ciudades = Ciudad::all();

        // Retornar la vista con la lista de empresas y ciudades
        return view('empresas.index', compact('empresas', 'ciudades'));
    }

    // Muestra el formulario para crear una nueva empresa
    public function create()
    {
        $ciudades = Ciudad::all();
        return view('empresas.create', compact('ciudades'));
    }

    // Almacena una nueva empresa
    public function store(EmpresaRequest $request)
    {
        // Crear una nueva empresa en la base de datos
        Empresa::create(array_merge(
            $request->validated(),
            [
                'estado' => 1, // Establecer el estado inicial como activo
                'registrado_por' => Auth::id() // Guardar el ID del usuario autenticado
            ]
        ));

        // Redirigir a la lista de empresas con un mensaje de éxito
        return redirect()->route('empresas.index')->with('success', 'Empresa creada correctamente.');
    }

    // Muestra los detalles de una empresa específica
    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresa'));
    }

    // Muestra el formulario para editar una empresa
    public function edit(Empresa $empresa)
    {
        $ciudades = Ciudad::all();
        return view('empresas.edit', compact('empresa', 'ciudades'));
    }

    // Actualiza una empresa existente
    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        // Actualizar la empresa en la base de datos
        $empresa->update($request->validated());

        // Redirigir a la lista de empresas con un mensaje de éxito
        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada correctamente.');
    }

    // Elimina una empresa
    public function destroy(Empresa $empresa)
    {
        // Eliminar la empresa de la base de datos
        $empresa->delete();

        // Redirigir a la lista de empresas con un mensaje de éxito
        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada correctamente.');
    }

    // Método para cambiar el estado de una empresa
    public function cambioestadoEmpresa(Request $request)
    {
        // Validación de entrada
        $request->validate([
            'estado' => 'required|boolean',
            'id' => 'required|exists:empresas,id',
        ]);

        try {
            $estado = $request->input('estado');
            $id = $request->input('id');

            // Realiza la lógica para cambiar el estado
            $empresa = Empresa::find($id);
            if ($empresa) {
                $empresa->estado = $estado;
                $empresa->save();
                return response()->json(['success' => true, 'message' => 'Estado de la empresa actualizado correctamente']);
            } else {
                return response()->json(['success' => false, 'message' => 'Empresa no encontrada'], 404);
            }
        } catch (QueryException $e) {
            Log::error('Error al cambiar el estado de la empresa: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al cambiar el estado'], 500);
        } catch (Exception $e) {
            Log::error('Error inesperado al cambiar el estado de la empresa: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error inesperado'], 500);
        }
    }
}
