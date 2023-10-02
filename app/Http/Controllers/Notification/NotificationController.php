<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        if(Auth::user()->user_type_id == '1'){
            $notifications = Notification::with('user:id,name')->orderBy('created_at', 'desc')->paginate(5);
        }else{
            $user = Auth::user();
            $notifications = $user->unreadNotifications()->paginate(5);
           
        }
       
        return view('notifications.index', compact('notifications'));
    }

    public function markNotification($id){
        $notification = Notification::find($id);
        $notification->read_at = date('Y-m-d h:i:s');
        $notification->save();
        return redirect()->to('notification');
    }
}
