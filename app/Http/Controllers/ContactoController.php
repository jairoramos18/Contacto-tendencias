<?php

namespace App\Http\Controllers;

use App\Models\Contacto; // Asegúrate de incluir el modelo Contacto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function enviarMensaje(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_usuario' => 'required|max:255',
            'email' => 'required|email',
            'celular' => 'required|max:15', 
            'direccion' => 'required|max:255',
            'pais' => 'required|max:100',
            'asunto' => 'required|max:255',
            'mensaje' => 'required',
        ]);

        // Envío del correo electrónico
        Mail::raw($request->mensaje, function ($message) use ($request) {
            $message->to($request->email)  // Se envía al correo ingresado en el formulario
                ->subject($request->asunto) // Asunto del correo
                ->from('jaramosm@ufpso.edu.co', $request->nombre_usuario); // De quién envía
        });

        // Guardar el contacto en la base de datos
        Contacto::create([
            'nombre_usuario' => $request->nombre_usuario,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'celular' => $request->celular,
        ]);

        return back()->withInput()->with('success', 'Tu mensaje ha sido enviado.')
                 ->with([
                     'direccion' => $request->direccion,
                     'celular' => $request->celular,
                     'email' => $request->email,
                     'pais' => $request->pais,
                 ]);


    }
}

