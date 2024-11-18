<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model
{
    use HasFactory;
    protected $fillable = ['ticket_id', 'attachment'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id', 'id');
    }
}
