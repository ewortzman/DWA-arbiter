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

    $this->call('CreateCoaches');
    $this->call('TeamTableSeeder');
    $this->call('EventTableSeeder');
    $this->call('EventTeamTableSeeder');
    $this->call('UserEventTableSeeder');
  }
 
}

class UserTableSeeder extends Seeder{

  public function run(){
    $faker = Faker::create();

    User::create([
      'email'=>"ethan.wortzman@gmail.com",
      'first'=>'Ethan',
      'last'=>'Wortzman',
      'password'=>Hash::make('password'),
      'street'=>'133 Ryan Road',
      'city'=>'Stoughton',
      'state'=>'MA',
      'zip'=>'02072',
      'phone'=>"7812670827",
      'confirmation'=>Str::random(32),
      'confirmed'=>1
    ]);

    for ($i=1;$i<25;$i++){
      $user=User::create([
        'email'=>"ethan.wortzman+$i@gmail.com",
        'first'=>$faker->firstName,
        'last'=>$faker->lastName,
        'password'=>Hash::make('password'),
        'street'=>$faker->buildingNumber.' '.$faker->streetName,
        'city'=>$faker->city,
        'state'=>$faker->stateAbbr,
        'zip'=>$faker->postcode,
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
      if ($user->id == 1){
        $user->roles()->attach(1, ['role'=>'Official']);
        $user->roles()->attach(2, ['role'=>'Official']);
        $user->roles()->attach(3, ['role'=>'Official']);

        continue;
      }
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
        'street'=>$faker->buildingNumber.' '.$faker->streetName,
        'city'=>$faker->city,
        'state'=>$faker->stateAbbr,
        'zip'=>$faker->postcode,
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
        'street'=>$faker->buildingNumber.' '.$faker->streetName,
        'city'=>$faker->city,
        'state'=>$faker->stateAbbr,
        'zip'=>$faker->postcode,
        'AD'=>$AD->id
      ]);
    }
  }
}

class CreateCoaches extends Seeder{
  public function run(){
    $faker = Faker::create();

    for ($i=200;$i<250;$i++){
      $user=User::create([
        'id'=>$i,
        'email'=>"ethan.wortzman+$i@gmail.com",
        'first'=>$faker->firstName,
        'last'=>$faker->lastName,
        'password'=>Hash::make('password'),
        'street'=>$faker->buildingNumber.' '.$faker->streetName,
        'city'=>$faker->city,
        'state'=>$faker->stateAbbr,
        'zip'=>$faker->postcode,
        'phone'=>$faker->phoneNumber,
        'confirmation'=>Str::random(32),
        'confirmed'=>1
      ]);

      UserRole::create([
        'user_id'=>$user->id,
        'association_id'=>null,
        'role'=>'Coach'
      ]);
    }
  }
}

class TeamTableSeeder extends Seeder{
  public function run() {
    $faker = Faker::create();

    foreach (School::all() as $school){
      Team::create([
        'sport_id'=>1,
        'school_id'=>$school->id,
        'coach'=>2*$school->id-1+200,
        'name'=>$school->name.' Wrestling',
        'level'=>'Varsity',
        'gender'=>'coed'
      ]);

      Team::create([
        'sport_id'=>2,
        'school_id'=>$school->id,
        'coach'=>2*$school->id+200,
        'name'=>$school->name.' Football',
        'level'=>'Varsity',
        'gender'=>'boys'
      ]);
    }
  }
}

class EventTableSeeder extends Seeder{
  public function run(){
    $faker = Faker::create();

    for ($i=-20;$i<20;$i+=2){
      Models\Event::create([
        'association_id'=>Association::find(rand(1,3))->id,
        'start'=>$faker->dateTimeBetween($startDate = "$i days", $endDate = "$i days"),
        'end'=>$faker->dateTimeBetween($startDate = "$i days", $endDate = "$i days"),
        'type'=>'standard'
      ]);
    }
  }
}

class EventTeamTableSeeder extends Seeder{
  public function run(){
    foreach (Models\Event::all() as $event){
      $teams = [];
      for ($i=0;$i<rand(2,4);$i++){
        do{
          if ($event->association->sport_id == 1){
            $team = rand(1,20)*2-1;
          } else {
            $team = rand(1,20)*2;
          }
        } while(in_array($team, $teams));

        $event->teams()->attach($team, ['home'=>$i==1]);
        $event->street = Team::find($team)->school->street;
        $event->city = Team::find($team)->school->city;
        $event->state = Team::find($team)->school->state;
        $event->zip = Team::find($team)->school->zip;

        $event->save();

        $teams[$i] = $team;
      }
    }
  }
}

class UserEventTableSeeder extends Seeder{
  public function run(){
    foreach (Models\Event::all() as $event) {
      $refs = $event->association->members;
      $number = $event->association->members->count();

      for ($i=0;$i<rand(1,3);$i++){
        $ref = $refs[rand(0,$number-1)];
        $event->officials()->attach($ref->id);
      }
    }
  }
}