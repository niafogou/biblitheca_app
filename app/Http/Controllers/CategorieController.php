<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function getAll()
    {
        $data = Categorie::all();
        return $data;
    }

    public function create(Request $request)
    {
        if (isset($request->libelle)) {
            $cat = new Categorie();
            $cat->libelle = $request->libelle;
            $cat->save();
            return $cat;
        }

        $reponse["message"] = "Veuillez renseigner tous les champs SVP.";

        return $reponse;
    }

    public function update(Request $request)
    {
        $reponse = null;
        $id = $request->id;
        $libelle = $request->libelle;
        if (isset($id) and isset($libelle)) {
            $cat = Categorie::find($id);
            if ($cat != null) {
                $cat->libelle = $libelle;
                $cat->save();
                return $cat;
            } else {
                $reponse["message"] = "Catégorie introuvable";
                return $reponse;
            }
        } else {
            $reponse["message"] = "Veuillez renseigner tous les champs SVP.";
            return $reponse;
        }
    }

    public function delete($id)
    {
        if (isset($id)) {
            $cat = Categorie::find($id);
            if ($cat != null) {
                $cat->delete();
                $reponse["message"] = "Supprimé avec succès.";
                return $reponse;
            } else {
                $reponse["message"] = "Catégorie introuvable";
                return $reponse;
            }
        } else {
            $reponse["message"] = "Veuillez préciser un identifiant SVP.";
            return $reponse;
        }
    }
}
