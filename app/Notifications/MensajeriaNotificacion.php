<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mensaje;
use App\User;
use DB;

class MensajeriaNotificacion extends Notification
{
    use Queueable;
    public $mensaje;
 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
       $this->mensaje = $mensaje;
    }
 
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
 
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'body' => $this->mensaje->body,
            'envio_id' => User::find($this->mensaje->envio_id),
            'recibio_id' => User::find($this->mensaje->recibio_id)
        ];
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
            //
        ];
    }
}
