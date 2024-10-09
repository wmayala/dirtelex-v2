<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\RandomLink;
use Carbon\Carbon;

class RandomLinkController extends Controller
{
    // Método para generar un link aleatorio con expiración
    public function generate(Request $request)
    {
        // Generar un token aleatorio
        $token = Str::random(10);

        // Definir el tiempo de expiración (por ejemplo, 1 hora)
        $expiresAt = Carbon::now()->addHour();

        // Guardar el token y la expiración en la base de datos
        $randomLink = RandomLink::create([
            'token' => $token,
            'expires_at' => $expiresAt
        ]);

        // Generar la URL para compartir
        $shareableLink = route('random.link', ['token' => $token]);

        return redirect()->back()->with([
            'shareableLink' => $shareableLink,
            'expires_at' => $expiresAt->toDateTimeString()
        ]);
    }

    // Método para redirigir a la URL fija si el enlace no ha expirado
    public function redirect($token)
    {
        // Buscar el enlace en la base de datos
        $randomLink = RandomLink::where('token', $token)->first();

        if (!$randomLink) {

            return redirect()->route('error');
        }

        // Verificar si el enlace ha expirado
        if ($randomLink->isExpired()) {
            return redirect()->route('error');
        }

        // Redirigir a la URL fija
        return redirect()->route('register');
    }
}
