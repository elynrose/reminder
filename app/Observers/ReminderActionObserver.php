<?php

namespace App\Observers;

use App\Models\Reminder;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ReminderActionObserver
{
    public function created(Reminder $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Reminder'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
