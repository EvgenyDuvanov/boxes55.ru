<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReviewNotification extends Notification
{
    use Queueable;

    public $review;

    public function __construct($review)
    {
        $this->review = $review;
    }

    public function via($notifiable)
    {
        return ['mail']; // Отправка уведомления по электронной почте
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Эй, тут новый отзыв оставил ' . $this->review->name)
                    ->line('Имя: ' . $this->review->name)
                    ->line('Марка авто: ' . $this->review->car_model)
                    ->line('Отзыв:')
                    ->line($this->review->info)
                    ->line('Что бы опубликовать отзыв, загляни в кабинет администратора, которого еще нет:)')
                    ->line('С уважением, команда ' )
                    ->line(config('app.name'));
    }
}