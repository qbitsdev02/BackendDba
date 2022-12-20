<?php

namespace App\Imports;

use App\Models\MasterSheet;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class MasterSheetImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new MasterSheet([
            'company' => $row['empresa_solicitante_de_guia'],
            'inventory' => $row['inventario'],
            'material_type' =>  $row['tipo_de_material'],
            'client' => $row['cliente_puerto_descarga'],
            'status_material' => $row['estatus_material'],
            'correlative_number' => $row['n_correlativo'],
            'date' => $row['fecha'] && !empty(trim($row['fecha'])) ? Carbon::createFromFormat('d/m/Y', $row['fecha'])->format('Y-m-d') : null,
            'guide_number' => $row['numero_guia_copoez'],
            'region' => $row['region'],
            'origin' => $row['origen'],
            'provider_type' => $row['contrato_proveedor'],
            'provider' => $row['proveedor_contrato'],
            'contract' => $row['numero_de_contrato_proveedor_natural'],
            'weighing_control' => $row['control_de_pesaje'] ?? 0,
            'download_date' => $row['fecha_de_descarga'] && !empty(trim($row['fecha_de_descarga'])) ? Carbon::createFromFormat('d/m/Y', $row['fecha_de_descarga'])->format('Y-m-d') : null,
            'download_hour' => $row['hora_de_descarga'],
            'penalty' => $row['pemalidad'] ?? 0,
            'gross_weight' => $row['peso_bruto'] ?? 0,
            'tare_weight' => $row['peso_tara'] ?? 0,
            'unit' => $row['unidad'],
            'material_description' => $row['descripcion_del_material'],
            'price' => $row['precio_acordado_con_proveedor'] ?? 0,
            'price_corpoez' => $row['precio_material_corpoez'] ?? 0,
            'date_payment' => $row['fecha_control_de_pago'] && !empty(trim($row['fecha_control_de_pago'])) ? Carbon::createFromFormat('d/m/Y', $row['fecha_control_de_pago'])->format('Y-m-d') : null,
            'control_number_payment' => $row['n_control_de_pago'],
            'balance_payment_control' => $row['saldo_control_de_pago'] ?? 0,
            'status_payment' => $row['estatus_control_de_pago'],
            'dec' => $row['dec_alberto_campos'],
            //'provider_cutting' => $row['precio_acordado_corte'],
            'price_cutting' => $row['precio_acordado_corte'] ?? 0,
            'cost_cutting' => $row['costo_corte'] ?? 0,
            'transport_provider' => $row['proveedor_transporte'],
            'driver' => $row['chofer'],
            'plate' => $row['placa_chuto'],
            'transport_price' => $row['precio_transporte'] ?? 0,
            'control_number' => $row['n_control'],
            'payment_type' => $row['tipo_de_pago_transporte'],
            'payment_date' => $row['fecha2'] && !empty(trim($row['fecha2'])) ? Carbon::createFromFormat('d/m/Y', $row['fecha2'])->format('Y-m-d') : null,
            'payment_paid' => $row['pagado'] ?? 0,
            'vzgn_name' => $row['nombre_vzgn_comando_zona_52'],
            'vzgn_price' => $row['precio_vzgn_comando_zona_52'] ?? 0,
            'vzgn_name_815' => $row['nombre_vz_destacamento_815'],
            'vzgn_price_815' => $row['precio_vz_destacamento_815'] ?? 0,
            'vzgn_cost_815' => $row['costo_vz_destacamento_8152'] ?? 0,
            'vzgn_name_faja' => $row['nombre_vz_gn_destacamento_de_la_faja'],
            'vzgn_price_faja' => $row['precio_vz_gn_destacamento_de_la_faja'] ?? 0,
            'vzgn_name_desur' => $row['nombre_vz_gn_destacamento_del_desur'],
            'vzgn_price_desur' => $row['precio_vz_gn_destacamento_del_desur'] ?? 0,
            'vzgn_cost_desur' => $row['costo_vz_gn_destacamento_del_desur'] ?? 0,
            'vzvfgn2_name' => $row['nombre_vzcfgn'],
            //'vzvfgn2_cost' => $row['vzvfgn2_cost'],
            'vzeb_name' => $row['nombre_vzeb_destacamento_caribe'],
            'vzeb_cost' => $row['costo_vzeb_destacamento_caribe'] ?? 0,
            'vzeb_name_field' => $row['nombre_vzeb_destacamentos_de_campo'],
            'vzeb_price_field' => $row['precio_vzeb_destacamentos_de_campo'] ?? 0,
            'vzeb_cost_field' => $row['costo_vzeb_destacamentos_de_campo'] ?? 0,
            'vzsb_name' => $row['nombre_vzsb'],
            'vzsb_cost' => $row['vzsb_costo'] ?? 0,
            'vzctd_name' => $row['nombre_vzctd'],
            'vzctd_price' => $row['vzctd'] ?? 0,
            'vzdsi_name' => $row['nombre_vzdsi'],
            'vzdsi_price' => $row['vzdsi'] ?? 0,
            'guide_price' => $row['guia_cropoez_precio'] ?? 0,
            'description_services' => $row['serivicio_de_logistica_descripcion'],
            'price_services_in_field' => $row['precio_servicio_de_logistica_en_patio'] ?? 0,
            'corpoez' => $row['corpoez'],
            'corpoez2' => $row['corpoez2'],
            'corpoez_cost' => $row['costo_corpoez'] ?? 0,
            'operative_team_price' => $row['equipo_operativo_precio'] ?? 0,
            'administrative_team_price' => $row['equipo_administrativo_precio'] ?? 0,
            'roman_weighing_price' => $row['pesaje_romana_ock_precio'] ?? 0,
            'material_reception_price' => $row['recepcion_material_bolipuertos_precio'] ?? 0,
            'security_and_surveillance_measurement_price' => $row['medicion_seguridad_y_vigilancia_precio'] ?? 0,
            'port_enablement_cost' => $row['habilitaciones_de_puerto_costo'] ?? 0,
            'sales_price' => $row['precio_venta_acordado'] ?? 0,

        ]);
    }
}
