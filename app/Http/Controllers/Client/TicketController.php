<?php

namespace App\Http\Controllers\Client;

use App\Models\Ticket;
use App\Models\TicketDetail;
use Illuminate\Http\Request;
use App\Models\TicketComment;
use App\Models\TicketCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Ticket\CreateRequest;

class TicketController extends Controller
{
    public function index()
    {
        $openticekts = Ticket::with('ticket_attatch', 'clientname')->latest('id')->get();
        return view('clients.support_tickets.index', ['openticekts' => $openticekts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TicketCategory::get();
        return view('clients.support_tickets.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $random = date('d-m-y') . rand(1, 99);
        // Closure to handle file uploads
        $uploadFile = function ($file, $destinationPath, $prefix = '') {
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . uniqid() . ($prefix ? "_{$prefix}" : '') . '.' . $extension;
            $file->move(public_path($destinationPath), $filename);
            return $filename;
        };
        // Create a ticket
        $ticket = Ticket::create([
            'ticket_number' => $random,
            'cat_id' => $request->input('cat_id'),
            'client_id' => $request->input('client_id'),
            'subject' => $request->input('subject'),
            'project_name' => $request->input('project_name'),
            'department' => $request->input('department'),
            'status' => $request->input('status'),
            'priority' => $request->input('priority'),
            'msg' => $request->input('msg'),
        ]);

        // Handle file uploads if attachments are provided
        if ($request->hasFile('attachment')) {
            foreach ($request->file('attachment') as $file) {
                // Loop through each file
                $path = $uploadFile($file, 'uploads/attachments/tickets/'); // Use loop variable `$file`
                TicketDetail::create([
                    'ticket_id' => $ticket->id,
                    'attachment' => $path,
                ]);
            }
        }
        // Redirect with a success message
        return redirect()->route('support_ticket.all')->with('success', 'Support ticket created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $support_tickets = Ticket::with(['comments.user', 'comments.client', 'category', 'clientname'])
            ->where('id', $id)
            ->firstOrFail();
        return view('clients.support_tickets.show', [
            'support_tickets' => $support_tickets,
        ]);
    }

    public function replyFile(Request $request)
    {
        // Validate the input
        $request->validate([
            'msg' => 'required|string|max:5000',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,gif,doc|max:2048',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        // Helper function for file upload
        $uploadFile = function ($file, $destinationPath, $prefix = '') {
            $extension = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . uniqid() . ($prefix ? "_{$prefix}" : '') . '.' . $extension;
            $file->move(public_path($destinationPath), $filename);
            return $filename;
        };

        // Check if the ticket is closed
        $ticket = Ticket::findOrFail($request->ticket_id);
        if ($ticket->status === 'Closed') {
            // Redirect back with error message if ticket is closed
            return redirect()
                ->route('support_ticket_high.show', $request->ticket_id)
                ->with('error', 'Cannot add comments to a closed ticket.');
        } else {
            // Create a new comment
            $comment = new TicketComment();
            $comment->comments = $request->msg;
            $comment->ticket_id = $request->ticket_id;

            // Assign the client or user ID based on the guard
            if (auth()->guard('clinetuser')->check()) {
                $comment->client_id = auth()->guard('clinetuser')->id();
            } else {
                $comment->user_id = auth()->id();
            }

            // Handle file upload if present
            if ($request->hasFile('attachment')) {
                $comment->attachment = $uploadFile($request->file('attachment'), 'uploads/attachments/comments/');
            }

            // Save the comment
            $comment->save();
              // Redirect back with success message
        return redirect()
        ->route('support_ticket_high.show', $request->ticket_id)
        ->with('success', 'Comment added successfully.');
        }

      
    }

    public function UpdateStatus($id, $status)
    {
        $ticket = Ticket::find($id);
        if (!$ticket) {
            return response()->json(['success' => false, 'message' => 'Ticket not found'], 404);
        }
        $ticket->update(['status' => $status]);
        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }
        return redirect()->route('ticket.support.show', $id)->with('success', 'Status updated successfully.');
    }
}
