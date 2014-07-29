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