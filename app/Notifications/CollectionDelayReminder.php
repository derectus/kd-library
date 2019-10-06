<?php

namespace App\Notifications;

use App\Models\Barrow;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CollectionDelayReminder extends Notification
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
     *
     * @return void
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
            ->subject('Gecikme Bildirimi - Klavye Delikanlıları Kütüphanesi')
            ->greeting('Merhaba ' . $this->user->name . '!')
            ->line('Bu e-postayı koleksiyonunu henüz geri göndermediğiniz için alıyorsunuz.')
            ->line('Geri gönderim bilgilerini web sayfamızda bulunan e-posta adresimize göndermenizi rica ederiz.')
            ->line('İstek bilgileri,')
            ->line('Koleksiyon Adı : ' . $this->barrow->book->implode('title', ','))
            ->line("İstek Tarihi : " . date("d/m/Y", strtotime($this->barrow->request_date)))
            ->line('Geri Gönderim Tarihi : ' . date("d/m/Y", strtotime($this->barrow->request_date)))
            ->action('İletişim sayfasına git!', url('/contact/'))
            ->line('Göstereceğiniz ilgi için teşekkür ederiz.');
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
