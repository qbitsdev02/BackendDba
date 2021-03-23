<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use App\Helpers\RoleAcronym;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(4)->create();
        
        $this->call([
            RoleSeeder::class,
            RoleUserSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            AttributeTypeSeeder::class,
            ClientTypeSeeder::class
        ]);

        \App\Models\Product::factory(500)->create();
        
        \App\Models\Client::factory(5)
            ->create()
            ->each(function($client) {
                $client->roles()->attach(
                    \App\Models\Role::where('acronym', RoleAcronym::CLIENT)->first()->id,
                    [
                        'user_created_id' => 1
                    ]
                );
            });
        $this->call([
            AttributeTypeProductSeeder::class
        ]);
    }
}
