<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class RequestController extends Controller
{
    public function afinidad($id)
    {   
        $personaOrigen = new Person;
        $personaOrigen = Person::where('id', $id)->first();

        $origenGender = $personaOrigen->gender;
        $ageRange = $personaOrigen->age;

        $afines = Person::where('age', '>=', $ageRange - 10)
                           ->where('age', '<=', $ageRange + 10)
                           ->where('gender','<>', $origenGender)
                           ->get();
                          

        return $afines;
        
    }
}
