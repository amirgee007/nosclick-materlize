<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserSupportReply extends Notification
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

            ->subject('Vous avez une réponse du support')
            ->greeting('Salut '. $user->name.'!')
            ->line("Vous avez effecté une demande d'assistance, n'est-ce pas? Notre équipe de support à déjà répondu à vos questions.")
            ->line("Veuillez vous connecter à votre compte et vérifier votre demande de support. Vous pouvez vérifier votre demande de support en cliquant sur le bouton suivant")
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
