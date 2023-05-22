<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

    // Broadcast::channel('transaction', function ($user) {
    //     return true;
    // });


// Broadcast::channel('order.{orderId}', function ($user, $orderId) {
//     return $user->id === Order::findOrNew($orderId)->user_id;
// });

/***
 * no recibe la cadena o el ID numérico del modelo, 
 * puede solicitar una Modelinstancia de modelo real:
*/
// use App\Order;
 
// Broadcast::channel('nombre_delcanal.{model}', function ($user, Model $model) {
//     return $user->id === $model->user_id;
// });