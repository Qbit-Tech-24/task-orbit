<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TicketComment;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('ticket_attatch', 'clientname')->latest('id')->get();
        return view('admin.ticket.index', ['tickets' => $tickets]);
    }
    public function show($id)
    {
        $support_tickets = Ticket::with([
            'comments' => function ($query) {
                $query->orderBy('created_at', 'desc'); // Sorting comments by created_at in descending order
            },
            'comments.user',
            'comments.client',
        ])
            ->where('id', $id)
            ->firstOrFail();
        return view('admin.ticket.show', [
            'support_tickets' => $support_tickets,
        ]);
    }

    public function replyComments(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'msg' => 'required|string|max:5000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,gif,doc,docx|max:2048',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        // Closure to handle file uploads
        $uploadFile = function ($file, $destinationPath, $prefix = '') {
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . uniqid() . ($prefix ? "_{$prefix}" : '') . '.' . $extension;
            $file->move(public_path($destinationPath), $filename);
            return $filename;
        };

       
        // Create a new comment
        $comment = new TicketComment();
        $comment->comments = $request->msg;
        $comment->ticket_id = $request->ticket_id;
        $comment->user_id = auth()->id();
        // Handle file attachment if present
        if ($request->hasFile('attachment')) {
            $comment->attachment = $uploadFile($request->file('attachment'), 'uploads/attachments/comments/');
        }
        // Save the comment
        $comment->save();

        // Redirect back with success message
        return redirect()
            ->route('ticket.support.show', $request->ticket_id)
            ->with('success', 'Comment added successfully.');
    }

  
}
