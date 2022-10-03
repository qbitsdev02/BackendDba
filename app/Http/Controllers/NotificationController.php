<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getAll(Request $request)
    {
        $user = Auth::user();
        info($user);
        info($user->notifications);
        return response()->json($user->notifications, 200);
    }
}
