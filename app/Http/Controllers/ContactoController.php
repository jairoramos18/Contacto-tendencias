<?php

namespace App\Http\Controllers;

use App\Models\Contacto; // Asegúrate de incluir el modelo Contacto
use App\Http\Requests\ContactoRequest; // Importar el request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Exception;

class ContactoController extends Controller
{
    // Método para mostrar la lista de contactos
    public function index()
    {
        // Obtener todos los contactos desde la base de datos
        $contactos = Contacto::all();

        // Retornar la vista con los contactos
        return view('contactos.index', compact('contactos'));
    }

    // Método para enviar un mensaje de contacto
    public function enviarMensaje(ContactoRequest $request)
    {
        // Envío del correo electrónico
        Mail::raw($request->mensaje, function ($message) use ($request) {
            $message->to($request->email)
                ->subject($request->asunto)
                ->from('jaramosm@ufpso.edu.co', $request->nombre_usuario);
        });

        // Guardar el contacto en la base de datos
        Contacto::create($request->validated()); // Usar el método validated()

        return back()->withInput()->with('success', 'Tu mensaje ha sido enviado.')->with([
            'direccion' => $request->direccion,
            'celular' => $request->celular,
            'email' => $request->email,
            'pais' => $request->pais,
        ]);
    }

    // Método para mostrar el formulario de creación de un nuevo contacto
    public function create()
    {
        return view('contactos.create');
    }

    // Método para almacenar un nuevo contacto
    public function store(ContactoRequest $request)
    {
        // Crear un nuevo contacto
        Contacto::create($request->validated()); // Usar el método validated()

        // Redirigir con un mensaje de éxito
        return redirect()->route('contactos.index')->with('success', 'Contacto creado exitosamente');
    }

    // Método para mostrar el formulario de edición de un contacto existente
    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }

    // Método para actualizar un contacto existente
    public function update(ContactoRequest $request, Contacto $contacto)
    {
        // Actualizar el contacto
        $contacto->update($request->validated()); // Usar el método validated()

        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado exitosamente.');
    }

    // Método para eliminar un contacto
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();

        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado exitosamente.');
    }

    // Método para cambiar el estado de un contacto
    public function cambioEstadoContacto(Request $request)
{
    // Validar la solicitud
    $validated = $request->validate([
        'estado' => 'required|boolean', // Asegura que el estado sea 0 o 1
        'id' => 'required|exists:contactos,id', // Verifica que el ID exista en la tabla contactos
    ]);

    // Buscar el contacto por ID
    $contacto = Contacto::find($request->id);
    if (!$contacto) {
        return response()->json(['success' => false, 'message' => 'Contacto no encontrado'], 404);
    }

    // Actualizar el estado del contacto
    $contacto->estado = $request->estado ? 'activo' : 'inactivo';
    $contacto->save();

    // Retornar la respuesta JSON
    return response()->json(['success' => true, 'message' => 'Estado actualizado correctamente']);
}
}
