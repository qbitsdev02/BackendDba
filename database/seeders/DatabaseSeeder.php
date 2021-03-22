<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

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
            AttributeTypeProductSeeder::class
        ]);

        \App\Models\Product::factory(6000)
            ->hasAttributeTypes()
            ->create();
    }
}
