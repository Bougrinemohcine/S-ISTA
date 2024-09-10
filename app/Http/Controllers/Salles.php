<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Salles extends Controller
{
    public function index(){
        return  view('adminDashboard.Main.Salles');
    }

}
