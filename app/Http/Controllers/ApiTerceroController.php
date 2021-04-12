<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTerceroController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/ruc/{ruc}",
     *      operationId="getAttributeTypeById",
     *      tags={"Terceros"},
     *      summary="Get Ruc person",
     *      description="Returns data person",
     *      @OA\Parameter(
     *          name="id",
     *          description="ruc person",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function getRuc($ruc)
    {
        $ruta = "https://ruc.com.pe/api/v1/consultas";
        $token = "47210953-9eaf-4f48-8479-8e2f523200dd-06b42d2c-8428-4dda-941d-7cbbb711b0e4";
        $rucaconsultar = '10178520739';

        $data = array(
            "token"	=> $token,
            "ruc"   => $rucaconsultar
        );
            
        $data_json = json_encode($data);

        // Invocamos el servicio a ruc.com.pe
        // Ejemplo para JSON
        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_URL, $ruta);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            )
        );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta  = curl_exec($ch);
        curl_close($ch);

        $leer_respuesta = json_decode($respuesta, true);
        if (isset($leer_respuesta['errors'])) {
            //Mostramos los errores si los hay
            return response()->json($leer_respuesta['errors'], 404);
        } else {
            //Mostramos la respuesta
            return response()->json($leer_respuesta, 200);
        }
    }
}
