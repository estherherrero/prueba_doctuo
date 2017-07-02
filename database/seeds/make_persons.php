<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Person;

class make_persons extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
		
		for ($i=0; $i < 5; $i++) {
			$gender = $faker->randomElement($array = array ('female','male'));
			\DB::table('persons')->insert(array(
			   'gender' => $gender,
			   'name' => $faker->firstName($gender),
			   'firstSurname'  => $faker->lastName,
			   'secondSurname' => $faker->lastName,
			   'age' => rand(18,60),
			   'created_at' => date('Y-m-d H:m:s'),
			   'updated_at' => date('Y-m-d H:m:s')
			   /**/

			));
		}
		$persons = Person::pluck('id')->All();
		foreach($persons as $p){
			for ($h = 0; $h < 4; $h++){
				\DB::table('hobbies')->insert(array(
					'person_id' => $p,
					'hobbies'=>$faker-> randomElement(array ('leer','comer','películas','pasear','viajar',
															'conciertos','animalilos','rol','juegos tablero')),
					'created_at' => date('Y-m-d H:m:s'),
					'updated_at' => date('Y-m-d H:m:s')					  
				));
			}
		}
		
    }
}
