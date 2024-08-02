<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\group;
use App\Models\branch;
use App\Models\class_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EmploiStrictureModel;
use Illuminate\Support\Facades\Auth;
use App\Models\main_emploi;


class stagiaireController extends Controller
{
    //
    public function showHomepage(){
        $lastEmploiCreated = main_emploi::select('id')->where('establishment_id', session()->get('establishment_id'))
                ->where('confirmer',1)
                ->latest()
                ->first();
        $lastEmploiId = $lastEmploiCreated ? $lastEmploiCreated->id : null;

        $tableEmploi = EmploiStrictureModel::where('user_id', Auth::user()->id)->get();
        $dataEmploi =DB::table('main_emploi')
        ->where('id', $lastEmploiId)->get();
        // data for  model form
        $establishment_id = session()->get('establishment_id');

        $groups = group::where('establishment_id', $establishment_id)->where('id',Auth::user()->id)->get();
        $salles = class_room::where('id_establishment', $establishment_id)->get();

        $sissions = DB::table('sissions')
        ->select('sissions.*', 'modules.id as module_name', 'groups.group_name', 'users.*', 'class_rooms.class_name')
        ->leftJoin('modules', 'modules.id', '=', 'sissions.module_id')
        ->join('groups', 'groups.id', '=', 'sissions.group_id')
        ->join('users', 'users.id', '=', 'sissions.user_id')
        ->leftJoin('class_rooms', 'class_rooms.id', '=', 'sissions.class_room_id')
        ->where('sissions.establishment_id', $establishment_id)
        ->where('sissions.status_sission', 'Accepted')
        ->where('sissions.main_emploi_id', $lastEmploiId)
        ->where('group_id',session()->get('user_id'))
        ->get();

        return view('stagiaireDashboard.Home.stagiaire',compact('tableEmploi','dataEmploi','groups','salles','sissions'));
    }
}
