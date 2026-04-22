<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    public function getAll()
    {
        $data = Auteur::all();
        return $data;
    }

    public function create(Request $request)
    {
        if (
            isset($request->nom) and
            isset($request->prenom) and
            isset($request->email)
        ) {
            $auteur = new Auteur();
            $auteur->nom = $request->nom;
            $auteur->prenom = $request->prenom;
            $auteur->email = $request->email;
            $auteur->save();
            return $auteur;
        }

        $reponse["message"] = "Veuillez renseigner tous les champs SVP.";

        return $reponse;
    }

    public function update(Request $request)
    {
        $reponse = null;
        $id = $request->id;
        if (
            isset($id) and isset($request->nom) and
            isset($request->prenom) and
            isset($request->email)
        ) {
            $auteur = Auteur::find($id);
            if ($auteur != null) {
                $auteur->nom = $request->nom;
                $auteur->prenom = $request->prenom;
                $auteur->email = $request->email;
                $auteur->save();
                return $auteur;
            } else {
                $reponse["message"] = "auteur introuvable";
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
            $auteur = Auteur::find($id);
            if ($auteur != null) {
                $auteur->delete();
                $reponse["message"] = "Supprimé avec succès.";
                return $reponse;
            } else {
                $reponse["message"] = "auteur introuvable";
                return $reponse;
            }
        } else {
            $reponse["message"] = "Veuillez préciser un identifiant SVP.";
            return $reponse;
        }
    }
}
