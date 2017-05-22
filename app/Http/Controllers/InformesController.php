<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;

class InformesController extends Controller
{
    public function index()
    {
    	$paises = Pais::all();
    	return view('informes', ['paises' => $paises]);
    }
}
