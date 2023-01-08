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
            StaffTypeSeeder::class,
            PortSeeder::class,
            // OperationTypeSeeder::class,
            CountrySeeder::class,
            CategorySeeder::class,
            ConceptTypeSeeder::class,
            ConceptSeeder::class,
            ActiveSeeder::class,
            AttributeSeeder::class,
            ActiveAttributeSeeder::class,
            PersonalSeeder::class,
            OrganizationSeeder::class,
            PermissionSeeder::class,
            ProviderTypeSeeder::class,
            ProviderSeeder::class,
            ProviderTypeProviderSeeder::class,
            UnitOfMeasurementSeeder::class,
            ClientSeeder::class,
            RateSeeder::class,
            GuideSeeder::class,
            FieldSeeder::class,
            OrderSeeder::class
        ]);
    }
}
