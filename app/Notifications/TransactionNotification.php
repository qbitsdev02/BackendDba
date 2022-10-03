<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransactionNotification extends Notification implements ShouldQueue, ShouldBroadcast
{
    use Queueable;
    public $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Transacción',
            'transaccion_id' => $this->transaction->id,
            'transaccion_amount' => $this->transaction->amount,
            'transaccion_payment_order_id' => $this->transaction->payment_order_id,
            'description' => $this->transaction->paymentOrder->concept->conceptType->category->name . ',' .
                $this->transaction->paymentOrder->concept->conceptType->name . ',' .
                $this->transaction->paymentOrder->concept->name

        ];
    }


    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'Transacción',
            'transaccion_id' => $this->transaction->id,
            'transaccion_amount' => $this->transaction->amount,
            'transaccion_payment_order_id' => $this->transaction->payment_order_id,
            'description' => $this->transaction->paymentOrder->concept->conceptType->category->name . ',' .
                $this->transaction->paymentOrder->concept->conceptType->name . ',' .
                $this->transaction->paymentOrder->concept->name
        ]);
    }
}
