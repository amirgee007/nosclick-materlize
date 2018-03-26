<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserSupportAccept extends Notification
{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
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
        $user = $this->user;

        return (new MailMessage)

            ->subject('Demande de support reçu')
            ->greeting('Salut '. $user->name.'!')
            ->line("Vous avez effectué une demande d'assistance, n'est-ce pas? Votre demande a bien été reçue par notre équipe de support. Nous répondrons à vos questions le plus rapidement possible.")
            ->line("Veuillez notez que cela peut prendre jusqu'à 48 heures en raison d'une forte demande de support. Vous recevrez une notification aussitôt que notre équipe traitera votre demande. Vous pouvez vérifier votre demande de support en cliquant sur le bouton suivant")
            ->action('Vérifie maintenant', route('userSupports'))
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
