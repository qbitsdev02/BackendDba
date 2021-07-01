<?php

namespace Database\Seeders;

use App\Models\AccountingPlan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AccountingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonFile = file_get_contents('app/Data/planContable.json');
        $accountPlans = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonFile), true);

        collect($accountPlans)
        ->each(function ($accountPlan) {
                $accountPlans = new AccountingPlan();
                $accountPlans->element = $accountPlan['element'];
                $accountPlans->code = $accountPlan["code"];
                $accountPlans->description = $accountPlan["description"];
                $accountPlans->account_type = $accountPlan["account_type"];
                $accountPlans->user_created_id = 1;
                $accountPlans->save();
            });
    }
}
