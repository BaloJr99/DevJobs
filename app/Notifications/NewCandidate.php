<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;
    public $vacancy_id;
    public $vacancy_name;
    public $user_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacancy_id, $vacancy_name, $user_id)
    {
        $this -> vacancy_id = $vacancy_id;
        $this -> vacancy_name = $vacancy_name;
        $this -> user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line('A new candidate has applied to your vacancy.')
                    ->line('The vacancy is: ' . $this -> vacancy_name)
                    ->action('See notifications: ', url('/notifications'))
                    ->line('Thank you for using DevJobs!');
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

    public function toDatabase($notifiable){
        return [
            'vacancy_id' => $this -> vacancy_id,
            'vacancy_name' => $this -> vacancy_name,
            'user_id' => $this -> user_id
        ];
    }
}
