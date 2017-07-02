<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Person;

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
		$user->gender = $data['gender'];
		$user->save();
		
		$hobbie = new Hobbie;

		foreach($hobbie as $ho){
			$hobbie-> hobbies = $data['hobbie'];
			$hobbie-> person_id = person::id();
		}

		// {
			// "name": "Esther",
			// "firstSurname": "Herrero",
			// "secondSurname": "Guzmán",
			// "age": 28,
			// "gender": "female",
			// "hobbies": ["leer", "gatos", "series scfi"]
		// }
		return $data;
	}
	
	public function get()
	{
		return "all users";
	}
	
	public function getById($id)
	{
		return $id;
	}
}
