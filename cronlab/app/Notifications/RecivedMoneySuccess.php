<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RecivedMoneySuccess extends Notification
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //

        $this->data= $data;


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $data = $this->data;

        return (new MailMessage)
            ->subject('Vous avez reçu de l\'argent')
            ->greeting('Salut '. $data->receiver_name.'!')
            ->line("Vous avez reçu de l'argent d'un autre membre. Ci-dessous les informations sur la transaction:")
            ->line('Montant: €'.$data->amount)
            ->line('Nom de l\'expéditeur: '.$data->sender_name)
            ->line('Email de l\'expéditeur: '.$data->sender_email)
            ->line("Ce montant à été transférer instantanément sur votre compte. Pour plus de détails connectez-vous à votre compte en cliquant sur le bouton ci-dessous.")
            ->action('Connectez-vous', route('login'))
            ->line('Merci d\'utiliser nos services! Si vous rencontrez un problème, n\'hésitez pas à nous contacter à tout moment.');
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
