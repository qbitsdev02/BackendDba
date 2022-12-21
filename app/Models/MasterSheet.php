<?php

namespace App\Models;

use App\Helpers\CommonHelper;

class MasterSheet extends Base
{
    public static $filterable = [
        'net_weight',
        'cost_cutting',
        'transport_cost',
        'balance_payment',
        'vzgn_cost',
        'vzgn_cost_faja',
        'vzbfgn2_price',
        'vzeb_price',
        'vzsb_price',
        'vzctd_cost',
        'vzdsi_cost',
        'amount_services',
        'material_discount',
        'cost_in_ton',
        'sales_material',
        'final_price_after_discount',
        'security_and_surveillance_measurement_cost',
        'material_utility',
        'utility_tm',
        'general_material_cost',
        'material_cost',
        'vzvfgn2_price',
        'guide_cost',
        'cost_services_in_field',
        'operative_team_cost',
        'administrative_team_cost',
        'material_reception_cost'
    ];
    protected $fillable = [
        'company',
        'inventory',
        'material_type',
        'client',
        'status_material',
        'correlative_number',
        'date',
        'guide_number',
        'region',
        'origin',
        'provider_type',
        'provider',
        'contract',
        'weighing_control',
        'download_date',
        'download_hour',
        'penalty',
        'gross_weight',
        'tare_weight',
        'unit',
        'material_description',
        'price',
        'price_corpoez',
        'date_payment',
        'control_number_payment',
        'balance_payment_control',
        'status_payment',
        'dec',
        'provider_cutting',
        'price_cutting',
        'cost_cutting',
        'transport_provider',
        'driver',
        'plate',
        'transport_price',
        'control_number',
        'payment_type',
        'payment_date',
        'payment_paid',
        'status_payment',
        'vzgn_name',
        'vzgn_price',
        'vzgn_name_815',
        'vzgn_price_815',
        'vzgn_cost_815',
        'vzgn_name_faja',
        'vzgn_price_faja',
        'vzgn_name_desur',
        'vzgn_price_desur',
        'vzgn_cost_desur',
        'vzvfgn2_name',
        'vzvfgn2_cost',
        'vzeb_name',
        'vzeb_cost',
        'vzeb_name_field',
        'vzeb_price_field',
        'vzeb_cost_field',
        'vzsb_name',
        'vzsb_cost',
        'vzctd_name',
        'vzctd_price',
        'vzdsi_name',
        'vzdsi_price',
        'guide_price',
        'description_services',
        'price_services_in_field',
        'corpoez',
        'corpoez2',
        'corpoez_cost',
        'operative_team_price',
        'administrative_team_price',
        'roman_weighing_price',
        'material_reception_price',
        'security_and_surveillance_measurement_price',
        'sales_price',
        'user_created_at',
        'user_updated_at'
    ];

    protected $appends = [
        'net_weight',
        'cost_cutting',
        'transport_cost',
        'balance_payment',
        'vzgn_cost',
        'vzgn_cost_faja',
        'vzbfgn2_price',
        'vzeb_price',
        'vzsb_price',
        'vzctd_cost',
        'vzdsi_cost',
        'amount_services',
        'material_discount',
        'cost_in_ton',
        'sales_material',
        'final_price_after_discount',
        'security_and_surveillance_measurement_cost',
        'material_utility',
        'utility_tm',
        'general_material_cost',
        'material_cost',
        'guide_cost',
        'operative_team_cost',
        'administrative_team_cost',
        'material_reception_cost',
        'final_price_after_discount'
    ];

    /**
     *
     */
    public function getNetWeightAttribute()
    {
        return $this->gross_weight - $this->tare_weight;
    }

    /**
     *
     */
    public function getCostCuttingAttribute()
    {
        return $this->price_cutting * $this->net_weight;
    }

    /**
     *
     */
    public function getTransportCostAttribute()
    {
        return $this->net_weight * $this->transport_price;
    }

    /**
     *
     */
    public function getBalancePaymentAttribute()
    {
        return $this->transport_cost * $this->payment_paid;
    }

