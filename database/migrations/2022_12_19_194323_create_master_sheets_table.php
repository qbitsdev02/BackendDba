<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->string('inventory')->nullable();
            $table->string('material_type')->nullable();
            $table->string('client')->nullable();
            $table->string('status_material')->nullable();
            $table->string('correlative_number')->nullable();
            $table->date('date')->nullable();
            $table->string('guide_number')->nullable();
            $table->string('region')->nullable();
            $table->string('origin')->nullable();
            $table->string('provider_type')->nullable();
            $table->string('provider')->nullable();
            $table->string('contract')->nullable();
            $table->string('weighing_control')->nullable();
            $table->date('download_date')->nullable();
            $table->string('download_hour')->nullable();
            $table->float('penalty', 30, 4)->default(0);
            $table->float('gross_weight', 30, 4)->default(0);
            $table->float('tare_weight', 30, 4)->default(0);
            $table->string('unit')->nullable();
            $table->string('material_description')->nullable();
            $table->float('price', 30, 4)->default(0);
            $table->float('price_corpoez', 30, 4)->default(0);
            $table->date('date_payment')->nullable();
            $table->string('control_number_payment')->nullable();
            $table->float('balance_payment_control', 30, 4)->default(0);
            $table->string('status_payment')->nullable();
            $table->string('dec')->nullable();
            $table->string('provider_cutting')->nullable();
            $table->float('price_cutting', 30, 4)->default(0);
            $table->float('cost_cutting', 30, 4)->default(0);
            $table->string('transport_provider')->nullable();
            $table->string('driver')->nullable();
            $table->string('plate')->nullable();
            $table->float('transport_price', 30, 4)->default(0);
            $table->string('control_number')->nullable();
            $table->string('payment_type')->nullable();
            $table->date('payment_date')->nullable();
            $table->float('payment_paid', 30, 4)->default(0);
            $table->string('vzgn_name')->nullable();
            $table->float('vzgn_price', 30, 4)->default(0);
            $table->string('vzgn_name_815')->nullable();
            $table->float('vzgn_price_815', 30, 4)->default(0);
            $table->float('vzgn_cost_815', 30, 4)->default(0);
            $table->string('vzgn_name_faja')->nullable();
            $table->float('vzgn_price_faja', 30, 4)->default(0);
            $table->string('vzgn_name_desur')->nullable();
            $table->float('vzgn_price_desur', 30, 4)->default(0);
            $table->float('vzgn_cost_desur', 30, 4)->default(0);
            $table->string('vzvfgn2_name')->nullable();
            $table->float('vzvfgn2_cost', 30, 4)->default(0);
            $table->string('vzeb_name')->nullable();
            $table->float('vzeb_cost', 30, 4)->default(0);
            $table->string('vzeb_name_field')->nullable();
            $table->float('vzeb_price_field', 30, 4)->default(0);
            $table->float('vzeb_cost_field', 30, 4)->default(0);
            $table->string('vzsb_name')->nullable();
            $table->float('vzsb_cost', 30, 4)->default(0);
            $table->string('vzctd_name')->nullable();
            $table->float('vzctd_price', 30, 4)->default(0);
            $table->string('vzdsi_name')->nullable();
            $table->float('vzdsi_price', 30, 4)->default(0);
            $table->float('guide_price', 30, 4)->default(0);
            $table->string('description_services')->nullable();
            $table->float('price_services_in_field', 30, 4)->default(0);
            $table->string('corpoez')->nullable();
            $table->string('corpoez2')->nullable();
            $table->float('corpoez_cost', 30, 4)->default(0);
            $table->float('operative_team_price', 30, 4)->default(0);
            $table->float('administrative_team_price', 30, 4)->default(0);
            $table->float('roman_weighing_price', 30, 4)->default(0);
            $table->float('roman_weighing_cost', 30, 4)->default(0);
            $table->float('material_reception_price', 30, 4)->default(0);
            $table->float('security_and_surveillance_measurement_price', 30, 4)->default(0);
            $table->float('port_enablement_cost', 30, 4)->default(0);
            $table->float('sales_price', 30, 4)->default(0);
            $table->foreignId('user_created_at')->nullable()->constrained('users');
            $table->foreignId('user_updated_at')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_sheets');
    }
};
