<?php

namespace App\Notifications;

use App\Problem;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PointsReceivedFromProblemSolving extends Notification
{
    use Queueable;
    public $problem;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Problem $problem)
    {
        $this->problem = $problem;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line("You have received {$this->problem->score} points.")
                    ->line("Go and earn more")
                    ->action('Go earn', config('app_url'))
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
            'title' => "Points Received +{$this->problem->score}",
            'body' => "You have received points for solving <strong>{$this->problem->title}</strong>"
        ];
    }
}
