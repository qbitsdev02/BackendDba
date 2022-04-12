<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')
            ->insert([
                // 1
                [
                    'name' => 'coin',
                    'icon' => 'attach_money',
                    'route' => 'Coin',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 2
                [
                    'name' => 'concept-types',
                    'icon' => 'sticky_note_2',
                    'route' => 'ConceptType',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 3
                [
                    'name' => 'operation-types',
                    'icon' => 'description',
                    'route' => 'OperationType',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 4
                [
                    'name' => 'entities',
                    'icon' => 'cases',
                    'route' => 'Entity',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 5
                [
                    'name' => 'fields',
                    'icon' => 'grid_on',
                    'route' => 'Field',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 6
                [
                    'name' => 'organizations',
                    'icon' => 'corporate_fare',
                    'route' => 'Organization',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 7
                [
                    'name' => 'beneficiaries',
                    'icon' => 'person',
                    'route' => 'Beneficiary',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 8
                [
                    'name' => 'responsables',
                    'icon' => 'perm_identity',
                    'route' => 'Responsable',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 9
                [
                    'name' => 'new-order',
                    'icon' => 'playlist_add',
                    'route' => 'NewOrder',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 10
                [
                    'name' => 'orders',
                    'icon' => 'list_alt',
                    'route' => 'Order',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 11
                [
                    'name' => 'concepts',
                    'icon' => 'list_alt',
                    'route' => 'Concept',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 12
                [
                    'name' => 'field-supervisor',
                    'icon' => 'attribution',
                    'route' => 'FieldSupervisor',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ]
            ]);
    }
}
