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
                    'name' => 'newBilling',
                    'icon' => 'receipt',
                    'route' => 'NewBilling',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'billing',
                    'icon' => 'receipt',
                    'route' => 'Billing',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'categories',
                    'icon' => 'receipt',
                    'route' => 'categories',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'brands',
                    'icon' => 'receipt',
                    'route' => 'brands',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'clients',
                    'icon' => 'group',
                    'route' => 'clients',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'products',
                    'icon' => 'receipt',
                    'route' => 'Product',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'orders',
                    'icon' => 'receipt',
                    'route' => 'Order',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'quotations',
                    'icon' => 'receipt',
                    'route' => 'Quotation',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'sellerCommissions',
                    'icon' => 'receipt',
                    'route' => 'SellerCommission',
                    'section_id' => 1,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'newPurchase',
                    'icon' => 'receipt',
                    'route' => 'NewPurchase',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'purchase',
                    'icon' => 'receipt',
                    'route' => 'Purchase',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'expense',
                    'icon' => 'receipt',
                    'route' => 'Expense',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'provider',
                    'icon' => 'group',
                    'route' => 'Provider',
                    'section_id' => 2,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'transfer',
                    'icon' => 'all_inbox',
                    'route' => 'Transfer',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'movements',
                    'icon' => 'all_inbox',
                    'route' => 'Movement',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'devolutions',
                    'icon' => 'all_inbox',
                    'route' => 'Devolution',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'inventory',
                    'icon' => 'all_inbox',
                    'route' => 'InventoryReport',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'kardex_valued',
                    'icon' => 'all_inbox',
                    'route' => 'KardexValued',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'kardex',
                    'icon' => 'all_inbox',
                    'route' => 'KardexReport',
                    'section_id' => 3,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'users',
                    'icon' => 'person',
                    'route' => 'User',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'roles',
                    'icon' => 'group',
                    'route' => 'roles',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ],
                [
                    'name' => 'branch-offices',
                    'icon' => 'home',
                    'route' => 'branch-offices',
                    'section_id' => 4,
                    'devices' => '["mobile", "desktop"]',
                    'user_created_id' => 1
                ]
            ]);
    }
}
