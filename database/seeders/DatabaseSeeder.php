<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use App\Helpers\RoleAcronym;
use App\Models\Coin;
use App\Models\Guide;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            BranchOfficeSeeder::class,
            SectionSeeder::class,
            ModuleSeeder::class,
            ModuleRoleSeeder::class,
            RoleUserSeeder::class,
            EntitySeeder::class,
            CoinSeeder::class,
            OperationTypeSeeder::class,
            ConceptTypeSeeder::class,
            ConceptSeeder::class,
            OrganizationSeeder::class
        ]);
    }
}
