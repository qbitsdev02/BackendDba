<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTercerosController extends Controller
{
	function getDocumentNumber(Request $request) {
        $curl = curl_init();
        $TOKEN = 'e9abd868c2c3118c8ba2b396345dd99d';
        $APPCEDULA = '530';
        $url = "https://api.cedula.com.ve/api/v1?app_id=".$APPCEDULA."&token=".$TOKEN."&cedula=".(int)$request->document_number;
        info($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        $curlData = curl_exec($curl);
        curl_close($curl);
		$res = json_decode( $curlData, true);
		return isset($res['data']) && $res['data']?$res['data']:$res['error_str'];
	}
}
