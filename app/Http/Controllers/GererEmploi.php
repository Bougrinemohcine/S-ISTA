<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\main_emploi;

class GererEmploi extends Controller
{
    //
    public function index(){

        $emplois = main_emploi::where('establishment_id',session()->get('establishment_id'))->get();
        return view('adminDashboard.gererEmplois.gerer_Emplois',compact('emplois')) ;
    }

    public function activationEmploi($id)
{
    $main_emploi = main_emploi::findOrFail($id); // Assurez-vous que le modèle est importé en haut du fichier
    $newStatus = $main_emploi->confirmer == 0 ? 1 : 0;
    $main_emploi->update(['confirmer' => $newStatus]);

    return redirect()->back()->with('success', 'Module activated successfully.');
}


}
