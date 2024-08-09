<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EleveController extends Controller
{
    public function eleve_register(Request $request)
    {
        // Validation des données d'entrée
        $validated = $request->validate([
            'ien' => 'required|string',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'dateDeNaissance' => 'required|date',
            'niveau' => 'required|string|max:255',
            'sexe' => 'required|string',
            'telephoneParent' => 'required|string|max:15',
        ]);

        $eleve = Eleve::create($validated);
   
        $otp = mt_rand(100000, 999999);
        // Sauvegarder l'OTP avec une expiration de 24 heures
        Otp::create([
            'telephoneParent' => $validated['telephoneParent'],
            'otp' => $otp,
            'expires_at' => Carbon::now()->addHours(24),
        ]);

        $lientelechargement = 'xxxxx';

        $message = 'Bonjour cher parent d\'eleve , voici le lien de téléchargement de votre application ANDU School pour les parents d\'eleves de notre etablissement: ' 
        . $lientelechargement .  ' Votre code OTP : ' . $otp . ' . Ce code est valable pour 24 heures.';

        $this->sendSms($validated['telephoneParent'], $message);

        return response()->json(['message' => 'Élève ajouté et SMS envoyé au parent.' , 'eleve' => $eleve] , 201);
    }


    protected function sendSms($tel, $message)
    {
        $url ="https://api-public-2.mtarget.fr/messages?username=elikia&password=FsiGT1aVA7N9&msisdn=%2b221" . $tel . '&msg=' . urlencode($message). "&sender=ANDU";

        $response = Http::get($url);

        if ($response->successful()) {
                    return true;
                } else {
                
                    return false;
        }
    }

    public function listes_eleves(Request $request)
    {
        $eleves = Eleve::all();
        return response()->json($eleves, 200);
    }

    public function eleve($id)
    {
        $eleve = Eleve::find($id);
    
        if (!$eleve) {
            return response()->json(['message' => 'Élève non trouvé'], 404);
        }
    
        return response()->json($eleve, 200);
    }

    public function update_eleve(Request $request, $id)
    {
        $eleve = Eleve::find($id);

        if (!$eleve) {
            return response()->json(['message' => 'Élève non trouvé'], 404);
        }

        $validated = $request->validate([
            'ien' => 'sometimes|string',
            'nom' => 'sometimes|string|max:255',
            'prenom' => 'sometimes|string|max:255',
            'dateDeNaissance' => 'sometimes|date',
            'niveau' => 'sometimes|string|max:255',
            'sexe' => 'sometimes|string',
            'telephoneParent' => 'sometimes|string|max:15',
        ]);

        $eleve->update($validated);

        return response()->json(['message' => 'Élève mis à jour avec succès', 'eleve' => $eleve], 200);
    }

    public function delete_eleve($id)
    {
        $eleve = Eleve::find($id);

        if (!$eleve) {
            return response()->json(['message' => 'Élève non trouvé'], 404);
        }

        $eleve->delete();

        return response()->json(['message' => 'Élève supprimé avec succès'], 200);
    }

}
