<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivePersonalTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('active_personal_ticket')->insert(
            [
                [   
                    "active_id" => 1,
                    "personal_id" => 2,
                    "ticket_id" => 1,
                    "user_created_id" => 1
                ]
            ]
        );
    }
}
