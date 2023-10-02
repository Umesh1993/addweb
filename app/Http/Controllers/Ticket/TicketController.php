<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CustomNotification;

class TicketController extends Controller
{
    public function index(){

        if(Auth::user()->user_type_id == "1"){
            $ticket = Ticket::paginate(10);
        }else {
            $ticket = Ticket::where('user_id','=',Auth::user()->id)->paginate(5);
        }
        
        return view('ticket.index',compact('ticket'));
    }

    public function create(){
        
        if(Auth::user()->user_type_id == "1"){
            $users = User::where('user_type_id','=','2')->get();
        }else {
            $users = User::where('id','=',Auth::user()->id)->get();
        }
       
       
        return view('ticket.add',compact('users'));
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        ]);

        $input = $request->all();

        $add = new Ticket();
        $add->title = $input['title'];
        $add->description = $input['description'];
        $add->user_id = $input['user_id'];
        $add->status = 'Pending';
        $data = $add->save();

        $user = User::find($add->user_id);
        $customData['message'] = "Hello $user->name, $add->title is ticket generated successfully.";
       
        $notification = new CustomNotification($customData);
        $notification->read_at = null;
        $user->notify($notification);

        
        if($data){
            return redirect()->to('ticket');
        }else{
            return view('ticket.add');
        }
          
    }

    public function view($id){
        
        $ticket = Ticket::with('users:id,name')->where('id',$id)->first();
        return view('ticket.view',compact('ticket'));
    }

    public function status_change(Request $request){
        $ticket = Ticket::where('id',$request->tracking_id)->first();

        $update = Ticket::find($request->tracking_id);
        $update->status = $request->status;
        $update->save();

        $title = $ticket->title;

        $user = User::find($ticket->user_id);
        $customData['message'] = "Hello $user->name, $title is ticket closed successfully.";
       
        $user->notify(new CustomNotification($customData));

        return redirect()->to('ticket');
    }
}
