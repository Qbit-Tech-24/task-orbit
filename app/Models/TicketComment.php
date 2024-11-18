<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use App\Models\ClientUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'client_id', 'ticket_id', 'comments', 'attachment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(ClientUser::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
