<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PaisRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\Log;

class PaisController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        return view('paises.index',compact('paises'));
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(PaisRequest $request)
    {
		$pais = Pais::create($request->all());
		return redirect()->route('paises.index')->with('successMsg','El registro se guardó exitosamente');
    }

    public function show(Pais $pais)
    {
        //
    }

    public function edit(Pais $paise)
    {
        return view('paises.edit',compact('paise'));
    }

    public function update(PaisRequest $request, Pais $paise)
    {
        $paise->update($request->all());
        return redirect()->route('paises.index')->with('successMsg','El registro se actualizó exitosamente');
    }
	
	public function destroy(Pais $paise)
    {
		try {
            $paise->delete();
            return redirect()->route('paises.index')->with('successMsg', 'El registro se eliminó exitosamente');
        } catch (QueryException $e) {
            // Capturar y manejar violaciones de restricción de clave foránea
            Log::error('Error al eliminar el país: ' . $e->getMessage());
            return redirect()->route('paises.index')->withErrors('El registro que desea eliminar tiene información relacionada. Comuníquese con el Administrador');
        } catch (Exception $e) {
            // Capturar y manejar cualquier otra excepción
            Log::error('Error inesperado al eliminar el país: ' . $e->getMessage());
            return redirect()->route('paises.index')->withErrors('Ocurrió un error inesperado al eliminar el registro. Comuníquese con el Administrador');
        }
    }
	
	public function cambioestadopais(Request $request)
	{
		$pais = Pais::find($request->id);
		$pais->estado=$request->estado;
		$pais->save();
	}
}