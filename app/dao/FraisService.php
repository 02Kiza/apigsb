<?php

namespace App\dao;
use App\Models\Frai;

class FraisService
{
    public function getFraisById($idFrais)
    {
        return Frai::join('etat', 'frais.id_etat', '=', 'etat.id_etat')
            ->select('frais.*', 'etat.lib_etat as etat')
            ->where('frais.id_frais', $idFrais)
            ->first();
    }

    public function createFrais(array $data)
    {
        $frais = new Frai();
        $frais->fill($data);
        $frais->save();

        return $frais;
    }

    public function saveFrais(Frai $frais)
    {
        $frais->save();
    }

    public function deleteFrais(Frai $frais)
    {
        $frais->delete();
    }

    public function getFraisByVisiteur($idVisiteur)
    {
        return Frai::where('id_visiteur', $idVisiteur)->get();
    }
}
