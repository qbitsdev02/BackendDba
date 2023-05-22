<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            [
                'name' => 'Corporacion macro metal C.M.M c.a',
                'document_number' => 'j-3215479',
                'email' => 'CMM@gmail.com',
                'phone_number' => '0281280456',
                'user_created_id' => '1',
               // 'provider_type_id' => '1'
            ],
          
        ]);
    }
    
}
