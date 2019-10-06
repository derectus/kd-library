<?php

namespace App\Notifications;

use App\Models\Barrow;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ShippingCode extends Notification
{
    use Queueable;

    /**
     * User.
     *
     * @var User
     */
    public $user;

    /**
     * Barrow.
     *
     * @var Barrow
     */
    public $barrow;


    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $barrow
     * @param $shipping_code
     */
    public function __construct($user, $barrow)
    {
        $this->user = $user;
        $this->barrow = $barrow;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Gönderim Bilgileri - Klavye Delikanlıları Kütüphanesi ')
            ->greeting('Merhaba ' . $this->user->name . '!')
            ->line('Bu e-postayı koleksiyonuna başvurduğunuz için alıyorsunuz.')
            ->line('Koleksiyon Adı : ' . $this->barrow->book->implode('title', ','))
            ->line("İstek Tarihi : " . date("d/m/Y", strtotime($this->barrow->request_date)))
            ->line('Geri Gönderim Tarihi : ' . date("d/m/Y", strtotime($this->barrow->request_date)))
            ->line('Kargo Firması : ' . $this->barrow->shipping_company)
            ->line('Kargo Takip Kodu : ' . $this->barrow->sent_code)
            ->action('İsteklerini Gör!', url('/requests/'))
            ->line('Keyifli okumalar. Bilgiyle Kalın.');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
