<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFormulario(){
        return view('contacto.form');
    }

    public function procesarFormulario(Request $request){
        $request->validate([
            'asunto'=>['required', 'string', 'min:3'],
            'email'=>['required', 'email']
        ]);

        try {
            Mail::to('admin@sitio.org')->send(new ContactoMail($request->all()));
        } catch (Exception $e){
            return redirect()->route('dashboard')->with('mensaje', 'No se puedo enviar el correo.');
        }

        return redirect()->route('dashboard')->with('mensaje', 'Correo enviado.');
    }
}
