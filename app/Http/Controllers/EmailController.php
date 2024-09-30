<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail()
    {
        $details = [
            'title' => 'Hola, ¿cómo estás ?',
            'body' => ' este es un mensaje de prueba.'
        ];

        $subject = 'buenos dias'; // Cambia estob al nuevo título que desees


        Mail::to('akleleidy@gmail.com')->send(new WelcomeMail($details,$subject));

        return 'Correo enviado jairo ramos';
    }
}
