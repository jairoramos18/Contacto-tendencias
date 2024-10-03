<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    // Muestra una lista de empresas
    public function index()
    {
        $empresas = Empresa::all();
        return view('empresas.index', compact('empresas'));
    }

    // Muestra el formulario para crear una nueva empresa
    public function create()
    {
        return view('empresas.create');
    }

    // Almacena una nueva empresa
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'correo' => 'required|email',
            // Agrega validaciones adicionales según tus necesidades
        ]);

        Empresa::create($request->all());
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
        return view('empresas.edit', compact('empresa'));
    }

    // Actualiza una empresa existente
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'celular' => 'required',
            'correo' => 'required|email',
        ]);

        $empresa->update($request->all());
        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada correctamente.');
    }

    // Elimina una empresa
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada correctamente.');
    }
}
