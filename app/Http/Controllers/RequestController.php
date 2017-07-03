<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Hobbie;

class RequestController extends Controller
{
    public function afinidad($id)
    {   
        $personaOrigen = new Person;
        $muyAfines = new Person;
        $superAfines = new Person;

        $personaOrigen = Person::where('id', $id)->first();

        $origenGender = $personaOrigen->gender;
        $ageRange = $personaOrigen->age;

        $afines = Person::where('gender','<>', $origenGender)
                        ->get();
        
        //variables de edad
        $maxaAge = $ageRange + 10;
        $minAge = $ageRange - 10;

        $muyAfines = $afines->where('age', '>=', $minAge)
                            ->where('age', '<=', $maxaAge);

        $HobbiesComunes = new Hobbie;
        $hobbieOrigen = new Hobbie;

        $hobbieOrigen = Hobbie::where('person_id', '=', $id)
                                ->get();

        foreach($hobbieOrigen as $hobbie){
             $HobbiesComunes = Hobbie::where('id','=',$hobbie->id)
                                     ->get();           
        }

         $superAfines  = Person::where('id','=',$muyAfines->id)
                                 ->where('id','=',$HobbiesComunes->person_id)                        
                                 ->get();

        return $superAfines;
      
    }
}
