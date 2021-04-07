<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use App\Helpers\RoleAcronym;
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
        \App\Models\User::factory(4)->create();
        
        $this->call([
            BranchOfficeSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            ClientTypeSeeder::class,
            DocumentTypeSeeder::class,
            TypeOfCreditNoteSeeder::class,
            VoucherTypeNoteSeeder::class
        ]);
        
        \App\Models\Client::factory(10)->create();
        
        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            AttributeTypeSeeder::class,
            CoinSeeder::class,
            OperationTypeSeeder::class,
            VoucherTypeSeeder::class,
            GuideSeeder::class,
            SerieSeeder::class,
            PaymentDestinationSeeder::class,
            PaymentMethodSeeder::class,
            ProductSeeder::class,
            ProviderSeeder::class
        ]);
    }
}
