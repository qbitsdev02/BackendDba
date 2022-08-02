<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use TomorrowIdeas\Plaid\Plaid;
use TomorrowIdeas\Plaid\Entities\User;

class PlaidController extends Controller
{
    private $plaid;

    public function __construct()
    {
        $this->plaid = new Plaid(
            '62e7f32c11f7a000134b9436',
            'a54f79aeb585040097b45078172aed',
            'sandbox'
        );
    }

    public function createToken()
    {
        $token = $this->plaid->tokens->create('Qbits Plaid', 'en', ["US","CA"], new User("usr_12345"), ["transactions", "auth"]);
        return response()->json($token, 200);
    }

    public function exchangeToken(Request $request)
    {
        $access_token = $this->plaid->items->exchangeToken($request->public_token);
        return response()->json($access_token, 200);
    }

    public function transactions(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $transactions = $this->plaid
            ->transactions
            ->list($request->access_token, $startDate, $endDate);
        return response()->json($transactions, 200);
    }
}
