<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class EventAdded extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct() {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array {
        return [WebPushChannel::class];
    }


    public function toWebPush($notifiable, $notification) {
        return (new WebPushMessage)
            ->title('新イベント')
            ->body('新しいイベントが追加されました！')
            ->data([
                'url' => url('/test/15')
            ]);
    }

}
