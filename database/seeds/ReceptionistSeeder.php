<?php


use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReceptionistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();
        $user = [
            'first_name' => 'Receptionist',
            'last_name' => 'Sislac',
            'mobile' => '5142323114',
            'profile_photo' => 'Male_receptionist.png',
            'email' => 'receptionist@themesbrand.website',
            'password' => 'receptionist@123456',
        ];
        $user = Sentinel::registerAndActivate($user);
        $role = Sentinel::findRoleBySlug('receptionist');
        $role->users()->attach($user);
        DB::table('receptionist')->insert([
            'user_id' => $user->id,
            'cpf' => rand(100000, 200000),
            'cns' =>  rand(1000000, 2000000),
            'is_deleted' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $i = 1;
        foreach (range(32, 45) as $item) {
            $fakerName = $faker->name;
            $user = [
                'first_name' => Str::before($fakerName, ' '),
                'last_name' => Str::after($fakerName, ' '),
                'mobile' => rand(1000000000, 2000000000),
                'profile_photo' => 're-avatar-' . $i . '.jpg',
                'email' => $faker->safeEmail,
                'password' => 'receptionist@123456',
            ];
            $user = Sentinel::registerAndActivate($user);
            $role = Sentinel::findRoleBySlug('receptionist');
            $role->users()->attach($user);
            $i++;
        }
        foreach (range(32, 45) as $item) {
            DB::table('receptionist')->insert([
                'user_id' => $item,
                'cpf' => rand(100000, 200000),
                'cns' =>  rand(1000000, 2000000),
                'is_deleted' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
