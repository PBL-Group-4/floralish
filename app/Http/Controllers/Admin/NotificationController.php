<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $notifications = Notification::latest()
            ->take(10)
            ->get()
            ->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'message' => $notification->message,
                    'type' => $notification->type,
                    'data' => $notification->data,
                    'time_ago' => $notification->created_at->diffForHumans(),
                    'is_read' => $notification->is_read
                ];
            });

        $unreadCount = Notification::unread()->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }

    public function markAllAsRead(): JsonResponse
    {
        Notification::unread()->update(['is_read' => true]);
        
        return response()->json(['message' => 'All notifications marked as read']);
    }

    public function markAsRead(Notification $notification): JsonResponse
    {
        $notification->markAsRead();
        
        return response()->json(['message' => 'Notification marked as read']);
    }
} 