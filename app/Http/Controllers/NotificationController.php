<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getAll(Request $request)
    {
        $user = Auth::user();
        $notifications = collect($user->notifications)
            ->map(function($notification) {
                $notification->diffForHumans = Carbon::parse($notification->created_at)->diffForHumans();
            });
        return response()->json($user->notifications, 200);
    }
}
