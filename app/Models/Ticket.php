<?php

namespace App\Models;

use App\Models\ClientUser;
use App\Models\TicketDetail;
use App\Models\TicketComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id','cat_id','ticket_number','subject', 
        'department','project_name','status','priority','msg'
    ];

    public function clientname()
    {
        return $this->belongsTo(ClientUser::class, 'client_id');
    }

    public function ticket_attatch()
    {
        return $this->hasMany(TicketDetail::class, 'ticket_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(TicketCategory::class, 'cat_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(TicketComment::class, 'ticket_id', 'id');
    }
}
