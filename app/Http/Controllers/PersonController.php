<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Person;
use App\Hobbie;

class PersonController extends Controller
{
    public function create(Request $request)
	{	
		$this->validate($request, [
			'name' => 'required|max:64',
			'firstSurname' => 'required|max:64',
			'secondSurname' => 'nullable|max:64',
			'age' => 'required|integer|min:18|max:120',
			'gender' => 'required',Rule::in(["Female", "Male"]),
			'hobbies' => 'required|array'
		]);
		
		$data = $request->json()->all();
		
		$user = new Person;

		$user->name =  $data['name'];
		$user->firstSurname = $data['firstSurname'];
		$user->secondSurname = $data['secondSurname'];
		$user->age = $data['age'];
		$user->gender = strtolower($data['gender']);
		$user->save();
			
        
        $hobbies = $data['hobbies'];
		foreach($hobbies as $current){
            $newHobbie = new Hobbie;

			$newHobbie->hobbies = $current;
			$newHobbie->person_id = $user->id;
            $newHobbie->save();
		}

		return $data;
	}
	
    public function get(Request $request)
    {   
        $gender = request()->gender;
        $age = request()->age;

        $personas = Person::all();
       
        if ($request->has('gender')){
             $personas = $personas->where('gender', $gender);
        }

        if ($request->has('age')){
             $personas = $personas->where('age', $age);
        }
        
        return $personas ;
    }

	public function getById($id)
	{
        $personas = Person::where('id', $id)->first();
		return $personas;
	}
}