<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('employee_id', auth()->user()->id)
            ->where('status', 'pending')
            ->get();

        return view('notifications.index', compact('notifications'));
    }

    public function accept(Notification $notification)
    {
        $notification->update(['status' => 'accepted']);

        // Lógica adicional após aceitar a notificação

        return redirect()->back()->with('success', 'Notificação aceita com sucesso.');
    }

    public function reject(Notification $notification)
    {
        $notification->update(['status' => 'rejected']);

        // Lógica adicional após rejeitar a notificação

        return redirect()->back()->with('success', 'Notificação rejeitada com sucesso.');
    }
}
