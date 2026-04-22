<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function getAll()
    {
        $data = Livre::all();
        return $data;
    }

    public function create(Request $request)
    {
        if (
            isset($request->libelle) and
            isset($request->nb_page) and
            isset($request->description) and
            isset($request->image) and
            isset($request->categorie_id) and
            isset($request->auteur_id)

        ) {
            $livre = new Livre();
            $livre->libelle = $request->libelle;
            $livre->description = $request->description;
            $livre->nb_page = $request->nb_page;
            $livre->image = $request->image;
            $livre->categorie_id = $request->categorie_id;
            $livre->auteur_id = $request->auteur_id;
            
            $livre->save();
            return $livre;
        }

        $reponse["message"] = "Veuillez renseigner tous les champs SVP.";

        return $reponse;
    }

    public function update(Request $request)
    {
        $reponse = null;
        $id = $request->id;
        if (
            isset($id) and
            isset($request->libelle) and
            isset($request->nb_page) and
            isset($request->categorie_id) and
            isset($request->description) and
            isset($request->image) and
            isset($request->auteur_id)
        ) {
            $livre = Livre::find($id);
            if ($livre != null) {
                $livre->libelle = $request->libelle;
                $livre->nb_page = $request->nb_page;
                $livre->categorie_id = $request->categorie_id;
                $livre->auteur_id = $request->auteur_id;
                $livre->description = $request->description;
                $livre->image = $request->image;
                $livre->save();
                return $livre;
            } else {
                $reponse["message"] = "Livre introuvable";
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
            $livre = Livre::find($id);
            if ($livre != null) {
                $livre->delete();
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
