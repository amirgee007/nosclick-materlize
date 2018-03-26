<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendMoneySuccess extends Notification
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

            ->subject('Votre transfert à été effectué')
            ->greeting('Salut '. $data->user_name.'!')
            ->line("Votre transfert d'argent vers un autre membre à été effectué. Voici ci-dessous les informations :")
            ->line('Montant total: €'.$data->amount)
            ->line('Frais: €'.$data->charge)
            ->line('Montant net: €'.$data->new_amount)
            ->line('Nom du destinataire: '.$data->receiver_name)
            ->line('Email destinataire: '.$data->receiver_email)
            ->line("Votre demande de transfert d'argent vers le compte membre, dont l'adresse email est mentionné ci-dessus à été effectué instantanément. Pour plus de détails connectez-vous à votre compte en cliquant sur le bouton ci-dessous.")
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