    /**
     *
     */
    public function getVzgnCostAttribute()
    {
        return $this->vzgn_price * $this->net_weight;
    }

    /**
     *
     */
    public function getVzgnCostFajaAttribute()
    {
        return  $this->vzgn_price_faja * $this->net_weight;
    }

    /**
     *
     */
    public function getVzbfgn2PriceAttribute()
    {
        return  CommonHelper::divNum($this->vzbfgn2_cost, $this->net_weight);
    }

    /**
     *
     */
    public function getVzebPriceAttribute()
    {
        return  CommonHelper::divNum($this->vzeb_cost, $this->net_weight);
    }

    /**
     *
     */
    public function getVzsbPriceAttribute()
    {
        return  CommonHelper::divNum($this->vzsb_cost, $this->net_weight);
    }

    /**
     *
     */
    public function getVzctdCostAttribute()
    {
        return  $this->vzctd_price * $this->net_weight;
    }

    /**
     *
     */
    public function getVzdsiCostAttribute()
    {
        return  CommonHelper::divNum($this->vzdsi_price, $this->net_weight);
    }

    /**
     *
     */
    public function getGuideCostAttribute()
    {
        return  $this->guide_price * $this->net_weight;
    }

    /**
     *
     */
    public function getAmountServicesAttribute()
    {
        return  $this->price_services_in_field * $this->net_weight;
    }

    /**
     *
     */
    public function getGeneralMaterialCostAttribute()
    {
        return  $this->material_cost + $this->cost_cutting + $this->transport_cost + $this->vzgn_cost
            + $this->vzgn_cost_815 + $this->vzgn_cost_faja + $this->vzgn_cost_desur + $this->vzvfgn2_cost
            + $this->vzeb_cost + $this->vzeb_cost_field + $this->vzsb_cost + $this->vzctd_cost + $this->vzdsi_cost
            + $this->cost_services_in_field + $this->corpoez_cost + $this->operative_team_cost + $this->administrative_team_cost
            + $this->roman_weighing_cost + $this->material_reception_cost + $this->security_and_surveillance_measurement_cost
            + $this->port_enablement_cost;
    }

    /**
     *
     */
    public function getCostInTonAttribute()
    {
        return  CommonHelper::divNum($this->general_material_cost, $this->net_weight);
    }

    public function getMaterialDiscountAttribute()
    {
        return ($this->net_weight * $this->penalty) * 0.037;
    }

    public function getMaterialCostAttribute()
    {
        return (($this->price + $this->price_corpoez) * $this->net_weight) - $this->material_discount;
    }


    /**
     *
     */
    public function getSalesMaterialAttribute()
    {
        return ($this->sales_price * $this->net_weight) - $this->material_discount;
    }

    /**
     *
     */
    public function getFinalPriceAfterDiscountAttribute()
    {
        return  CommonHelper::divNum($this->sales_material, $this->net_weight);
    }

    /**
     *
     */
    public function getMaterialUtilityAttribute()
    {
        return  $this->sales_material - $this->general_material_cost;
    }

    /**
     *
     */
    public function getUtilityTmAttribute()
    {
        return  CommonHelper::divNum($this->material_utility, $this->net_weight);
    }

    /**
     *
     */
    public function getOperativeTeamCostAttribute()
    {
        return $this->operative_team_price * $this->net_weight;
    }
    /**
     *
     */
    public function getAdministrativeTeamCostAttribute()
    {
        return $this->administrative_team_price * $this->net_weight;
    }
    /**
     *
     */
    public function getRomanWeighingCostAttribute()
    {
        return $this->roman_weighing_price * $this->net_weight;
    }
    /**
     *
     */
    public function getMaterialReceptionCostAttribute()
    {
        return $this->material_reception_price * $this->net_weight;
    }
    /**
     *
     */
    public function getSecurityAndSurveillanceMeasurementCostAttribute()
    {
        return $this->security_and_surveillance_measurement_price * $this->net_weight;
    }
}
