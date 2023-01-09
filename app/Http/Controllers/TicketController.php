<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ticket;
use App\Model\File;

class TicketController extends Controller
{
    public function index(Ticket $ticket)
    {
        $tickets = $ticket->with('user')->paginate(12)->onEachSide(2);
        return view('admin.ticket.index', compact('tickets'));
    }

    public function filterTicket(Request $request, $userID){

        $tickets = Ticket::where('userID','=', "$userID")->paginate(12)->onEachSide(2);

        return view('admin.ticket.filterTicket', compact('tickets'));

    }


    public function message($id, Ticket $ticket)
    {
        try {
            $ticket = $ticket->find($id);
            $messages = $ticket->messages ?? [];
            return view('admin.ticket.mesages', compact('ticket', 'messages'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function messageSend(Request $request, Ticket $ticket)
    {

        $request->validate([
            'ticket_id' => 'required|numeric',
            'message' => 'nullable',
            'files' => 'nullable',
            'files.*' => 'mimes:doc,pdf,docx,zip,jpg,jpeg,png'
        ]);

        $data = [
            'message' => $request->message,
            'ticket_id' => $request->ticket_id,
            'user_id' => auth()->user()->id,
        ];

        try {
            if ($request->hasfile('files')) {

                foreach ($request->file('files') as $file) {
                    $msg = $ticket->addFile($data);
                    $name = time() . '.' . $file->extension();
                    $extension = $file->extension();
                    $file->move(storage_path('app/ticket/files/'), $name);
                    $filex = new File();
                    $filex->file_name = $name;
                    $filex->user_id = auth()->user()->id;
                    $filex->file_type = $extension;
                    $filex->msg_id = $msg->msgID;
                    $filex->save();
                }
            } else {
                if ($request->message) {
                    $ticket->addMessage($data);
                }
            }
            return back()->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Message sent.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
