<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    use Queueable;
     private $userData;

    /**
     * Create a new notification instance.
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
         return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
         return (new MailMessage)->view('emails.forgetpassword',[
                    'name' => $this->userData['name'],
                    'password' => $this->userData['password'],
                    'body' => $this->userData['body'],
                    'thanks' => $this->userData['thanks'],
                    'websiteUrl' => $this->userData['websiteUrl'],
                    'logoUrl' => 'https://arogyadhamaapp.sdnaprod.com/admin/backend/assets/img/dhaam-mail-logo.png',
                ]
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
