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
                    'name' => 'coins',
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
                    'name' => 'banks',
                    'icon' => 'account_balance',
                    'route' => 'Bank',
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
                    'name' => 'field-supervisors',
                    'icon' => 'attribution',
                    'route' => 'FieldSupervisor',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 13
                [
                    'name' => 'delivery-notes',
                    'icon' => 'receipt',
                    'route' => 'DeliveryNote',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 14
                [
                    'name' => 'clients',
                    'icon' => 'group',
                    'route' => 'Client',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //15
                [
                    'name' => 'tickets',
                    'icon' => 'person',
                    'route' => 'Ticket',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 16
                [
                    'name' => 'states',
                    'icon' => 'map',
                    'route' => 'State',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 17
                [
                    'name' => 'roles',
                    'icon' => 'person',
                    'route' => 'Role',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 18
                [
                    'name' => 'drivers',
                    'icon' => 'person',
                    'route' => 'Driver',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 19
                [
                    'name' => 'guides',
                    'icon' => 'receipt',
                    'route' => 'Guide',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 20
                [
                    'name' => 'vehicles',
                    'icon' => 'local_shipping',
                    'route' => 'Vehicle',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 21
                [
                    'name' => 'vehicle-types',
                    'icon' => 'airport_shuttle',
                    'route' => 'VehicleType',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 22
                [
                    'name' => 'trailers',
                    'icon' => 'rv_hookup',
                    'route' => 'Trailer',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 23
                [
                    'name' => 'users',
                    'icon' => 'person',
                    'route' => 'User',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //24
                [
                    'name' => 'providers',
                    'icon' => 'person',
                    'route' => 'Provider',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //25
                [
                    'name' => 'provider-types',
                    'icon' => 'person',
                    'route' => 'ProviderType',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //26
                [
                    'name' => 'rates',
                    'icon' => 'person',
                    'route' => 'Rate',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //27
                [
                    'name' => 'payment-orders',
                    'icon' => 'person',
                    'route' => 'PaymentOrder',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //28
                [
                    'name' => 'ports',
                    'icon' => 'person',
                    'route' => 'Port',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //29
                [
                    'name' => 'staff-types',
                    'icon' => 'person',
                    'route' => 'StaffType',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //30
                [
                    'name' => 'personals',
                    'icon' => 'person',
                    'route' => 'Personal',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //31
                [
                    'name' => 'actives',
                    'icon' => 'person',
                    'route' => 'Active',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //32
                [
                    'name' => 'attributes',
                    'icon' => 'person',
                    'route' => 'Attribute',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //33
                [
                    'name' => 'companies',
                    'icon' => 'person',
                    'route' => 'Company',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //34
                [
                    'name' => 'transactions',
                    'icon' => 'person',
                    'route' => 'Transaction',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //35
                [
                    'name' => 'categories',
                    'icon' => 'person',
                    'route' => 'Category',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //36
                [
                    'name' => 'field-cash-flows',
                    'icon' => 'person',
                    'route' => 'FieldCashFlow',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //37
                [
                    'name' => 'disbursements',
                    'icon' => 'person',
                    'route' => 'Disbursement',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //38
                [
                    'name' => 'voucher-types',
                    'icon' => 'person',
                    'route' => 'VoucherType',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //39
                [
                    'name' => 'contracts',
                    'icon' => 'person',
                    'route' => 'Contract',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //40
                [
                    'name' => 'services',
                    'icon' => 'person',
                    'route' => 'Service',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //41
                [
                    'name' => 'disbursement-requests',
                    'icon' => 'person',
                    'route' => 'Service',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                //42
                [
                    'name' => 'download-master',
                    'icon' => 'source',
                    'route' => 'DownloadMaster',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 43
                [
                    'name' => 'cash-flow',
                    'icon' => 'inventory',
                    'route' => 'CashFlow',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 44
                [
                    'name' => 'dashboard',
                    'icon' => 'dashboard',
                    'route' => 'Dashboard',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 45
                [
                    'name' => 'payment-estimates',
                    'icon' => 'payment',
                    'route' => 'PaymentEstimate',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                // 46
                [
                    'name' => 'costs',
                    'icon' => 'payment',
                    'route' => 'Cost',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ]
            ]);
    }
}
