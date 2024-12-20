<?php

namespace App\Http\Controllers;

use App\dao\FraisService;
use App\Models\Frai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FraisController extends Controller
{


    public function DetailsFrais($idFrais)
    {
        $fraisService = new FraisService();
        $frais = $fraisService->getFraisById($idFrais);

        if (!$frais) {
            return response()->json(['error' => 'Frais non trouvé']);
        }

        return response()->json($frais);
    }





    public function AjouterFrais(Request $request)
    {
        $fraisService = new FraisService();
        $Frais = new Frai();
        $Frais->id_etat=2;
        $Frais->anneemois=$request->json("anneemois");
        $Frais->id_visiteur=$request->json("id_visiteur");
        $Frais->nbjustificatifs=$request->json("nbjustificatifs");

        $frais = $fraisService->saveFrais($Frais). "Insertion réussi";

        return response()->json($frais);

    }


    public function ModifierFrais(Request $request, $idFrais)
    {
        $fraisService = new FraisService();
        $Frais = $fraisService->getFraisById($idFrais);

        if (!$Frais) {
            return response()->json(['error' => 'Le frais n\'a pas été trouvé']);
        }


        $Frais->id_frais = $request->json("id_frais", $Frais->id_frais);
        $Frais->anneemois = $request->json("anneemois", $Frais->anneemois);
        $Frais->id_visiteur = $request->json("id_visiteur", $Frais->id_visiteur);
        $Frais->nbjustificatifs = $request->json("nbjustificatifs", $Frais->nbjustificatifs);
        $Frais->id_etat= $request->json("id_etat", $Frais->id_etat);


        $fraisService->saveFrais($Frais);

        return response()->json(['message' => 'Modification réussie', 'data' => $Frais]);
    }



}
