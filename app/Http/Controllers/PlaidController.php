<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Abivia\Plaid;

class PlaidController extends Controller
{
    public function transactions(Request $request)
    {
        $token = Plaid::sandbox()->createPublicToken($request->id, ['transactions'])->publicToken;
        $accessToken = Plaid::items()->exchangeToken($token)->accessToken;
        $transactions = Plaid::transactions()->list(
            $accessToken, Carbon::make('2022-01-01'), Carbon::make('2022-01-31')
        );
        return response()->json($transactions, 2000);
    }
}
