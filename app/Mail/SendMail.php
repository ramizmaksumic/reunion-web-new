<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public int $orderId;

    /**
     * Create a new message instance.
     */
    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $order = Order::findOrFail($this->orderId);

        $mail = $this->subject('Nova narudžba usluge')
            ->view('mail.demo-mail')
            ->with('data', $order);

        // Ako postoji fajl u storage-u, attach
        if ($order->file_path) {
            $mail->attach(storage_path('app/public/' . $order->file_path), [
                'as' => $order->file_original_name ?? 'dokument',
            ]);
        }

        return $mail;
    }
}
