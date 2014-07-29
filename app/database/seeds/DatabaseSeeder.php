<?php
 
class DatabaseSeeder extends Seeder {
 
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();

    $this->call('UserTableSeeder');
    $this->call('SportTableSeeder');
    $this->call('AssociationTableSeeder');
    $this->call('UserRoleTableSeeder');

    $this->call('CreateADs');
    $this->call('SchoolTableSeeder');
  }
 
}

class UserTableSeeder extends Seeder{

  public function run(){
    $faker = Faker::create();

    for ($i=0;$i<25;$i++){
      $user=User::create([
        'email'=>"ethan.wortzman+$i@gmail.com",
        'first'=>$faker->firstName,
        'last'=>$faker->lastName,
        'password'=>Hash::make('password'),
        'address'=>$faker->buildingNumber.' '.$faker->streetName.', '.$faker->city.', '.$faker->stateAbbr.' '.$faker->postcode,
        'phone'=>$faker->phoneNumber,
        'confirmation'=>Str::random(32),
        'confirmed'=>1
      ]);
    }
  }
}

class SportTableSeeder extends Seeder{

  public function run(){
    Sport::create([
      'name'=>'Wrestling'
    ]);

    Sport::create([
      'name'=>'Football'
    ]);
  }
}

class AssociationTableSeeder extends Seeder{

  public function run(){
    $faker = Faker::create();

    Association::create([
      'name'=>'MIWOA',
      'sport_id'=>1
    ]);

    Association::create([
      'name'=>'NVWOA',
      'sport_id'=>1
    ]);

    Association::create([
      'name'=>'NVFOA',
      'sport_id'=>2
    ]);
  }
}


class UserRoleTableSeeder extends Seeder{

  public function run(){
    $users=User::all();

    foreach ($users as $user){
      if (rand(0,1)==0){
        $user->roles()->attach(1, ['role'=>'Official']);
      }
      if (rand(0,2)==0){
        $user->roles()->attach(2, ['role'=>'Official']);
      }
      if (rand(0,3)==0){
        $user->roles()->attach(3, ['role'=>'Official']);
      }
    }

    foreach (Association::all() as $assoc){
      $assoc->members->first()->roles()->attach($assoc->id, ['role'=>'Commissioner']);
    }
  }
}

class CreateADs extends Seeder{
  public function run(){
    $faker = Faker::create();

    for ($i=100;$i<120;$i++){
      $user=User::create([
        'id'=>$i,
        'email'=>"ethan.wortzman+$i@gmail.com",
        'first'=>$faker->firstName,
        'last'=>$faker->lastName,
        'password'=>Hash::make('password'),
        'address'=>$faker->buildingNumber.' '.$faker->streetName.', '.$faker->city.', '.$faker->stateAbbr.' '.$faker->postcode,
        'phone'=>$faker->phoneNumber,
        'confirmation'=>Str::random(32),
        'confirmed'=>1
      ]);

      $data = [
        'user_id' => $user->id,
        'association_id' => null,
        'role' => 'Athletic Director'
      ];

      UserRole::create([
        'user_id'=>$user->id,
        'association_id'=>null,
        'role'=>'Athletic Director'
      ]);
    }
  }
}

class SchoolTableSeeder extends Seeder{

  public function run(){
    $faker = Faker::create();

    foreach (User::where('id', '>', '90')->get() as $AD){
      $city = $faker->city;
      School::create([
        'name'=>$city." High School",
        'address'=>$faker->buildingNumber.' '.$faker->streetName.', '.$city.', '.$faker->stateAbbr.' '.$faker->postcode,
        'AD'=>$AD->id
      ]);
    }
  }
}