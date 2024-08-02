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
}
