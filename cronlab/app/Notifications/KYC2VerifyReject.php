<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class KYC2VerifyReject extends Notification
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

            ->subject('Vérification d\'adresse refusé')
            ->greeting('Désolé '. $user->name.'!')
            ->line("Malheureusement, nous ne pouvons pas accepté vos documents de vérification d'adresse. Vous avez 3 tentatives. Après 3 demandes échoué, vous serez définitivement banni. S'il vous plaît envoyez-nous des documents de bonne qualité, en conformité à nos exigences.")
            ->line("Nous avons besoin d'informations d'adresse précises et réelles. Le document doit être actuel, et ne pas avoir plus de 3 mois. Nous ne souhaitons pas faire affaire avec un membre anonyme. Pour soumettre une autre demande, veuillez vous connecter à votre compte en cliquant sur le bouton de connexion ci-dessous. ")
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
